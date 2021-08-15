<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Media;
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
     * @param $resourceName
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store($resourceName, Request $request)
    {
        $r = $request->input('_restful');
        $data = $request->except('_restful');
        $resource = $this->resource_repository->findByNameDatasetId($resourceName, $r['dataset_id']);
        $rallydata = [
            'user_id'     => $r['user_id'],
            'dataset_id'  => $r['dataset_id'],
            'resource_id' => $resource->id,
            'data'        => $data,
        ];
        $rally = $this->rallydata_repository->createManual($rallydata);
        $res = [
            'status' => true,
            'data'   => $rally->data,
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
     * @param $resourceName
     * @param $dataId
     * @param Request $request
     */
    public function update($resourceName, $dataId, Request $request)
    {
        $r = $request->input('_restful');
        $newData = $request->except(['_restful', 'id']);
        $rallydata = $this->_findRallyByDataId($r['dataset_id'], $resourceName, $dataId);
        if (!$rallydata) {
            return response()->json([
                'status' => false,
            ]);
        }
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
     * @param $resourceName
     * @param $dataId
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($resourceName, $dataId, Request $request)
    {
        $r = $request->input('_restful');
        $rallydata = $this->_findRallyByDataId($r['dataset_id'], $resourceName, $dataId);
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
    protected function _handleParentMedia($rallydatasCurrent, $datasetId, $request, $resources)
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
        $media = Media::whereIn('id', $mediaIds)->get();
        $rallydatas = $this->rallydata_repository->mappingMedia($rallydatas->toArray(), $media);
        $fields = $request->fields ? explode(',', $request->fields) : false;
        foreach ($rallydatasCurrent as &$item) {
            $data_children = @$item['data_children'] ?? [];
            foreach ($data_children as $data_child) {
                $r = $resources[$data_child['resource_id']];
                $rd = collect($rallydatas[$r['id']]);
                $item['data'][$r['name']] = $rd
                    ->whereIn('id', $data_child['rallydata_ids'])
                    ->map(function ($item1) {
                        return $item1['data'];
                    })
                    ->values();
            }
            $item = $item['data'];
            if ($fields) {
                array_unshift($fields, 'id');
                array_unshift($fields, '_parent');
                $item = array_intersect_key($item, array_flip($fields));
            }
        }

        $mediaIds = $this->rallydata_repository->getMediaIds($rallydatasCurrent);
        $media = Media::whereIn('id', $mediaIds)->get();
        $rallydatasCurrent = $this->rallydata_repository->mappingMedia($rallydatasCurrent, $media);
        return $rallydatasCurrent;
    }

    /**
     * @param $resourceName
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function list($resourceName, Request $request)
    {
        //
        $r = $request->input('_restful');
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
            ->getByDatasetIdResourceName($r['dataset_id'], $resourceName,
                [$perPage, $currentPage, $sorts, $searchs]);
        $rallyIds = collect($rallydatas)->pluck('id')->toArray();
        $resources = $this->resource_repository
            ->getByDatasetId($r['dataset_id'])
            ->keyBy('id')
            ->toArray();
        if ($request->has('_parent')) {
            $rallydatas = $this->_getParents($r['dataset_id'], $rallyIds, $resources, $rallydatas);
        }
//dd($rallydatas);
        $rallydatas = $this->_handleParentMedia($rallydatas, $r['dataset_id'], $request, $resources);
//dd($rallydatas);
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
        $res = array_merge($res, $this->_getSystem());
        return response()->json($res);
    }

    private function _getSystem()
    {
        $r = request()->input('_restful');
        if (request()->has('_system')) {
            $_system = [
                'management_url' => config('app.frontend_url') . '/RallydataPage?dataset_id_RD=' . $r['dataset_id'],
            ];
        }
        if (isset($_system)) {
            return ['_system' => $_system];
        }
        return [];
    }

    /**
     * @param $resourceName
     * @param $dataId
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function detail($resourceName, $dataId, Request $request)
    {
        $r = $request->input('_restful');
        $rally = $this->_findRallyByDataId($r['dataset_id'], $resourceName, $dataId);
        $resources = $this->resource_repository
            ->getByDatasetId($r['dataset_id'])
            ->keyBy('id')
            ->toArray();
        if ($request->has('_parent')) {
//            $parents = $this->_getParents($r['dataset_id'], [$rally['id']], $resources, [$rally]);
//            $rally['data']['_parent'] = @$parents[$rally['id']];
            $rally = @$this->_getParents($r['dataset_id'], [$rally['id']], $resources, [$rally])[0];
        }
        $rallydata = @$this->_handleParentMedia([$rally], $r['dataset_id'], $request, $resources);
        $rallydata = @$rallydata[0];
        $res = ['status' => true, 'data' => $rallydata];
        $res = array_merge($res, $this->_getSystem());
        return response()->json($res);
    }

    protected function _getParents($datasetId, $rallyIds, $resources, $rallies)
    {
        $query = "
SELECT rallydatas.*
FROM rallydatas
WHERE rallydatas.dataset_id=$datasetId
AND rallydatas.data_children REGEXP 'rallydata_ids.+?(" . implode('|', $rallyIds) . ")'
AND rallydatas.deleted_at IS NULL";
        $results = DB::select(DB::raw($query));
        $parents = json_decode(json_encode($results), true);
        $parentData = [];
        foreach ($parents as $parent) {
            $children = json_decode($parent['data_children'], true);
            $data = json_decode($parent['data'], true);
            foreach ($rallyIds as $rallyId) {
                foreach ($children as $child) {
                    if (in_array($rallyId, $child['rallydata_ids'])) {
                        $parentData[$rallyId] = $parentData[$rallyId] ?? [];
                        $r = $resources[$parent['resource_id']];
                        $parentData[$rallyId][$r['name']] = $data;
                    }
                }
            }
        }
        foreach ($rallies as &$rally) {
            $rally['data']['_parent'] = @$parentData[$rally['id']];
        }
        return $rallies;
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
