<?php

namespace App\GraphQL\Queries;

use App\Models\Chat;
use App\Models\Comment;
use App\Repositories\PeopleRepository;
use App\Repositories\UniqueRepository;

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

    public function detailChat($_, array $args)
    {
        $unique_id = $this->unique_repository->findByAppId($args['app_id'], $args['unique'])->id;
        $people_id = $this->people_repository->findByAppId($args['app_id'], $args['people'])->id;
        $chat = Chat::where([
            'app_id'    => $args['app_id'],
            'unique_id' => $unique_id,
            'people_id' => $people_id,
        ])->first();
        $count_read_comment = Comment::selectRaw("count(*) as COUNT")
            ->where([
                'app_id'    => $args['app_id'],
                'unique_id' => $unique_id,
//                'people_id' => $people_id,
            ])
            ->where('id', '>', $chat->read_comment_id ?? 0)
            ->first()
            ->COUNT;
        return [
            "count_read_comment" => $count_read_comment
        ];
    }

}
