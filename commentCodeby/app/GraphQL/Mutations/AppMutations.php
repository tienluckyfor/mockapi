<?php


namespace App\GraphQL\Mutations;


use App\Models\App;
use App\Services\StringService;
use GraphQL\Error\Error;

class AppMutations
{

    private $string_service;
    public function __construct(StringService $stringService)
    {
        $this->string_service = $stringService;
    }

    public function upsertApp($_, array $args)
    {
        return App::create($args);
    }

    public function deleteApp($_, array $args)
    {
        if (isset($args['ids'])) {
            return App::whereIn('id', $args['ids'])
                ->delete();
        }
        return App::where('id', $args['id'])
            ->delete();
    }

    public function duplicateApp($_, array $args)
    {
        $app = App::find($args['id']);
        if(!$app){
            throw new Error('App not found');
        }
        $app = $app->toArray();
        $app['name'] = $this->string_service->duplicate($app['name']);
        if (App::create($app)) {
            return true;
        }
        return false;
    }

}
