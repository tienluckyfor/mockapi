<?php


namespace App\GraphQL\Queries;

use App\Models\Media;
use App\Repositories\ApiRepository;
use App\Repositories\MediaRepository;
use App\Repositories\ResourceRepository;
use Illuminate\Support\Facades\Auth;

class MediaQueries
{
    private $resource_repository;
    private $api_repository;
    private $media_repository;

    public function __construct(
        MediaRepository $MediaRepository,
        ApiRepository $ApiRepository,
        ResourceRepository $ResourceRepository
    ) {
        $this->media_repository = $MediaRepository;
        $this->api_repository = $ApiRepository;
        $this->resource_repository = $ResourceRepository;
    }

    public function myMediaList($_, array $args)
    {
        if (!empty($args['dataset_id'])) {
            return Media::where('dataset_id', $args['dataset_id'])
                ->orderBy('id', 'desc')
                ->get();
        }
        return Media::where('user_id', Auth::id())
            ->orderBy('id', 'desc')
            ->get();
    }
}
