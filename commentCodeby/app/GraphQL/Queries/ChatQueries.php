<?php

namespace App\GraphQL\Queries;

use App\Models\Chat;
use App\Models\Comment;
use App\Repositories\PeopleRepository;
use App\Repositories\UniqueRepository;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class ChatQueries
{

    private $people_repository;
    private $unique_repository;

    public function __construct(
        UniqueRepository $uniqueRepository,
        PeopleRepository $peopleRepository
    ) {
        $this->unique_repository = $uniqueRepository;
        $this->people_repository = $peopleRepository;
    }

    protected function _countReadComment($app_id, $people_id, $unique_id)
    {
        $chat = Chat::where([
            'app_id'    => $app_id,
            'unique_id' => $unique_id,
            'people_id' => $people_id,
        ])->first();
        return Comment::selectRaw("count(*) as COUNT")
            ->where([
                'app_id'    => $app_id,
                'unique_id' => $unique_id,
            ])
            ->where('id', '>', $chat->read_comment_id ?? 0)
            ->first()
            ->COUNT;
    }

    public function detailChat($_, array $args)
    {
        $unique_id = $this->unique_repository->upsertByAppId($args['app_id'], $args['unique'])->id;
        $people_id = $this->people_repository->upsertByAppId($args['app_id'], $args['people'])->id;
        $count_read_comment = $this->_countReadComment($args['app_id'], $people_id, $unique_id);
        return [
            "count_read_comment" => $count_read_comment
        ];
    }

    public function listChat($_, array $args)
    {
        $people_id = $this->people_repository->upsertByAppId($args['app_id'], $args['people'])->id;
        $query = "SELECT MAX(id) FROM comments WHERE people_id=$people_id AND deleted_at IS NULL GROUP BY unique_id";
        $results = DB::select(DB::raw($query));
        $arr = json_decode(json_encode($results), true);
        $commentIds = Arr::flatten($arr);
        $comments = Comment::whereIn('id', $commentIds)
            ->orderBy('id', 'desc')
            ->get()
            ->map(function ($item) use ($people_id) {
                $count_read_comment = $this->_countReadComment($item->app_id, $item->people_id, $item->unique_id);
                $item->count_read_comment = $count_read_comment;
                $otherId = Comment::where('unique_id', $item->unique_id)
                    ->where('people_id', '!=', $people_id)
                    ->first();
                dd($otherId);
                return $item;
            });
        return $comments;
    }

}
