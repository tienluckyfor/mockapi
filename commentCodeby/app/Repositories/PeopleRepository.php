<?php

namespace App\Repositories;

use App\Models\People;

class PeopleRepository
{
    public function upsertByAppId($appId, $people)
    {
        $usPeople = People::updateOrCreate(
            [
                'app_id'     => $appId,
                'special_id' => $people['special_id'],
            ],
            $people
        );
        return $usPeople;
    }

    public function findByAppId($appId, $people)
    {
        return People::where([
            'app_id'     => $appId,
            'special_id' => $people['special_id'],
        ])->first();
    }
}
