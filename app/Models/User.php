<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use \Staudenmeir\EloquentJsonRelations\HasJsonRelationships;
    use HasFactory, Notifiable;
    use HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'media_ids',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'media_ids'         => 'array',
    ];

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new \App\Notifications\ResetPassword($token));
    }


    public function apis(): HasMany
    {
        return $this->hasMany(Api::class);
    }

    public function resources(): HasMany
    {
        return $this->hasMany(Resource::class);
    }

    public function datasets(): HasMany
    {
        return $this->hasMany(DataSet::class);
    }

// Apis
    public function getApisAttribute()
    {
        $shareApiIds = $this->share_apis->pluck('shareable_id')->toArray();
        $apis = Api::where('user_id', $this->id)
            ->orWhereIn('id', $shareApiIds)
            ->orderBy('updated_at', 'desc')
            ->get();
        return $apis;
    }

    public function share_apis(): HasMany
    {
        return $this->hasMany(Share::class, 'user_invite_id', 'id')
            ->join('apis', 'apis.id', '=', 'shares.shareable_id')
            ->where('shareable_type', '=', 'App\Models\Api')
            ->whereNull('apis.deleted_at');
    }

// Resources
    public function getResourcesAttribute()
    {
        $shareResourceIds = $this->share_apis->pluck('shareable_id')->toArray();
        $resources = Resource::where('user_id', $this->id)
            ->orWhereIn('api_id', $shareResourceIds)
            ->orderBy('updated_at', 'desc')
            ->get();
        return $resources;
    }

    public function share_resources(): HasMany
    {
        return $this->hasMany(Share::class, 'user_invite_id', 'id')
            ->join('apis', 'apis.id', '=', 'shares.shareable_id')
            ->join('resources', 'resources.api_id', '=', 'apis.id')
            ->where('shareable_type', '=', 'App\Models\Api')
            ->whereNull('apis.deleted_at');
    }

// Datasets
    public function getDatasetsAttribute()
    {
        $shareDatasetIds = $this->share_datasets->pluck('shareable_id')->toArray();
        $datasets = DataSet::where('user_id', $this->id)
            ->orWhereIn('id', $shareDatasetIds)
            ->orderBy('updated_at', 'desc')
            ->get();
        return $datasets;
    }

    public function share_datasets(): HasMany
    {
        return $this->hasMany(Share::class, 'user_invite_id', 'id')
            ->join('datasets', 'datasets.id', '=', 'shares.shareable_id')
            ->where('shareable_type', '=', 'App\Models\DataSet')
            ->whereNull('datasets.deleted_at');
    }

    public function media()
    {
        return $this->belongsToJson(Media::class, "media_ids");
    }

    public function medium()
    {
        return $this->belongsTo(Media::class, "media_ids");
    }

}
