<?php


namespace App\GraphQL\Queries;

use App\Models\DataSet;
use App\Models\Share;

class ShareQueries
{
    public function getShares($_, array $args)
    {
        $shares = Share::where('shareable_type', $args['shareable_type'])
            ->where('shareable_id', $args['shareable_id'])
            ->orderBy('id', 'desc')
            ->get();
        switch ($args['shareable_type']) {
            case 'App\Models\DataSet':
                $owner = DataSet::find($args['shareable_id'])
                    ->user;
                $share = collect([
                    'is_owner'    => true,
                    'user_invite' => $owner,
                    'updated_at'  => null,
                ]);
                $shares->prepend($share);
                break;
        }
//        dd($shares->toArray());
        return $shares;
    }

    public function getSharesOwnerInvite($_, array $args)
    {
        switch ($args['shareable_type']) {
            case 'App\Models\DataSet':
                $owner = DataSet::find($args['shareable_id'])
                    ->user;
                break;
        }
        $invites = Share::where('shareable_type', $args['shareable_type'])
            ->where('shareable_id', $args['shareable_id'])
            ->orderBy('id', 'desc')
            ->get()
            ->map(function ($share) {
                return $share->user_invite;
            });
        return ['owners' => [$owner], 'invites' => $invites];
    }
}
