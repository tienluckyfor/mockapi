<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class ChatRoom extends Model
{
    use \Staudenmeir\EloquentJsonRelations\HasJsonRelationships;
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'app_id',
        'unique_id',
        'people_ids',
    ];

    protected $casts = [
        'people_ids' => 'json',
    ];

    public function people_list()
    {
        return $this->belongsToJson(People::class, "people_ids");
    }


    public function unique(): BelongsTo
    {
        return $this->belongsTo(Unique::class);
    }

    public function getCommentLastAttribute()
    {
        $query = "
SELECT * FROM comments WHERE id IN
(SELECT MAX(id) FROM comments WHERE deleted_at IS NULL AND unique_id = {$this->unique_id} GROUP BY unique_id);
        ";
        $results = DB::select(DB::raw($query));
        $comment = @json_decode(json_encode($results), true)[0];
        return $comment;
//        return $this->belongsToJson(People::class, "people_ids");
    }

}
