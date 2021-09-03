<?php
namespace App\GraphQL\Queries;

use App\Models\Api;
use Illuminate\Support\Facades\Auth;

class ApiQueries
{
    public function myApiList($_, array $args)
    {
        $apis = Api::where('user_id', Auth::id())
            ->orderBy('id', 'desc');
        if ($args['name']) {
            $apis = $apis->where('name', 'like', "%{$args['name']}%");
        }
        return $apis->get();
    }

    public function getApis($_, array $args)
    {
        $user = Auth::user();
//        dd($user->apis->toArray());
        $apis = $user->apis;
        if (!empty($args['name'])) {
            $apis = $apis->where('name', 'like', "%{$args['name']}%");
        }
        return $apis;
    }
}
