<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Media extends Model
{
    use HasFactory;
    use SoftDeletes;

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

    public function getFileAttribute()
    {
        return asset('storage/' . $this->file_name);
    }

    public function getThumbImageAttribute()
    {
        $media_service = app(\App\Services\MediaService::class);
        $file_name = asset('storage/' . $this->file_name);
        return $media_service->get_thumb($file_name);
    }

}
