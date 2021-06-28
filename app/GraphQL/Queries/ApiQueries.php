<?php


namespace App\GraphQL\Queries;

use App\Models\Api;
use Illuminate\Support\Facades\Auth;

class ApiQueries
{
    public function my_api_list($_, array $args)
    {
        $apis = Api::where('user_id', Auth::id())
            ->orderBy('id', 'desc');
        if ($args['name']) {
            $apis = $apis->where('name', 'like', "%{$args['name']}%");
        }
        return $apis->get();
    }
}
