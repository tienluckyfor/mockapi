<?php


namespace App\GraphQL\Mutations;


use App\Models\Chat;
use App\Repositories\PeopleRepository;
use App\Repositories\UniqueRepository;
use App\Services\StringService;
use GraphQL\Error\Error;

class ChatMutations
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

    public function upsertChat($_, array $args)
    {
        if (!isset($args['unique']['special_id'])) {
            throw new Error('Unique is required!');
        }
        if (!isset($args['people']['special_id'])) {
            throw new Error('People are required!');
        }
        $args['unique_id'] = $this->unique_repository->findByAppId($args['app_id'], $args['unique'])->id;
        $args['people_id'] = $this->people_repository->findByAppId($args['app_id'], $args['people'])->id;
        $chat = Chat::updateOrCreate(
            array_intersect_key($args, array_flip(['app_id', 'unique_id', 'people_id'])),
            $args
        );
        return $chat;
    }
}
