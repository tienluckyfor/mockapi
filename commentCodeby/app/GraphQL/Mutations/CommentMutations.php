<?php


namespace App\GraphQL\Mutations;


use App\Models\Comment;
use App\Models\People;
use App\Services\StringService;
use GraphQL\Error\Error;

class CommentMutations
{

    private $string_service;

    public function __construct(StringService $stringService)
    {
        $this->string_service = $stringService;
    }

    public function upsertComment($_, array $args)
    {
        if (!isset($args['people']['unique_id'])) {
            throw new Error('People are required!');
        }
        $people = People::updateOrCreate(
            [
                'app_id'    => @$args['app_id'],
                'unique_id' => @$args['people']['unique_id'],
            ],
            $args
        );
        $args['people_id'] = $people->id;
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
