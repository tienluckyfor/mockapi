<?php

namespace App\GraphQL\Queries;

use App\Models\ChatRoom;
use App\Repositories\PeopleRepository;
use App\Repositories\UniqueRepository;

class ChatRoomQueries
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

    public function listChatRoom($_, array $args)
    {
        $people_id = $this->people_repository->upsertByAppId($args['app_id'], $args['people'])->id;
        $rooms = ChatRoom::whereJsonContains('people_ids', [$people_id])
            ->get()
            ->map(function ($item) use ($people_id) {
                $item->other_list = $item->people_list->where('id', '!=', $people_id);
                $item->other = $item->other_list->first();
                return $item;
            });
        return $rooms;
    }

}
