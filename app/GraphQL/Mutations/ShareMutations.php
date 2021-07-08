<?php


namespace App\GraphQL\Mutations;


use App\Models\Share;
use App\Services\StringService;
use Illuminate\Support\Facades\Auth;

class ShareMutations
{
    private $stringService;
    public function __construct(StringService $stringService)
    {
        $this->stringService = $stringService;
    }

    public function createShare($_, array $args): Share
    {
        $args['user_id'] = Auth::id();
        return Share::updateOrCreate(
            array_intersect_key($args, array_flip(['user_invite_id', 'type', 'type_id'])),
            $args
        );
    }

//    public function editShare($_, array $args): Share
//    {
//        $args = array_diff_key($args, array_flip(['directive']));
//        return tap(Share::findOrFail($args['id']))
//            ->update($args);
//    }

    public function deleteShare($_, array $args): bool
    {
        $ids = isset($args['ids']) ? $args['ids'] : [$args['id']];
        return Share::whereIn('id', $ids)->delete();
    }

}
