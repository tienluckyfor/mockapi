<?php


namespace App\GraphQL\Queries;

use App\Models\Api;
use App\Models\Share;
use Illuminate\Support\Facades\Auth;

class ShareQueries
{
    public function getShares($_, array $args)
    {
        $shares = Share::where('shareable_type', $args['shareable_type'])
            ->where('shareable_id', $args['shareable_id']);
        return $shares->get();
    }
}
