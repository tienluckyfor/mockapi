<?php


namespace App\GraphQL\Mutations;


use App\Models\SubComment;
use App\Repositories\PeopleRepository;
use App\Services\StringService;
use GraphQL\Error\Error;

class SubCommentMutations
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

    public function upsertSubComment($_, array $args)
    {
        if (!isset($args['people']['unique_id'])) {
            throw new Error('People are required!');
        }
        $args['people_id'] = $this->people_repository->upsertByAppId($args['app_id'], $args['people'])->id;
        \Illuminate\Support\Facades\Log::channel('single')->info('$args', [$args]);
        
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
