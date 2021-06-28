<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Repositories\DatasetRepository;
use App\Repositories\MediaRepository;
use App\Repositories\RallydataRepository;
use App\Repositories\ResourceRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\URL;

class RallydataController extends Controller
{
    private $dataset_repository;
    private $resource_repository;
    private $rallydata_repository;
    private $media_repository;

    public function __construct(
        MediaRepository $MediaRepository,
        RallydataRepository $RallydataRepository,
        DatasetRepository $DatasetRepository,
        ResourceRepository $ResourceRepository
    ) {
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
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $datasetId
     * @return \Illuminate\Http\Response
     */

    protected function _getEndpoint($endpoint, $datasetId, $resource, $rallydata)
    {
        $method = $endpoint['name'];
        $url = URL::to("/api/restful/{$datasetId}/{$resource->name}");
        if (in_array($endpoint['type'], ['get_id', 'put', 'delete_id'])) {
            $url .= "/1";
            $method .= $endpoint['type'] == 'get_id' ? ' detail' : '';
        }
        $curl = 'curl ' . $url;
        if ($endpoint['type'] == 'post') {
            $curl = 'curl -d \'' . json_encode($rallydata) . '\' -H "Content-Type: application/json" -X POST ' . $url;
        }
        if ($endpoint['type'] == 'put') {
            $curl = 'curl -d \'' . json_encode($rallydata) . '\' -H "Content-Type: application/json" -X PUT ' . $url;
        }
        if ($endpoint['type'] == 'put') {
            $curl = 'curl -X DELETE ' . $url;
        }
        $endp = [
            'method'   => $method,
            'endpoint' => $url,
            'curl'     => $curl,
        ];
        return $endp;
    }

    public function show($datasetId)
    {
        //
        $resources = $this->resource_repository->getByDatasetId($datasetId,
            'apis.id as api_id, resources.id, resources.name, endpoints, fields, locale')
            ->map(function ($resource) use ($datasetId, &$apiId) {
                $endpoints = [];
                $amounts = [];
                $amounts[$resource->id] = 1;
                $rallydata = Arr::first($this->rallydata_repository->fillData($resource->toArray(), $amounts,
                    $resource->locale));
                foreach ($resource->endpoints as $endpoint) {
                    if (!$endpoint['status']) {
                        continue;
                    }
                    $endp = self::_getEndpoint($endpoint, $datasetId, $resource, $rallydata);
                    $endpoints[] = $endp;
                }
                $resource->endpoints = $endpoints;
                $resource = array_diff_key($resource->toArray(), array_flip(['id', 'locale']));
                return $resource;
            });
        $dataset = $this->dataset_repository->find($datasetId, "name, updated_at, locale");
        $dataset['postman'] = [
            'collection'  => URL::to("/api/postman/{$datasetId}/collection"),
            'environment' => URL::to("/api/postman/{$datasetId}/environment"),
        ];
        $dataset['resources'] = $resources;
        return response()->json($dataset);
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
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
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
//        $resourceId = $this->resource_repository->findByName($resourceName);
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
// handle parent
        $childrenIds = [];
        foreach ($rallydatas as $rallydata) {
            foreach ($rallydata['data_children'] as $data_child) {
                $childrenIds = array_merge($childrenIds, $data_child['rallydata_ids']);
            }
        }
        $children = $this->rallydata_repository->getDataByIds($childrenIds);
        $mediaIds = $this->rallydata_repository->getMediaIds($children->toArray());
        $media = $this->media_repository
            ->getByIds($mediaIds, 'id, file_name')
            ->keyBy('id')
            ->toArray();
        $rd = collect($this->rallydata_repository->mappingMedia($children->toArray(), $media));
        $resources = $this->resource_repository
            ->getByDatasetId($datasetId)
            ->keyBy('id')
            ->toArray();
        $fields = $request->fields ? explode(',', $request->fields) : false;
        foreach ($rallydatas as &$item) {
            foreach ($item['data_children'] as $data_child) {
                $r = $resources[$data_child['resource_id']];
                $item['data'][$r['name']] = $rd
                    ->whereIn('id', $data_child['rallydata_ids'])
                    ->map(function ($item1) {
                        return $item1;
                    });
            }
            $item = $item['data'];
            if ($fields) {
                array_unshift($fields, 'id');
                $item = array_intersect_key($item, array_flip($fields));
            }
        }

        $mediaIds = $this->rallydata_repository->getMediaIds($rallydatas);
        $media = $this->media_repository
            ->getByIds($mediaIds, 'id, file_name')
            ->keyBy('id')
            ->toArray();
        $rallydatas = $this->rallydata_repository->mappingMedia($rallydatas, $media);
        $totalPage = ceil($total / $perPage);
        if (!($currentPage <= $totalPage && ($currentPage - 1) <= $totalPage) || $currentPage == -1) {
            $isPrev = false;
            $isNext = false;
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
        return response()->json($res);
    }


}
