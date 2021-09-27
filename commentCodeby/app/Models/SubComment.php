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
}
