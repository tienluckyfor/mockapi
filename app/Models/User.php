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
        'media_ids' => 'array',
    ];


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

    public function getDatasetsAttribute()
    {
        $shareDatasetIds = $this->share_datasets->pluck('shareable_id')->toArray();
        $datasets = DataSet::where('user_id', $this->id)
            ->orWhereIn('id', $shareDatasetIds)
            ->get();
        return $datasets;
    }

    public function share_datasets(): HasMany
    {
        return $this->hasMany(Share::class, 'user_invite_id', 'id')
            ->where('shareable_type', '=', 'App\Models\DataSet');
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
