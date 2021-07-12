<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Repositories\DatasetRepository;
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

    public function __construct(
        RallydataRepository $RallydataRepository,
        DatasetRepository $DatasetRepository,
        ResourceRepository $ResourceRepository
    ) {
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
        $url = URL::to("/api/restful/{$resource->name}");
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



}
