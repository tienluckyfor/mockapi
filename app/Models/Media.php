<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\URL;

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
//        'thumbs',
        'view',
        'stage',
    ];

    protected $casts = [
//        'thumbs' => 'array',
    ];

    protected $appends = ['file'];

    public function getFileAttribute()
    {
        return asset('storage') . '/' . $this->file_name;
    }

    /*public function getThumbFilesAttribute()
    {
        return collect($this->thumbs)->map(function ($item){
            return asset('storage') . '/' . $item;
        });
    }*/

}
