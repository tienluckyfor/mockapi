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
//        'thumb_sizes',
    ];

    protected $casts = [
//        'thumb_sizes' => 'array',
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

    public function resources(): HasMany
    {
        return $this->hasMany(Resource::class);
    }

    public function datasets(): HasMany
    {
        return $this->hasMany(DataSet::class);
    }

    public function shares()
    {
        return $this->morphMany(Share::class, 'shareable')
            ->orderBy('id', 'desc');
    }
}
