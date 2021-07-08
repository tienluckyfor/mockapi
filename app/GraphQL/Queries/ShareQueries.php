<?php


namespace App\GraphQL\Queries;

use App\Models\Api;
use App\Models\Share;
use Illuminate\Support\Facades\Auth;

class ShareQueries
{
    public function getShares($_, array $args)
    {
        $shares = Share::where('type', $args['type'])
            ->where('type_id', $args['type_id']);
        return $shares->get();
    }
}
