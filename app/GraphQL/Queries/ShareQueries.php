<?php


namespace App\GraphQL\Queries;

use App\Models\Share;

class ShareQueries
{
    public function getShares($_, array $args)
    {
        $shares = Share::where('shareable_type', $args['shareable_type'])
            ->where('shareable_id', $args['shareable_id'])
            ->orderBy('id', 'desc');
        return $shares->get();
    }
}
