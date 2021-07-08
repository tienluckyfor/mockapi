<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Share extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'user_invite_id',
        'shareable_type',
        'shareable_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function user_invite()
    {
        return $this->belongsTo(User::class, 'user_invite_id', 'id');
    }

    public function shareable()
    {
        return $this->morphTo();
    }

}
