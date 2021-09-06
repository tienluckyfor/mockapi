<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\DataSet;
use App\Models\Media;
use App\Models\RallyData;
use App\Repositories\DatasetRepository;
use App\Repositories\MediaRepository;
use App\Repositories\RallydataRepository;
use App\Repositories\ResourceRepository;
use App\Services\ArrService;
use App\Services\AuthService;
use App\Services\StringService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

class RestfulController extends Controller
{
    private $arrService;
    private $dataset_repository;
    private $resource_repository;
    private $rallydata_repository;
    private $media_repository;
    private $auth_service;
    private $string_service;

    public function __construct(
        StringService $stringService,
        AuthService $authService,
        ArrService $arrService,
        MediaRepository $MediaRepository,
        RallydataRepository $RallydataRepository,
        DatasetRepository $DatasetRepository,
        ResourceRepository $ResourceRepository
    ) {
        $this->string_service = $stringService;
        $this->auth_service = $authService;
        $this->arrService = $arrService;
        $this->media_repository = $MediaRepository;
        $this->rallydata_repository = $RallydataRepository;
        $this->dataset_repository = $DatasetRepository;
        $this->resource_repository = $ResourceRepository;
    }

    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

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

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }


    public function update($resourceName, $dataId, Request $request)
    {
        $r = $request->input('_restful');
        $newData = $request->except(['_restful', 'id']);
        $resource = $this->resource_repository->findByNameDatasetId($resourceName, $r['dataset_id']);
        $rallydata = $this->rallydata_repository->findByDataId($r['dataset_id'], $resource->id, $dataId);
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

    function destroy($resourceName, $dataId, Request $request)
    {
        $r = $request->input('_restful');
        $resource = $this->resource_repository->findByNameDatasetId($resourceName, $r['dataset_id']);
        $rallydata = $this->rallydata_repository->findByDataId($r['dataset_id'], $resource->id, $dataId);
        $isDelete = RallyData::where('id', $rallydata['id'])
            ->delete();
        return response()->json([
            'status' => (bool)$isDelete,
        ]);
    }

    protected function _handleParentMedia($rallydatasCurrent, $datasetId, $request, $resources)
    {
        $rallydataIds = [];
        $fields = $request->fields ? explode(',', $request->fields) : false;
        $isChildField = true;

        if ($fields) {
            $isChildField = [];
            foreach ($fields as $field) {
                if (array_search($field, array_column($resources, 'name'))) {
                    $isChildField[] = $field;
                }
            }
            $isChildField = empty($isChildField) ? false : true;
        }

        if ($isChildField) {
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
        }
        foreach ($rallydatasCurrent as &$item) {
            if ($isChildField) {
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
        $thumbSizes = @DataSet::find($datasetId)->api->thumb_sizes ?? [];
        $rallydatasCurrent = $this->rallydata_repository->mappingMedia($rallydatasCurrent, $media, $thumbSizes);
        return $rallydatasCurrent;
    }

    public function list($resourceName, Request $request)
    {
        //
        $r = $request->input('_restful');
        $perPage = $request->per_page && is_numeric($request->per_page)
            ? abs((int)$request->per_page) : 20;
        $currentPage = $request->current_page && is_numeric($request->current_page) && $request->current_page >= -1
            ? (int)$request->current_page : 1;

        $sorts = ['pin_index'];
        if ($request->sort) {
            $sorts = explode(',', $request->sort);
        }
//dd($sorts);
        $searchs = [];
        if ($request->search) {
            $searchs = explode(',', $request->search);
        }

        $parent = [];
        if ($request->parent) {
            $parent = explode(',', $request->parent);
        }
        $resource = $this->resource_repository->findByNameDatasetId($resourceName, $r['dataset_id']);

        if (!empty($parent)) {
            [$rallydatas, $total, $isPrev, $isNext] = $this->rallydata_repository
                ->getByDatasetIdResourceIdParentSearch($r['dataset_id'], $resource->id,
                    [$perPage, $currentPage, $sorts, $searchs, $parent]);
        } else {
            [$rallydatas, $total, $isPrev, $isNext] = $this->rallydata_repository
                ->getByDatasetIdResourceId($r['dataset_id'], $resource->id,
                    [$perPage, $currentPage, $sorts, $searchs]);
        }

        $rallyIds = collect($rallydatas)->pluck('id')->toArray();
        $resources = $this->resource_repository
            ->getByDatasetId($r['dataset_id'])
            ->keyBy('id')
            ->toArray();
        if ($request->has('_parent')) {
            $rallydatas = $this->_getParents($r['dataset_id'], $rallyIds, $resources, $rallydatas);
        }
        $rallydatas = $this->_handleParentMedia($rallydatas, $r['dataset_id'], $request, $resources);
        $totalPage = ceil($total / $perPage);
        if (!($currentPage <= $totalPage && ($currentPage - 1) <= $totalPage) || $currentPage == -1) {
            $isPrev = false;
            $isNext = false;
        }
        if (isset($sorts[1])) {
            $rallydatas = $this->arrService->sort($rallydatas, $sorts[0], $sorts[1]);
        }
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

    public function detail($resourceName, $dataId, Request $request)
    {
        $r = $request->input('_restful');
        $resource = $this->resource_repository->findByNameDatasetId($resourceName, $r['dataset_id']);
        $rally = $this->rallydata_repository->findByDataId($r['dataset_id'], $resource->id, $dataId);
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

    public function authRegister($resourceName, Request $request)
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
        if ($error = $this->auth_service->validation($rallydata)) {
            throw ValidationException::withMessages([$error]);
        }
        $rally = $this->rallydata_repository->createManual($rallydata);
        $res = [
            'status'                => true,
            'data'                  => $rally->data,
            "{$resourceName}_token" => $this->string_service->getRallyToken($rallydata),
        ];
        return response()->json($res);
    }

    public function authLogin($resourceName, Request $request)
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
        $rallies = $this->auth_service->validationLogin($rallydata);
        if (is_string($rallies)) {
            $error = $rallies;
            throw ValidationException::withMessages([$error]);
        }
        $res = [
            'status'                => true,
            'data'                  => $rallies->first()['data'],
            "{$resourceName}_token" => $this->string_service->getRallyToken($rallydata),
        ];
        return response()->json($res);
    }
}
