<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class People extends Model
{

    use HasFactory, SoftDeletes;

    protected $fillable = [
        'app_id',
        'unique_id',
        'name',
        'avatar',
        'more',
    ];

    protected $casts = [
        'more' => 'array',
    ];


    public function app(): BelongsTo
    {
        return $this->belongsTo(App::class);
    }
}
