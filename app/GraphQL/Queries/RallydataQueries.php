<?php


namespace App\GraphQL\Queries;

use App\Repositories\DatasetRepository;
use App\Repositories\MediaRepository;
use App\Repositories\RallydataRepository;
use App\Repositories\ResourceRepository;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;

class RallydataQueries
{
    private $dataset_repository;
    private $resource_repository;
    private $rallydata_repository;
    private $media_repository;

    public function __construct(
        MediaRepository $MediaRepository,
        RallydataRepository $RallydataRepository,
        DatasetRepository $DatasetRepository,
        ResourceRepository $ResourceRepository
    ) {
        $this->media_repository = $MediaRepository;
        $this->rallydata_repository = $RallydataRepository;
        $this->dataset_repository = $DatasetRepository;
        $this->resource_repository = $ResourceRepository;
    }

    public function rallydataList($_, array $args)
    {
        $rallydatas = $this->rallydata_repository->getByDatasetIdResourceId($args['dataset_id'], $args['resource_id']);
        $data = ['rallydatas' => $rallydatas];
        return $data;
    }

    public function myRallydataList($_, array $args)
    {
        $rallydatas = $this->rallydata_repository
            ->getMyDatasetId(Auth::id(), $args['dataset_id'])
            ->groupBy('resource_id');
        $mediaIds = $this->rallydata_repository->getMediaIds($rallydatas->toArray());
        $media = $this->media_repository
            ->getByIds($mediaIds, 'id, file_name')
            ->keyBy('id')
            ->toArray();
        $rallydatas = $this->rallydata_repository->mappingMedia($rallydatas->toArray(), $media);
// handle parent
        $resources = $this->resource_repository
            ->getByDatasetId($args['dataset_id'])
            ->keyBy('id')
            ->toArray();
        if (isset($args['resource_id'], $rallydatas[$args['resource_id']])) {
            $rallydatasCurrent = @$rallydatas[$args['resource_id']] ?? [];
            foreach ($rallydatasCurrent as &$item) {
                if(!isset($item['data_children'])) continue;
                foreach ($item['data_children'] as $data_child) {
                    $r = $resources[$data_child['resource_id']];
                    if(!isset($rallydatas[$r['id']])) continue;
                    $rd = collect($rallydatas[$r['id']]);
                    $item['data'][$r['name']] = $rd->whereIn('id', $data_child['rallydata_ids'])
                        ->map(function ($item1) {
                            return $item1['data'];
                        })
                    ->values();
                }
            }
            $rallydatas[$args['resource_id']] = $rallydatasCurrent;
        }
        $data = ['rallydatas' => $rallydatas];
        return $data;
    }

    public function detailRallydata($_, array $args)
    {
        $dataset = $this->dataset_repository->find($args['dataset_id'], '*');
        $resources = $this->resource_repository->getByApiId(@$dataset->api_id,
            'id, name, fields, parents, resources.name as resource_name')
            ->keyBy('id')
            ->toArray();
        $dataset = $this->dataset_repository->postman_mapping($dataset, Arr::first($resources));
//        dd($resources);
        foreach ($resources as &$resource) {
            if (!empty($resource['parents'])) {
                foreach ($resource['parents'] as $parent) {
                    $resources[$parent]['fields'][] = [
                        "name" => $resource['name'],
                        "type" => "Resource",
                    ];
                }
            }
        }
        $data = [
            'dataset'   => $dataset,
            'resources' => array_values($resources),
        ];
        return $data;
    }
}
