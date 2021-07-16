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
        'file_thumb',
        'view',
        'stage',
    ];

    protected $appends = ['file', 'thumb_image'];

    public function getFileAttribute()
    {
        return asset('storage') . '/' . $this->file_name;
    }

    public function getThumbImageAttribute()
    {
        if (preg_match('#thumb-images#', $this->file_thumb)) {
            return asset('storage') . '/' . $this->file_thumb;
        }
        return URL::to('') . '/' . $this->file_thumb;
    }

}
