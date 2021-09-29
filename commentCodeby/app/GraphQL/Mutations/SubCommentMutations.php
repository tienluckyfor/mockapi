<?php


namespace App\GraphQL\Mutations;


use App\Models\Comment;
use App\Models\People;
use App\Models\SubComment;
use App\Services\StringService;
use GraphQL\Error\Error;

class SubCommentMutations
{

    private $string_service;

    public function __construct(StringService $stringService)
    {
        $this->string_service = $stringService;
    }

    public function upsertSubComment($_, array $args)
    {
        // Comment
        $commentId = null;
        if (isset($args['comment_id'])) {
            $commentId = $args['comment_id'];
        }
//        if (isset($args['unique_id'])) {
//            try {
//                $commentId = Comment::where('app_id', $args['app_id'])
//                    ->where('unique_id', $args['unique_id'])
//                    ->first()
//                    ->id;
//            } catch (Exception $e) {
//            }
//        }
//        dd($commentId);
        if (!$commentId) {
            throw new Error('Comment_id is required!');
        }

        // People
        if (!isset($args['people']['unique_id'])) {
            throw new Error('People are required!');
        }
        $people = People::updateOrCreate(
            [
                'app_id'    => @$args['app_id'],
                'unique_id' => @$args['people']['unique_id'],
            ],
            $args['people']
        );
        $args['people_id'] = $people->id;
        $args['comment_id'] = $commentId;
        $subComment = SubComment::updateOrCreate(
            ['id' => @$args['id']],
            $args
        );
        return $subComment;
    }

    public function deleteSubComment($_, array $args)
    {
        if (isset($args['ids'])) {
            return SubComment::whereIn('id', $args['ids'])
                ->delete();
        }
        return SubComment::where('id', $args['id'])
            ->delete();
    }

    public function duplicateSubComment($_, array $args)
    {
        $subComment = SubComment::find($args['id']);
        if (!$subComment) {
            throw new Error('SubComment not found');
        }
        $subComment = $subComment->toArray();
        $subComment['name'] = $this->string_service->duplicate($subComment['name']);
        if (SubComment::create($subComment)) {
            return true;
        }
        return false;
    }

}
