<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;


class App extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'token',
    ];

    public function people(): HasMany
    {
        return $this->hasMany(People::class);
    }

    public function comment(): HasMany
    {
        return $this->hasMany(Comment::class);
    }
}
