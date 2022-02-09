<?php

namespace App\Http\Controllers\Api;

use App\Helpers\RallydataHelper;
use App\Http\Controllers\Controller;
use App\Models\RallyData;
use App\Repositories\DatasetRepository;
use App\Repositories\MediaRepository;
use App\Repositories\RallydataRepository;
use App\Repositories\ResourceRepository;
use App\Services\ArrService;
use App\Services\AuthService;
use App\Services\StringService;
use Illuminate\Http\Request;

class RestfulController extends Controller
{
    private $arrService;
    private $dataset_repository;
    private $resource_repository;
    private $rallydata_repository;
    private $media_repository;
    private $auth_service;
    private $string_service;
    private $rallydata_helper;

    public function __construct(
        RallydataHelper $rallydataHelper,
        StringService $stringService,
        AuthService $authService,
        ArrService $arrService,
        MediaRepository $MediaRepository,
        RallydataRepository $RallydataRepository,
        DatasetRepository $DatasetRepository,
        ResourceRepository $ResourceRepository
    ) {
        $this->rallydata_helper = $rallydataHelper;
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

    public function store(Request $request)
    {
        $r = $request->input('_restful');
        $data = $this->rallydata_helper->_getDataByResourceFields($request->all(), $r['resource']['fields']);
        $resource = $r['resource'];//$this->resource_repository->findByNameDatasetId($resourceName, $r['dataset_id']);
        $rallydata = [
            'user_id'     => $r['user_id'],
            'dataset_id'  => $r['dataset_id'],
            'resource_id' => $resource['id'],
            'data'        => $data,
            'is_show'     => true,
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
//        $newData = $request->except(['_restful', 'id']);
        $resource = $r['resource'];//$this->resource_repository->findByNameDatasetId($resourceName, $r['dataset_id']);
        $newData = $this->rallydata_helper->_getDataByResourceFields($request->except(['_restful', 'id']),
            $resource['fields']);
        $rallydata = $this->rallydata_repository->findByDataId($r['dataset_id'], $resource['id'], $dataId);
        if (!$rallydata) {
            return response()->json([
                'status' => false,
            ]);
        }
        $data = array_merge($rallydata['data'], $newData, ['id'=>$dataId]);
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
        $resource = $r['resource'];//$this->resource_repository->findByNameDatasetId($resourceName, $r['dataset_id']);
        $rallydata = $this->rallydata_repository->findByDataId($r['dataset_id'], $resource['id'], $dataId);
//        $isDelete = false;
        $isDelete = RallyData::where('id', @$rallydata['id'])
            ->delete();
        return response()->json([
            'status' => (bool)$isDelete,
        ]);
    }

    public function list($resourceName, Request $request)
    {
        //
        $r = $request->input('_restful');
        $perPage = $request->per_page && is_numeric($request->per_page)
            ? abs((int)$request->per_page) : 20;
        $currentPage = $request->current_page && is_numeric($request->current_page) && $request->current_page >= -1
            ? (int)$request->current_page : 1;
\Illuminate\Support\Facades\Log::channel('single')->info('1', []);

        $sorts = ['pin_index'];
        if ($request->sort) {
            $sorts = explode(',', $request->sort);
        }
        \Illuminate\Support\Facades\Log::channel('single')->info('2', []);
        
        $searchs = [];
        if ($request->search) {
            $searchs = explode(',', $request->search);
        }
\Illuminate\Support\Facades\Log::channel('single')->info('3', []);

        $parent = [];
        if ($request->parent) {
            $parent = explode(',', $request->parent);
        }
        $resource = $r['resource'];//$this->resource_repository->findByNameDatasetId($resourceName, $r['dataset_id']);
\Illuminate\Support\Facades\Log::channel('single')->info('4', []);

        if (!empty($parent)) {
            [$rallydatas, $total, $isPrev, $isNext] = $this->rallydata_repository
                ->getByDatasetIdResourceIdParentSearch($r['dataset_id'], $resource['id'],
                    [$perPage, $currentPage, $sorts, $searchs, $parent]);
        } else {
            [$rallydatas, $total, $isPrev, $isNext] = $this->rallydata_repository
                ->getByDatasetIdResourceId($r['dataset_id'], $resource['id'],
                    [$perPage, $currentPage, $sorts, $searchs]);
        }
\Illuminate\Support\Facades\Log::channel('single')->info('5', []);

        $rallyIds = collect($rallydatas)->pluck('id')->toArray();
        $resources = $this->resource_repository
            ->getByDatasetId($r['dataset_id'])
            ->keyBy('id')
            ->toArray();
        \Illuminate\Support\Facades\Log::channel('single')->info('6', []);
        
        if ($request->has('_parent')) {
            $rallydatas = $this->rallydata_helper->_getParents($r['dataset_id'], $rallyIds, $resources, $rallydatas);
        }
        \Illuminate\Support\Facades\Log::channel('single')->info('7', []);
        
        $rallydatas = $this->rallydata_helper->_handleParentMedia($rallydatas, $r['dataset_id'], $request->fields,
            $resources);
        \Illuminate\Support\Facades\Log::channel('single')->info('8', []);
        
        $totalPage = ceil($total / $perPage);
        if (!($currentPage <= $totalPage && ($currentPage - 1) <= $totalPage) || $currentPage == -1) {
            $isPrev = false;
            $isNext = false;
        }
        if (isset($sorts[1])) {
            $rallydatas = $this->arrService->sort($rallydatas, $sorts[0], $sorts[1]);
        }
        \Illuminate\Support\Facades\Log::channel('single')->info('9', []);
        
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
        \Illuminate\Support\Facades\Log::channel('single')->info('10', []);
        
        $res = array_merge($res, $this->rallydata_helper->_getSystem());
        \Illuminate\Support\Facades\Log::channel('single')->info('11', []);
        
        return response()->json($res);
    }


    public function detail($resourceName, $dataId, Request $request)
    {
        $r = $request->input('_restful');
        $rallydata = $this->rallydata_helper->findRallyById($r, $dataId, $request->has('_parent'), $request->fields);
        $res = ['status' => true, 'data' => $rallydata];
        $res = array_merge($res, $this->rallydata_helper->_getSystem());
        return response()->json($res);
    }

    public function authRegister($resourceName, Request $request)
    {
        $r = $request->input('_restful');
        $data = $request->except('_restful');
        \Illuminate\Support\Facades\Log::channel('single')->info('$request->getContent()', [$request->getContent()]);
        \Illuminate\Support\Facades\Log::channel('single')->info('$data', [$data]);
        
        dd($request->getContent());
        $resource = $r['resource'];
        $rallydata = [
            'user_id'     => $r['user_id'],
            'dataset_id'  => $r['dataset_id'],
            'resource_id' => $resource['id'],
            'data'        => $data,
        ];
        if ($error = $this->auth_service->validation($rallydata)) {
            abort(401, $error);
//            throw ValidationException::withMessages([$error]);
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
        $data = $request->only(['_username', '_password']);

        $rally = $this->rallydata_helper->findRallyByFields($r, $data);
        if ($rally) {
            $res = [
                'status'                => true,
                'data'                  => $rally,
                "{$resourceName}_token" => $this->string_service->getRallyToken(['data' => $data]),
            ];
            return response()->json($res);
        }
        $error = '_username or _password incorrect';
        abort(401, $error);
//        throw ValidationException::withMessages(['_username or _password incorrect']);
    }

    public function auth($resourceName, Request $request)
    {
        $ra = $request->input('_rallydata');
        $res = [
            'status' => true,
            'data'   => $ra,
        ];
        return response()->json($res);
    }
}
