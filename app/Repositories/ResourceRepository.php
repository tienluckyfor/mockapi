<?php

namespace App\Repositories;

use App\Models\Resource;

class ResourceRepository
{
    public function getByIds($resourceIds, $select = '*')
    {
        return Resource::selectRaw($select)
            ->whereIn('id', $resourceIds)
            ->get();
    }

    public function getByApiId($apiId, $select = '*')
    {
        return Resource::selectRaw($select)
            ->where('api_id', $apiId)
            ->get();
    }

    public function getByDatasetId($datasetId, $select = 'resources.*')
    {
        return Resource::selectRaw($select)
            ->join('apis', 'apis.id', '=', 'resources.api_id')
            ->join('datasets', 'datasets.api_id', '=', 'apis.id')
            ->where('datasets.id', $datasetId)
            ->get();
    }

    public function getByDatasetIds($datasetIds, $select = 'resources.*')
    {
        return Resource::selectRaw($select)
            ->join('apis', 'apis.id', '=', 'resources.api_id')
            ->join('datasets', 'datasets.api_id', '=', 'apis.id')
            ->whereIn('datasets.id', $datasetIds)
            ->get();
    }

    public function findByName($name, $select='*'){
        return Resource::selectRaw($select)
            ->where('name', $name)
            ->first();
    }

    public function findByNameDatasetId($name, $datasetId, $select = 'resources.*')
    {
        return Resource::selectRaw($select)
            ->join('apis', 'apis.id', '=', 'resources.api_id')
            ->join('datasets', 'datasets.api_id', '=', 'apis.id')
            ->where('datasets.id', $datasetId)
            ->where('resources.name', $name)
            ->first();
    }
}
