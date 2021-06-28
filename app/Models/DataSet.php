<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

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

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function api(): BelongsTo
    {
        return $this->belongsTo(Api::class);
    }
}
