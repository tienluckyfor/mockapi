<?php


namespace App\GraphQL\Mutations;


use App\Models\Comment;
use App\Repositories\PeopleRepository;
use App\Repositories\UniqueRepository;
use App\Services\StringService;
use GraphQL\Error\Error;

class CommentMutations
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

    public function upsertComment($_, array $args)
    {
        if (!isset($args['unique']['special_id'])) {
            throw new Error('Unique is required!');
        }
        if (!isset($args['people']['special_id'])) {
            throw new Error('People are required!');
        }
        $args['unique_id'] = $this->unique_repository->upsertByAppId($args['app_id'], $args['unique'])->id;
        $args['people_id'] = $this->people_repository->upsertByAppId($args['app_id'], $args['people'])->id;
        $comment = Comment::updateOrCreate(
            ['id' => @$args['id']],
            $args
        );
        return $comment;
    }

    public function deleteComment($_, array $args)
    {
        if (isset($args['ids'])) {
            return Comment::whereIn('id', $args['ids'])
                ->delete();
        }
        return Comment::where('id', $args['id'])
            ->delete();
    }

    public function duplicateComment($_, array $args)
    {
        $comment = Comment::find($args['id']);
        if (!$comment) {
            throw new Error('Comment not found');
        }
        $comment = $comment->toArray();
        $comment['name'] = $this->string_service->duplicate($comment['name']);
        if (Comment::create($comment)) {
            return true;
        }
        return false;
    }

}
