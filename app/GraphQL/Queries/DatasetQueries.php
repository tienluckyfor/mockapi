<?php


namespace App\GraphQL\Queries;

use App\Models\RallyData;
use App\Repositories\ApiRepository;
use App\Repositories\DatasetRepository;
use App\Repositories\ResourceRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;

class DatasetQueries
{
    private $resource_repository;
    private $api_repository;
    private $dataset_repository;

    public function __construct(
        DatasetRepository $DatasetRepository,
        ApiRepository $ApiRepository,
        ResourceRepository $ResourceRepository
    ) {
        $this->dataset_repository = $DatasetRepository;
        $this->api_repository = $ApiRepository;
        $this->resource_repository = $ResourceRepository;
    }

    public function my_dataset_list($_, array $args)
    {
        // datasets
        $datasets = $this->dataset_repository
            ->getByUserIdNameApiId(Auth::id(), @$args['name'], @$args['api_id']);

        // api
        $apiIds = $datasets->pluck('api_id')->toArray();
        $apis = $this->api_repository->getByIds($apiIds, 'id, name')->keyBy('id');

        // rally
        $datasetIds = $datasets->pluck('id')->toArray();
        $rallies = RallyData::selectRaw('count(1) as count, dataset_id, resource_id')
            ->whereIn('dataset_id', $datasetIds)
            ->groupBy('dataset_id')
            ->groupBy('resource_id')
            ->get();

        // resource
        $resourceIds = $rallies->pluck('resource_id')->toArray();
        $resources = $this->resource_repository->getByIds($resourceIds, 'id, name')->keyBy('id');
        $rallies = $rallies
            ->groupBy('dataset_id')
            ->toArray();
        $data = [
            'datasets'  => $datasets->toArray(),
            'apis'      => $apis->toArray(),
            'resources' => $resources->toArray(),
            'rallies'   => $rallies,
        ];
        return $data;
    }
}
