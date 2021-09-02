<?php

namespace App\Repositories;

use App\Models\DataSet;

class ShareRepository
{
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
