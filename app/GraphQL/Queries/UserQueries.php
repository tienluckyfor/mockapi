<?php


namespace App\GraphQL\Queries;

use App\Models\Api;
use App\Models\DataSet;
use App\Models\Resource;
use App\Models\User;
use App\Repositories\MediaRepository;
use App\Repositories\ResourceRepository;
use Illuminate\Support\Arr;
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
        $total = collect([
            'api'      => Api::where('user_id', Auth::id())->count(),
            'resource' => Resource::where('user_id', Auth::id())->count(),
            'dataset'  => DataSet::where('user_id', Auth::id())->count(),
        ]);
        $me = Auth::user();
        $me->total = $total;
        $me->datasets = DataSet::where('user_id', Auth::id())
            ->orderBy('id', 'desc')
            ->get()
            ->map(function ($dataset) {
                $dataset->resources =
                    $this->resource_repository->getByApiId($dataset->api_id);
                return $dataset;
            });
        $media = $this->mediaRepository->getByIds($me->media_ids ?? []);
        $me->media = $this->mediaRepository->mappingMedia($media);
        return $me;
    }

    public function getUsers($_, $args)
    {
        $users = User::where('name', 'like', "%{$args['name']}%")
            ->get()
            ->map(function ($user) {
                $mediaIds = [Arr::first($user->media_ids)];
                $media = $this->mediaRepository->getByIds($mediaIds);
                $media = $this->mediaRepository->mappingMedia($media);
                $user->medium = Arr::first($media);
                return $user;
            });
        return $users;
    }
}
