<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    use HasFactory;

    protected $fillable = [
        'app_id',
        'unique_id',
        'people_id',
        'read_comment_id',
    ];

    protected $casts = [
    ];
}
