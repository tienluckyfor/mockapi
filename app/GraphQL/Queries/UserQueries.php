<?php


namespace App\GraphQL\Queries;

use App\Models\Api;
use App\Models\DataSet;
use App\Models\Resource;
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
        $mediaIds = $this->mediaRepository->getByIds($me->media_ids ?? []);
        $me->media = $this->mediaRepository->mappingMedia($mediaIds);
        return $me;
    }
}
