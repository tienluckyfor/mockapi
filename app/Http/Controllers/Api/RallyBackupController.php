<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Media;
use App\Models\RallyData;
use App\Repositories\MediaRepository;
use App\Repositories\RallydataRepository;
use App\Repositories\ResourceRepository;
use App\Services\MediaService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class RallyBackupController extends Controller
{
    private $rallydata_repository;
    private $resource_repository;
    private $media_repository;
    private $media_service;

    public function __construct(
        MediaService $mediaService,
        RallydataRepository $rallydataRepository,
        ResourceRepository $resourceRepository,
        MediaRepository $mediaRepository
    ) {
        $this->media_service = $mediaService;
        $this->media_repository = $mediaRepository;
        $this->rallydata_repository = $rallydataRepository;
        $this->resource_repository = $resourceRepository;
    }

    public function export(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'resource_id' => 'required',
            'dataset_id'  => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['status' => false, 'errors' => $validator->errors()]);
        }
        $resourceId = $request->resource_id;
        $datasetId = $request->dataset_id;
        $ralliesD = $this->rallydata_repository
            ->getByDatasetIdResourceId($datasetId, $resourceId)
            ->map(function ($item) {
                return $item->data;
            });
        $mediaIds = $this->rallydata_repository->getMediaIds($ralliesD);
        $media = $this->media_repository->getByIds($mediaIds);
        $ralliesM = $this->rallydata_repository->mappingMedia($ralliesD->toArray(), $media);
        $resource = $this->resource_repository
            ->findByid($resourceId);
        [$cols] = $this->_getColsFields($resource);
        $arr = $this->_encodeData($ralliesM, $cols);

        header("Content-Type: text/csv");
        header("Content-Disposition: attachment; filename={$resource->name}.csv");
        function outputCSV($data)
        {
            $output = fopen("php://output", "wb");
            foreach ($data as $row) {
                fputcsv($output, $row);
            }
            fclose($output);
        }

        outputCSV(array_reverse($arr));
    }

    private function _getColsFields($resource)
    {
        $fields = $resource->fields;
        $cols = [];
        foreach ($fields as $field) {
            $cols[] = $field['name'];
        }
        return [$cols, $fields];
    }

    private function _encodeData($rallies1, $cols)
    {
        $arr = [];
        foreach ($rallies1 as $item) {
            $row = [];
            foreach ($cols as $col) {
                $val = isset($item[$col]) ? $item[$col] : null;
                if (isset($val['media'][0]['file'])) {
                    $files = collect($val['media'])->pluck('file');
                    $val = $files;
                }
                if (is_array($val)) {
                    $val = json_encode($val);
                }
                $row[] = $val;
            }
            $arr[] = $row;
        }
        $arr[] = $cols;
        return $arr;
    }

    public function import(Request $request)
    {
        $request->validate([
            'file'        => 'required',
            'dataset_id'  => 'required',
            'resource_id' => 'required',
        ]);
        $file = $request->file('file');
        if (!preg_match('#text#mis', $file->getMimeType())) {
            throw ValidationException::withMessages([
                'file' => ['Only support a .csv file'],
            ]);
        }
        // read data
        $path = $file->getRealPath();
        $data = array_map('str_getcsv', file($path));
        // check
        $resourceId = $request->resource_id;
        $datasetId = $request->dataset_id;
        $rallies = $this->rallydata_repository
            ->getByDatasetIdResourceId($datasetId, $resourceId);
        $resource = $this->resource_repository
            ->findByid($resourceId);
        [$cols, $fields] = $this->_getColsFields($resource);
        if ($data[0] !== $cols) {
            throw ValidationException::withMessages([
                'file' => ['Fields does\'nt match'],
            ]);
        }
        // inside media
        [$data, $mediaFiles] = $this->_decodeDataMedia($data, $cols, $fields);
        $media = $this->media_repository->getByFiles($mediaFiles);
        $oMedia = [];
        foreach ($data as &$datum) {
            foreach ($datum as &$item) {
                if (isset($item['media'][0]['file'])) {
                    foreach ($item['media'] as $key => $medium) {
                        $fMedia = preg_replace('/^.+?([0-9\-]+)\.\w+$/mis', '$1', $medium['file']);
                        $rMedia = $media->filter(function ($item1) use ($fMedia) {
                            if (empty($fMedia)) {
                                return false;
                            }
                            return false !== stristr($item1->file_name, $fMedia);
                        })->first();
                        if ($rMedia) {
                            $item['media_ids'][] = $rMedia->id;
                            unset($item['media'][$key]);
                        }
                    }
                    $oMedia[] = $item['media'];
                }
            }
        }

        // outside media
        $oMedia = collect($oMedia)
            ->flatten()
            ->unique()
            ->filter()
            ->toArray();
        $iMedia = [];
        foreach ($oMedia as $url) {
            [$convertStatus, $result] = $this->media_service->getViaUrl($url);
            if ($convertStatus) {
                $media = array_merge($request->all(), $result);
                $create = Media::create($media);
                $iMedia[$url] = $create->id;
            }
        }
        foreach ($data as &$datum) {
            foreach ($datum as &$item) {
                if (isset($item['media'])) {
                    foreach ($item['media'] as $key => $medium) {
                        $mId = @$iMedia[$medium['file']];
                        if ($mId) {
                            $item['media_ids'][] = $mId;
                        }
                    }
                    unset($item['media']);
                }
            }
        }
        $nData = collect($data);
        $rallies = $rallies
            ->map(function ($rally) use ($data, &$nData) {
                $datum = collect($data)
                    ->where('id', $rally->data['id'])
                    ->first();
                if ($datum) {
                    $nData = $nData
                        ->where('id', '!=', $rally->data['id']);
                    $rally->data = $datum;
                    return $rally;
                }
            })
            ->filter();
        $updateCount = $this->rallydata_repository->updateDataByList($rallies->toArray());
        foreach ($nData as $nDatum) {
            $rally = [
                'user_id'     => Auth::id(),
                'resource_id' => $resourceId,
                'dataset_id'  => $datasetId,
                'data'        => $nDatum,
            ];
            if (empty($rally['data']['id'])) {
                $maxRally = $this->rallydata_repository->findMaxByDatasetResource($rally['dataset_id'],
                    $rally['resource_id']);
                $id = isset($maxRally['data']['id']) ? $maxRally['data']['id'] : 0;
                $rally['data']['id'] = $id + 1;
            }
            $updateCount += (bool)RallyData::create($rally);
        }
        return response()->json([
            'status' => true,
            'data'   => ['updateCount' => $updateCount]
        ]);
    }

    private function _decodeDataMedia($data, $cols, $fields)
    {
        $mediaFiles = [];
        array_shift($data);
        $uniqueIds = [];
        $rData = [];
        foreach ($data as $item) {
            $item = array_combine($cols, $item);
            if (!empty($item['id']) && isset($uniqueIds[$item['id']])) {
                continue;
            }
            $uniqueIds[$item['id']] = true;
            foreach ($item as $key1 => &$item1) {
                $dataType = collect($fields)->where('name', $key1)->first();
                $dataType = $dataType['type'];
                if ($dataType == 'Media') {
                    if (!($files = json_decode($item1, true))) {
                        $files = [$item1];
                    }
                    $media = ['type' => 'media', 'media_ids' => [], 'media' => []];
                    foreach ($files as $file) {
                        $fMedia = preg_replace('/^.+?([0-9\-]+)\.\w+$/mis', '$1', $file);
                        if (substr_count($fMedia, '-') >= 5) {
                            $mediaFiles[] = $fMedia;
                        }
                        $media['media'][] = ['file' => $file];
                    }
                    $item1 = $media;
                }
                if ($dataType == 'Array' || $dataType == 'Object') {
                    $item1 = json_decode($item1, true);
                }
                if ($dataType == 'Select') {
                    $item1 = json_decode($item1, true);
                }
                if ($dataType == 'Boolean') {
                    $item1 = (bool)$item1;
                }
                if ($dataType == 'Number' || $dataType == 'Object ID') {
                    $item1 = preg_match('#\.#mis', $item1)
                        ? (float)$item1 : (int)$item1;
                }
            }
            $rData[] = $item;
        }
        return [$rData, $mediaFiles];
    }
}
