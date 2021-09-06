<?php

namespace App\Services;

use App\Repositories\RallydataRepository;
use App\Repositories\ResourceRepository;

class AuthService
{
    private $resource_repository;
    private $rallydata_repository;

    public function __construct(
        ResourceRepository $resourceRepository,
        RallydataRepository $rallydataRepository
    ) {
        $this->resource_repository = $resourceRepository;
        $this->rallydata_repository = $rallydataRepository;
    }

    public function validation($args)
    {
        if ($this->resource_repository->isAuthentication($args['resource_id'])) {
            if (empty($args['data']['_username']) || empty($args['data']['_password'])) {
                return '_username/_password are required';
            }
            $rallies = $this->rallydata_repository->getByDataField($args['dataset_id'], $args['resource_id'],
                ['_username', $args['data']['_username'], @$args['id']]);
            if ($rallies->isNotEmpty()) {
                return '_username is already exists';
            }
        }
    }
}