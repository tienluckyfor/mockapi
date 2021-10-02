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

//    public function deleteLike($_, array $args)
//    {
//        if (isset($args['ids'])) {
//            return Like::whereIn('id', $args['ids'])
//                ->delete();
//        }
//        return Like::where('id', $args['id'])
//            ->delete();
//    }
//
//    public function duplicateLike($_, array $args)
//    {
//        $like = Like::find($args['id']);
//        if (!$like) {
//            throw new Error('Like not found');
//        }
//        $like = $like->toArray();
//        $like['name'] = $this->string_service->duplicate($like['name']);
//        if (Like::create($like)) {
//            return true;
//        }
//        return false;
//    }

}
