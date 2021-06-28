<?php


namespace App\GraphQL\Queries;

use App\Repositories\ApiRepository;
use App\Repositories\MediaRepository;
use App\Repositories\ResourceRepository;

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
        return $this->media_repository->getByDatasetId($args['dataset_id']);
    }
}
