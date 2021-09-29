<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
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

    public function subComment(): HasMany
    {
        return $this->hasMany(SubComment::class);
    }

    public function getTotalSubsAttribute()
    {
        return $this->hasMany(SubComment::class)
            ->where('comment_id', $this->id)
            ->count();
    }
}
