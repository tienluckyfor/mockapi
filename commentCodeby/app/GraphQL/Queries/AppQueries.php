<?php

namespace App\GraphQL\Queries;

use App\Models\App;

class AppQueries
{
//    private $achieve_repository;
//
//    public function __construct(AchieveRepository $achieve_repository)
//    {
//        $this->achieve_repository = $achieve_repository;
//    }

    public function listApp($_, array $args)
    {
        $apps = App::select('*');
        if (!empty($args['name'])) {
            $apps = $apps->where('name', 'like', "%{$args['name']}%");
        }
        return $apps->get();
    }

    public function detailApp($_, array $args)
    {
        return App::select('*')
            ->find($args['id']);
    }

}
