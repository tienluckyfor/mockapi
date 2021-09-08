<?php

namespace App\Helpers;

use App\Models\DataSet;
use App\Models\Media;
use App\Repositories\RallydataRepository;
use App\Repositories\ResourceRepository;
use App\Services\AuthService;
use App\Services\StringService;
use Illuminate\Support\Facades\DB;

class RallydataHelper
{
    private $resource_repository;
    private $rallydata_repository;
    private $auth_service;
    private $string_service;

    public function __construct(
        StringService $stringService,
        AuthService $authService,
        RallydataRepository $rallydataRepository,
        ResourceRepository $resourceRepository
    ) {
        $this->resource_repository = $resourceRepository;
        $this->string_service = $stringService;
        $this->auth_service = $authService;
        $this->rallydata_repository = $rallydataRepository;
    }

    public function _handleParentMedia($rallydatasCurrent, $datasetId, $fieldStr, $resources)
    {
        $rallydataIds = [];
        $fields = $fieldStr ? explode(',', $fieldStr) : false;
        $isChildField = true;
        if ($fields) {
            $isChildField = [];
            foreach ($fields as $field) {
                if (array_search($field, array_column($resources, 'name'))) {
                    $isChildField[] = $field;
                }
            }
            $isChildField = empty($isChildField) ? false : true;
        }

        if ($isChildField) {
            foreach ($rallydatasCurrent as $rallydata) {
                $data_children = @$rallydata['data_children'] ?? [];
                foreach ($data_children as $data_child) {
                    $rallydataIds = array_merge($rallydataIds, $data_child['rallydata_ids']);
                }
            }
            $rallydatas = $this->rallydata_repository
                ->getByDatasetId($datasetId, $rallydataIds)
                ->groupBy('resource_id');
            $mediaIds = $this->rallydata_repository->getMediaIds($rallydatas->toArray());
            $media = Media::whereIn('id', $mediaIds)->get();
            $rallydatas = $this->rallydata_repository->mappingMedia($rallydatas->toArray(), $media);
        }
        foreach ($rallydatasCurrent as &$item) {
            if ($isChildField) {
                $data_children = @$item['data_children'] ?? [];
                foreach ($data_children as $data_child) {
                    $r = $resources[$data_child['resource_id']];
                    $rd = collect($rallydatas[$r['id']]);
                    $item['data'][$r['name']] = $rd
                        ->whereIn('id', $data_child['rallydata_ids'])
                        ->map(function ($item1) {
                            return $item1['data'];
                        })
                        ->values();
                }
            }
            $item = $item['data'];
            if ($fields) {
                array_unshift($fields, 'id');
                array_unshift($fields, '_parent');
                $item = array_intersect_key($item, array_flip($fields));
            }
        }

        $mediaIds = $this->rallydata_repository->getMediaIds($rallydatasCurrent);
        $media = Media::whereIn('id', $mediaIds)->get();
        $thumbSizes = @DataSet::find($datasetId)->api->thumb_sizes ?? [];
        $rallydatasCurrent = $this->rallydata_repository->mappingMedia($rallydatasCurrent, $media, $thumbSizes);
        return $rallydatasCurrent;
    }

    public function _getSystem()
    {
        $r = request()->input('_restful');
        if (request()->has('_system')) {
            $_system = [
                'management_url' => config('app.frontend_url') . '/RallydataPage?dataset_id_RD=' . $r['dataset_id'],
            ];
        }
        if (isset($_system)) {
            return ['_system' => $_system];
        }
        return [];
    }

    public function _getParents($datasetId, $rallyIds, $resources, $rallies)
    {
        $query = "
SELECT rallydatas.*
FROM rallydatas
WHERE rallydatas.dataset_id=$datasetId
AND rallydatas.data_children REGEXP 'rallydata_ids.+?(" . implode('|', $rallyIds) . ")'
AND rallydatas.deleted_at IS NULL";
        $results = DB::select(DB::raw($query));
        $parents = json_decode(json_encode($results), true);
        $parentData = [];
        foreach ($parents as $parent) {
            $children = json_decode($parent['data_children'], true);
            $data = json_decode($parent['data'], true);
            foreach ($rallyIds as $rallyId) {
                foreach ($children as $child) {
                    if (in_array($rallyId, $child['rallydata_ids'])) {
                        $parentData[$rallyId] = $parentData[$rallyId] ?? [];
                        $r = $resources[$parent['resource_id']];
                        $parentData[$rallyId][$r['name']] = $data;
                    }
                }
            }
        }
        foreach ($rallies as &$rally) {
            $rally['data']['_parent'] = @$parentData[$rally['id']];
        }
        return $rallies;
    }

    public function findRallyById($r, $dataId, $isParent = false, $fieldStr)
    {
        try {
            $resource = $r['resource'];
            $rally = $this->rallydata_repository->findByDataId($r['dataset_id'], $resource['id'], $dataId);
            $resources = $this->resource_repository
                ->getByDatasetId($r['dataset_id'])
                ->keyBy('id')
                ->toArray();
            if ($isParent) {
                $rally = @$this->_getParents($r['dataset_id'], [$rally['id']], $resources, [$rally])[0];
            }
            $rallydata = @$this->_handleParentMedia([$rally], $r['dataset_id'], $fieldStr, $resources);
            $rallydata = @$rallydata[0];
            $rallydata = array_diff_key($rallydata, array_flip(['_password']));
            return $rallydata;
        } catch (\ErrorException $e) {
            return null;
        }
    }

    public function findRallyByFields($r, $fields, $isParent = false)
    {
        try {
            $resource = $r['resource'];
            $rally = $this->rallydata_repository->findByDataFields($r['dataset_id'], $resource['id'], $fields);
            $resources = $this->resource_repository
                ->getByDatasetId($r['dataset_id'])
                ->keyBy('id')
                ->toArray();
            if ($isParent) {
                $rally = @$this->_getParents($r['dataset_id'], [$rally['id']], $resources, [$rally])[0];
            }
            $rallydata = @$this->_handleParentMedia([$rally], $r['dataset_id'], null, $resources);
            $rallydata = @$rallydata[0];
            $rallydata = array_diff_key($rallydata, array_flip(['_password']));
            return $rallydata;
        } catch (\ErrorException $e) {
            return null;
        }
    }
}