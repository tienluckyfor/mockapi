<?php

namespace App\Repositories;

use App\Models\DataSet;
//use App\Services\PostmanService;
use Illuminate\Support\Facades\URL;

class DatasetRepository
{

    private $postman_service;
    private $resource_repository;

    public function __construct(
//        PostmanService $PostmanService,
        ResourceRepository $ResourceRepository
    ) {
        $this->resource_repository = $ResourceRepository;
//        $this->postman_service = $PostmanService;
    }

    public function find($id, $select = '*')
    {
        return $dataset = DataSet::selectRaw($select)
            ->where('id', $id)
            ->first();
//        if ($dataset) {
//            return $dataset->toArray();
//        }
//        return [];
    }

    public function getByUserIdNameApiId($userId, $name, $apiId)
    {
        $datasets = Dataset::where('user_id', $userId)
            ->orderBy('id', 'desc');
        if (!empty($name)) {
            $datasets = $datasets
                ->where('name', 'like', "%{$name}%");
        }
        if (!empty($apiId)) {
            $datasets = $datasets
                ->where('api_id', $apiId);
        }
        $datasets = $datasets->get();
        $datasetIds = $datasets->pluck('id');
        $resources = $this->resource_repository
            ->getByDatasetIds($datasetIds, 'datasets.*, resources.name as resource_name')
            ->keyBy('id')
            ->toArray();
        return $datasets
            ->map(function ($dataset) use ($resources) {
                $resource = $resources[$dataset->id];
//                $dataset->api_url = URL::to("/api/restful/{$dataset->id}");
//                $dataset->postman = [
//                    'collection'  => URL::to("/api/postman/{$dataset->id}-c/{$resource['resource_name']}.postman_collection.json"),
//                    'environment' => URL::to("/api/postman/{$dataset->id}-e/{$resource['resource_name']}.postman_environment.json"),
//                ];
//                $dataset = self::postman_mapping($dataset, $resource);
                return $dataset;
            });

    }


//    public function postman_mapping($dataset, $resource){
//        if(!isset($dataset->id)) return;
//        $dataset->api_url = URL::to("/api/restful/{$dataset->id}");
//        $dataset->postman = [
//            'collection'  => URL::to("/api/postman/{$dataset->id}-c/{$resource['resource_name']}.postman_collection.json"),
//            'environment' => URL::to("/api/postman/{$dataset->id}-e/{$resource['resource_name']}.postman_environment.json"),
//        ];
//        return $dataset;
//    }

}
