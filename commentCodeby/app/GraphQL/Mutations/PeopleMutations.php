<?php


namespace App\GraphQL\Mutations;


use App\Models\People;
use App\Services\StringService;
use GraphQL\Error\Error;

class PeopleMutations
{

    private $string_service;
    public function __construct(StringService $stringService)
    {
        $this->string_service = $stringService;
    }

    public function upsertPeople($_, array $args)
    {
        $people = People::updateOrCreate(
            ['id' => @$args['id']],
            $args
        );
        return $people;
    }

    public function deletePeople($_, array $args)
    {
        if (isset($args['ids'])) {
            return People::whereIn('id', $args['ids'])
                ->delete();
        }
        return People::where('id', $args['id'])
            ->delete();
    }

    public function duplicatePeople($_, array $args)
    {
        $people = People::find($args['id']);
        if(!$people){
            throw new Error('People not found');
        }
        $people = $people->toArray();
        $people['name'] = $this->string_service->duplicate($people['name']);
        if (People::create($people)) {
            return true;
        }
        return false;
    }

}
