<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Unique extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'app_id',
        'special_id',
    ];

    public function getTotalLikeAttribute()
    {
        return Like::selectRaw('count(*) as COUNT')
            ->where('likeable_type', 'App\\Models\\Unique')
            ->where('likeable_id', $this->id)
            ->where('is_like', true)
            ->first()
            ->COUNT;
    }

    public function getTotalDislikeAttribute()
    {
        return Like::selectRaw('count(*) as COUNT')
            ->where('likeable_type', 'App\\Models\\Unique')
            ->where('likeable_id', $this->id)
            ->where('is_dislike', true)
            ->first()
            ->COUNT;
    }

    public function comment(): HasMany
    {
        return $this->hasMany(Comment::class);
    }
}
