<?php


namespace App\GraphQL\Mutations;


use App\Repositories\PeopleRepository;
use App\Services\StringService;
use GraphQL\Error\Error;
use App\Models\Like;

class LikeMutations
{

    private $string_service;
    private $people_repository;

    public function __construct(
        StringService $stringService,
        PeopleRepository $peopleRepository
    ) {
        $this->people_repository = $peopleRepository;
        $this->string_service = $stringService;
    }

    public function upsertLike($_, array $args)
    {
        if (!isset($args['people']['special_id'])) {
            throw new Error('People are required!');
        }
        $args['people_id'] = $this->people_repository->upsertByAppId($args['app_id'], $args['people'])->id;
        $like = Like::updateOrCreate(
            array_intersect_key($args, array_flip(['likeable_type', 'likeable_id', 'people_id'])),
            $args
        );
        return $like;
    }

}
