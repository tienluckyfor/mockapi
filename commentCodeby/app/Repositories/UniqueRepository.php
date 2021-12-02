<?php

namespace App\Repositories;

use App\Models\Unique;

class UniqueRepository
{
    public function upsertByAppId($appId, $unique){
        $usUnique = Unique::updateOrCreate(
            [
                'app_id'    => $appId,
                'special_id' => $unique['special_id'],
            ],
            $unique
        );
        return $usUnique;
    }

    public function findByAppId($appId, $unique)
    {
        return Unique::where([
            'app_id'     => $appId,
            'special_id' => $unique['special_id'],
        ])->first();
    }
}
