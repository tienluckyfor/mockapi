<?php


namespace App\GraphQL\Queries;

use App\Models\Api;
use App\Models\DataSet;
use App\Models\Resource;
use App\Models\Share;
use App\Models\User;
use App\Repositories\MediaRepository;
use App\Repositories\ResourceRepository;
use Illuminate\Support\Facades\Auth;

class UserQueries
{

    private $resource_repository;
    private $mediaRepository;

    public function __construct(
        ResourceRepository $ResourceRepository,
        MediaRepository $mediaRepository
    ) {
        $this->mediaRepository = $mediaRepository;
        $this->resource_repository = $ResourceRepository;
    }

    public function getMe($_, $args)
    {
        return Auth::user()
            ->loadCount(['apis', 'resources', 'datasets']);
//        $total = collect([
//            'api'      => Api::where('user_id', Auth::id())->count(),
//            'resource' => Resource::where('user_id', Auth::id())->count(),
//            'dataset'  => DataSet::where('user_id', Auth::id())->count(),
//        ]);
//        $me = Auth::user()
//            ->loadCount(['apis', 'resources', 'datasets']);
//        $me->total = $total;
//        $me->datasets = DataSet::where('user_id', Auth::id())
//            ->orderBy('id', 'desc')
//            ->get()
//            ->map(function ($dataset) {
//                $dataset->resources =
//                    $this->resource_repository->getByApiId($dataset->api_id);
//                return $dataset;
//            });
//        $media = $this->mediaRepository->getByIds($me->media_ids ?? []);
//        $me->media = $this->mediaRepository->mappingMedia($media);
//        return $me;
    }

    public function getUsers($_, $args)
    {
        $users = User::where('name', 'like', "%{$args['name']}%")
            ->get();
        return $users;
    }

    public function shareSearchUsers($_, $args)
    {
        $users = User::selectRaw('*')
            ->where('name', 'like', "%{$args['name']}%")
            ->where('users.id', '!=', Auth::id())
            ->get();
        $userIds = $users->pluck('id')->toArray();
        $userInviteIds = Share::select('user_invite_id')
            ->where('shareable_type', $args['shareable_type'])
            ->where('shareable_id', $args['shareable_id'])
            ->whereIn('user_invite_id', $userIds)
            ->get()
            ->pluck('user_invite_id')
            ->toArray();
        $users = $users->whereNotIn('id', $userInviteIds);

        return $users;
    }


}
