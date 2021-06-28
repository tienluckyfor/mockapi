<?php

namespace App\Repositories;

use App\Models\Api;

class ApiRepository
{
    public function getById($apiId, $select = '*')
    {
        $api = Api::selectRaw($select)
            ->whereIn('id', $apiId)
            ->first();
        if ($api) {
            return $api->toArray();
        }
        return [];
    }

    public function getByIds($apiIds, $select = '*')
    {
        return Api::selectRaw($select)
            ->whereIn('id', $apiIds)
            ->get();
    }
}
