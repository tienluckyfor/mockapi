<?php


namespace App\GraphQL\Mutations;


use App\Models\Unique;
use App\Repositories\PeopleRepository;
use App\Services\StringService;
use GraphQL\Error\Error;

class UniqueMutations
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

    public function upsertUnique($_, array $args)
    {
        if (!isset($args['unique']['special_id'])) {
            throw new Error('Unique is required!');
        }
        $unique = Unique::updateOrCreate(
            [
                'app_id'     => $args['app_id'],
                'special_id' => $args['unique']['special_id']
            ],
            $args
        );
        $unique->view_count = ($unique->exists ? $unique->view_count : 0) + 1;
        $unique->save();
        return $unique;
    }

    public function deleteUnique($_, array $args)
    {
        if (isset($args['ids'])) {
            return Unique::whereIn('id', $args['ids'])
                ->delete();
        }
        return Unique::where('id', $args['id'])
            ->delete();
    }

    public function duplicateUnique($_, array $args)
    {
        $unique = Unique::find($args['id']);
        if (!$unique) {
            throw new Error('Unique not found');
        }
        $unique = $unique->toArray();
        $unique['name'] = $this->string_service->duplicate($unique['name']);
        if (Unique::create($unique)) {
            return true;
        }
        return false;
    }

}
