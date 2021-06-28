<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class RallyData extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'rallydatas';

    protected $fillable = [
        'user_id',
        'dataset_id',
        'resource_id',
        'data',
        'data_children',
    ];

    protected $casts = [
        'data' => 'array',
        'data_children' => 'array',
    ];

    public function resource(): BelongsTo
    {
        return $this->belongsTo(Resource::class);
    }

    public function dataset(): BelongsTo
    {
        return $this->belongsTo(DataSet::class);
    }
}
