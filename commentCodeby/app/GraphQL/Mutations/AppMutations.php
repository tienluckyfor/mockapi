<?php


namespace App\GraphQL\Mutations;


use App\Models\App;

class AppMutations
{


    public function createApp($_, array $args): App
    {
//        $args['user_id'] = Auth::id();
        dd(1);
        return App::create($args);
    }

}
