<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Like extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'people_id',
        'likeable_type',
        'likeable_id',
        'is_like',
        'is_dislike',
    ];

    protected $casts    = [
        'is_like' => 'boolean',
        'is_dislike' => 'boolean',
    ];

    public function likeable()
    {
        return $this->morphTo();
    }

    public function people(): BelongsTo
    {
        return $this->belongsTo(People::class);
    }
}
