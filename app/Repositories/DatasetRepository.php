<?php

namespace App\Repositories;

use App\Models\DataSet;

class DatasetRepository
{

    private $resource_repository;

    public function __construct(
        ResourceRepository $ResourceRepository
    ) {
        $this->resource_repository = $ResourceRepository;
    }

    public function find($id, $select = '*')
    {
        return $dataset = DataSet::selectRaw($select)
            ->where('id', $id)
            ->first();
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
        return $datasets;
    }


}
