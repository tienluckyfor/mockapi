<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Resource extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'api_id',
        'name',
        'field_template',
        'parents',
        'statuses',
        'fields',
        'endpoints',
    ];

    protected $casts = [
        'parents' => 'array',
        'statuses' => 'array',
        'fields' => 'array',
        'endpoints' => 'array',
    ];

    public function api(): BelongsTo
    {
        return $this->belongsTo(Api::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
