<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\URL;

class DataSet extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'datasets';

    protected $fillable = [
        'user_id',
        'api_id',
        'name',
        'locale',
    ];

    public function getResourcesAttribute()
    {
        return Resource::where('api_id', $this->api_id)
            ->get();
    }

    public function getPostmanAttribute()
    {
        return [
            'collection'  => URL::to("/api/postman/{$this->id}-c/postman_collection.json"),
            'environment' => URL::to("/api/postman/{$this->id}-e/postman_environment.json"),
        ];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function api(): BelongsTo
    {
        return $this->belongsTo(Api::class);
    }

    public function shares()
    {
        return $this->morphMany(Share::class, 'shareable')
            ->orderBy('id', 'desc');
    }

    public function rallydatas(): HasMany
    {
        return $this->hasMany(RallyData::class, 'dataset_id', 'id')
            ->selectRaw('resources.name as resource_name, count(*) as aggregate')
            ->join('resources', 'resources.id', '=', 'rallydatas.resource_id')
            ->groupBy('resources.id', 'resources.name');
    }
}
