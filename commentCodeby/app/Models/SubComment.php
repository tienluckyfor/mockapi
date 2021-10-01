<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SubComment extends Model
{
    use HasFactory;
    protected $fillable = [
        'comment_id',
        'people_id',
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

    public function comment(): BelongsTo
    {
        return $this->belongsTo(Comment::class);
    }

    public function getTotalLikeAttribute()
    {
        return Like::selectRaw('count(*) as COUNT')
            ->where('likeable_type', 'App\\Models\\SubComment')
            ->where('likeable_id', $this->id)
            ->where('is_like', true)
            ->first()
            ->COUNT;
    }

    public function getTotalDislikeAttribute()
    {
        return Like::selectRaw('count(*) as COUNT')
            ->where('likeable_type', 'App\\Models\\SubComment')
            ->where('likeable_id', $this->id)
            ->where('is_dislike', true)
            ->first()
            ->COUNT;
    }

    public function likes()
    {
        return $this->morphMany(Like::class, 'likeable')
            ->orderBy('id', 'desc');
    }
}
