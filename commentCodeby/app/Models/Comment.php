<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model
{

    use HasFactory, SoftDeletes;

    protected $fillable = [
        'app_id',
        'people_id',
        'unique_id',
        'content',
        'contents',
    ];

    protected $casts = [
        'contents' => 'array',
    ];

    public function people(): BelongsTo
    {
        return $this->belongsTo(People::class);
    }

    public function app(): BelongsTo
    {
        return $this->belongsTo(App::class);
    }
}