<?php

namespace App\Repositories;

use App\Models\People;

class PeopleRepository
{
    public function upsertByAppId($appId, $people){
        $usPeople = People::updateOrCreate(
            [
                'app_id'    => $appId,
                'unique_id' => $people['unique_id'],
            ],
            $people
        );
        return $usPeople;
    }
}
