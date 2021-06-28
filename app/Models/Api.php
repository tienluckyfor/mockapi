<?php

namespace App\Models;

use App\Scopes\ApiScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Api extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'name',
    ];

    public function scopeEnabledApis($query) {
        return $query;
    }

    protected static function booted()
    {
        static::addGlobalScope(new ApiScope());
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function datasources(): HasMany
    {
        return $this->hasMany(Resource::class);
    }

    public function datasets(): HasMany
    {
        return $this->hasMany(DataSet::class);
    }
}
