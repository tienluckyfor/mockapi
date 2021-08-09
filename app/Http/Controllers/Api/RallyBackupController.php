<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Repositories\MediaRepository;
use App\Repositories\RallydataRepository;
use App\Repositories\ResourceRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RallyBackupController extends Controller
{
    private $rallydata_repository;
    private $resource_repository;
    private $media_repository;

    public function __construct(
        RallydataRepository $rallydataRepository,
        ResourceRepository $resourceRepository,
        MediaRepository $mediaRepository
    ) {
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
        $rallies = $this->rallydata_repository
            ->getByDatasetIdResourceId($datasetId, $resourceId)
            ->map(function ($item) {
                return $item->data;
            });
        $mediaIds = $this->rallydata_repository->getMediaIds($rallies);
        $media = $this->media_repository->getByIds($mediaIds);
        $rallies1 = $this->rallydata_repository->mappingMedia($rallies->toArray(), $media);
        $resource = $this->resource_repository
            ->findByid($resourceId);
        $fields = $resource->fields;
        $arr = [];
        $cols = [];
        foreach ($fields as $field) {
            $cols[] = $field['name'];
        }
        foreach ($rallies1 as $item) {
            $row = [];
            foreach ($cols as $col) {
                $val = isset($item[$col]) ? $item[$col] : null;
                if(isset($val['media'][0]['file']))
                    $val = $val['media'][0]['file'];
                $row[] = $val;
            }
            $arr[] = $row;
        }
        $arr[] = $cols;


        header("Content-Type: text/csv");
        header("Content-Disposition: attachment; filename={$resource->name}.csv");
        function outputCSV($data) {
            $output = fopen("php://output", "wb");
            foreach ($data as $row)
                fputcsv($output, $row);
            fclose($output);
        }

        outputCSV(array_reverse($arr));
    }
}
