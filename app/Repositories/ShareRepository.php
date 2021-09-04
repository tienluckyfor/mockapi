<?php

namespace App\Repositories;

use App\Models\Api;
use App\Models\DataSet;
use App\Models\Resource;

class ShareRepository
{
    public function getOwnerIdsByResourceId($resourceId)
    {
        $resource = Resource::find($resourceId);
        $userIds = Api::find($resource['api_id'])->shares->pluck('user_invite_id');
        return $userIds
            ->merge($resource->user_id)
            ->toArray();
    }

    public function getOwnerIdsByApiId($apiId)
    {
        $api = Api::find($apiId);
        return $api->shares->pluck('user_invite_id')
            ->merge($api->user_id)
            ->toArray();
    }

    public function getOwnerIdsByDatasetId($datasetId)
    {
        $dataset = DataSet::find($datasetId);
        return $dataset->shares->pluck('user_invite_id')
            ->merge($dataset->user_id)
            ->toArray();
    }

    public function getOwnerIdsByRallyId($rallyId)
    {
        $dataset = DataSet::select('datasets.*')
            ->join('rallydatas', 'rallydatas.dataset_id', '=', 'datasets.id')
            ->where('rallydatas.id', $rallyId)
            ->first();
        return $dataset->shares->pluck('user_invite_id')
            ->merge($dataset->user_id)
            ->toArray();
    }

}
