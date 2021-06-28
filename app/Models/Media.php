<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'dataset_id',
        'source',
        'uid',
        'name_upload',
        'file_type',
        'file_name',
        'view',
        'stage',
    ];

}
