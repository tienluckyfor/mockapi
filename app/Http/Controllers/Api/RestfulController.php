<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\RallyData;
use App\Repositories\DatasetRepository;
use App\Repositories\MediaRepository;
use App\Repositories\RallydataRepository;
use App\Repositories\ResourceRepository;
use App\Services\ArrService;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class RestfulController extends Controller
{
    private $arrService;
    private $dataset_repository;
    private $resource_repository;
    private $rallydata_repository;
    private $media_repository;

    public function __construct(
        ArrService $arrService,
        MediaRepository $MediaRepository,
        RallydataRepository $RallydataRepository,
        DatasetRepository $DatasetRepository,
        ResourceRepository $ResourceRepository
    ) {
        $this->arrService = $arrService;
        $this->media_repository = $MediaRepository;
        $this->rallydata_repository = $RallydataRepository;
        $this->dataset_repository = $DatasetRepository;
        $this->resource_repository = $ResourceRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * @param $datasetId
     * @param $resourceName
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store($datasetId, $resourceName, Request $request)
    {
        //
        $resource = $this->resource_repository->findByName($resourceName);
        $rallydata = [
            'dataset_id'  => $datasetId,
            'resource_id' => $resource->id,
            'data'        => $request->all(),
        ];
        $res = [
            'status' => true,
            'data'   => $this->rallydata_repository->createManual($rallydata),
        ];
        return response()->json($res);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * @param $datasetId
     * @param $resourceName
     * @param $dataId
     * @param Request $request
     */
    public function update($datasetId, $resourceName, $dataId, Request $request)
    {
        //
        $rallydata = $this->_findRallyByDataId($datasetId, $resourceName, $dataId);
        $newData = $request->all();
        $data = array_merge($rallydata['data'], $newData);
        $isUpdate = RallyData::where('id', $rallydata['id'])
            ->update([
                'data' => $data,
            ]);
        return response()->json([
            'status' => (bool)$isUpdate,
        ]);
    }

    /**
     * @param $datasetId
     * @param $resourceName
     * @param $dataId
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($datasetId, $resourceName, $dataId, Request $request)
    {
        //
        $rallydata = $this->_findRallyByDataId($datasetId, $resourceName, $dataId);
        $isDelete = RallyData::where('id', $rallydata['id'])
            ->delete();
        return response()->json([
            'status' => (bool)$isDelete,
        ]);
    }

    /**
     * @param array $rallydatas
     * @param $datasetId
     * @param $request
     * @return mixed
     */
    protected function _handleParentMedia($rallydatasCurrent, $datasetId, $request)
    {
        $rallydataIds = [];
        foreach ($rallydatasCurrent as $rallydata) {
            $data_children = @$rallydata['data_children'] ?? [];
            foreach ($data_children as $data_child) {
                $rallydataIds = array_merge($rallydataIds, $data_child['rallydata_ids']);
            }
        }
        $rallydatas = $this->rallydata_repository
            ->getByDatasetId($datasetId, $rallydataIds)
            ->groupBy('resource_id');
        $mediaIds = $this->rallydata_repository->getMediaIds($rallydatas->toArray());
        $media = $this->media_repository
            ->getByIds($mediaIds, 'id, file_name')
            ->keyBy('id')
            ->toArray();
        $rallydatas = $this->rallydata_repository->mappingMedia($rallydatas->toArray(), $media);
        $resources = $this->resource_repository
            ->getByDatasetId($datasetId)
            ->keyBy('id')
            ->toArray();
        $fields = $request->fields ? explode(',', $request->fields) : false;
        foreach ($rallydatasCurrent as &$item) {
            $data_children = @$item['data_children'] ?? [];
//            dd($data_children);
            foreach ($data_children as $data_child) {
                $r = $resources[$data_child['resource_id']];
                $rd = collect($rallydatas[$r['id']]);

//                dd($data_child['rallydata_ids']);
//                dd($rd);
                $item['data'][$r['name']] = $rd
                    ->whereIn('id', $data_child['rallydata_ids'])
                    ->map(function ($item1) {
                        return $item1['data'];
                    })
                    ->values();
            }
//            dd($item);
            $item = $item['data'];
            if ($fields) {
                array_unshift($fields, 'id');
                $item = array_intersect_key($item, array_flip($fields));
            }
        }

        $mediaIds = $this->rallydata_repository->getMediaIds($rallydatasCurrent);
        $media = $this->media_repository
            ->getByIds($mediaIds, 'id, file_name')
            ->keyBy('id')
            ->toArray();
        $rallydatasCurrent = $this->rallydata_repository->mappingMedia($rallydatasCurrent, $media);
        return $rallydatasCurrent;
    }

    /**
     * @param $datasetId
     * @param $resourceName
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function list($datasetId, $resourceName, Request $request)
    {
        //
        $perPage = $request->per_page && is_numeric($request->per_page)
            ? abs((int)$request->per_page) : 20;
        $currentPage = $request->current_page && is_numeric($request->current_page) && $request->current_page >= -1
            ? (int)$request->current_page : 1;

        $sorts = ['id', 'desc'];
        if ($request->sort) {
            $sorts = explode(',', $request->sort);
        }
        $searchs = [];
        if ($request->search) {
            $searchs = explode(',', $request->search);
        }
        [$rallydatas, $total, $isPrev, $isNext] = $this->rallydata_repository
            ->getByDatasetIdResourceName($datasetId, $resourceName,
                [$perPage, $currentPage, $sorts, $searchs]);
        $rallydatas = array_map(function ($rally) {
            $data = json_decode($rally['data'], true);
            $data_children = json_decode($rally['data_children'], true);
            return ['data' => $data, 'data_children' => $data_children];
        }, $rallydatas);

        $rallydatas = $this->_handleParentMedia($rallydatas, $datasetId, $request);

        $totalPage = ceil($total / $perPage);
        if (!($currentPage <= $totalPage && ($currentPage - 1) <= $totalPage) || $currentPage == -1) {
            $isPrev = false;
            $isNext = false;
        }
        $rallydatas = $this->arrService->sort($rallydatas, $sorts[0], $sorts[1]);
        $res = [
            "data"       => $rallydatas,
            "pageInfo"   => [
                "per_page"     => $currentPage == -1 ? $total : $perPage,
                "current_page" => $currentPage,
                "total_item"   => $total,
                "total_page"   => $currentPage == -1 ? 1 : ceil($total / $perPage),
                "is_prev"      => $isPrev,
                "is_next"      => $isNext,
            ],
            "sortInfo"   => $sorts,
            "searchInfo" => $searchs,
        ];
        return response()->json($res);
    }

    /**
     * @param $datasetId
     * @param $resourceName
     * @param $dataId
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function detail($datasetId, $resourceName, $dataId, Request $request)
    {
        $rallydata = $this->_findRallyByDataId($datasetId, $resourceName, $dataId);
        $rallydata = @$this->_handleParentMedia([$rallydata], $datasetId, $request)[0];
        $res = ['status' => true, 'data' => $rallydata];
        return response()->json($res);
    }

    /**
     * @param $datasetId
     * @param $resourceName
     * @param $dataId
     * @return mixed
     */
    protected function _findRallyByDataId($datasetId, $resourceName, $dataId)
    {
        $query = "
SELECT rallydatas.*
FROM rallydatas inner join resources r on rallydatas.resource_id = r.id
WHERE r.name='{$resourceName}' AND rallydatas.dataset_id={$datasetId} 
AND rallydatas.data REGEXP '(\"id\"[^,]+{$dataId})' AND rallydatas.deleted_at IS NULL";
        $results = DB::select(DB::raw($query));
        $rallydata = json_decode(json_encode($results), true);
        $rallydata = array_map(function ($item) {
            $item['data'] = json_decode($item['data'], true);
            $item['data_children'] = json_decode($item['data_children'], true);
            return $item;
        }, $rallydata ?? []);
        $rallydata = Arr::where($rallydata, function ($item, $key) use ($dataId) {
            return @$item['data']['id'] == $dataId;
        });
        return Arr::first($rallydata);
    }
}
