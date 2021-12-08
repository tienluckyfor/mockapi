<?php


namespace App\GraphQL\Mutations;


use App\Models\ChatRoom;
use App\Repositories\PeopleRepository;
use App\Repositories\UniqueRepository;
use App\Services\StringService;
use GraphQL\Error\Error;

class ChatRoomMutations
{

    private $string_service;
    private $people_repository;
    private $unique_repository;

    public function __construct(
        StringService $stringService,
        UniqueRepository $uniqueRepository,
        PeopleRepository $peopleRepository
    ) {
        $this->unique_repository = $uniqueRepository;
        $this->people_repository = $peopleRepository;
        $this->string_service = $stringService;
    }

    public function upsertChatRoom($_, array $args)
    {
//        dd($args);
        if (!isset($args['unique']['special_id'])) {
            throw new Error('Unique is required!');
        }
        if (!isset($args['people_list'])) {
            throw new Error('People list are required!');
        }
        $args['unique_id'] = $this->unique_repository->upsertByAppId($args['app_id'], $args['unique'])->id;
        $args['people_ids'] = [];
        foreach ($args['people_list'] as $people) {
            $peopleId = $this->people_repository->upsertByAppId($args['app_id'], $people)->id;
            array_push($args['people_ids'], $peopleId);
        }
        $args['people_ids'] = array_unique($args['people_ids']);
        $chatRoom = ChatRoom::updateOrCreate(
            array_intersect_key($args, array_flip(['app_id', 'unique_id'])),
            $args
        );
        return $chatRoom;
    }
}
