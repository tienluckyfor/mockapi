<?php

namespace App\Repositories;

use App\Models\DataSet;
use App\Models\Media;
use App\Models\RallyData;
use App\Services\MediaService;
use Carbon\Carbon;
use Faker;
use Illuminate\Database\QueryException;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class RallydataRepository
{
    private $resource_repository;
    private $media_service;

    public function __construct(
        ResourceRepository $ResourceRepository,
        MediaService $MediaService
    ) {
        $this->resource_repository = $ResourceRepository;
        $this->media_service = $MediaService;
    }

    public function findMaxByDatasetResource($datasetId, $resourceId)
    {
        $rally = RallyData::where('dataset_id', $datasetId)
            ->where('resource_id', $resourceId)
            ->orderBy('id', 'desc')
            ->limit(1)
            ->first();
        if ($rally) {
            return $rally->toArray();
        }
        return [];
    }

    public function findByDataId($datasetId, $resourceId, $dataId)
    {
        $query = "
SELECT rallydatas.*
FROM rallydatas 
WHERE rallydatas.dataset_id={$datasetId} 
AND rallydatas.resource_id={$resourceId}
AND rallydatas.data REGEXP '(\"id\"[^,]+{$dataId})' AND rallydatas.deleted_at IS NULL";
        $results = DB::select(DB::raw($query));
        $rallydata = json_decode(json_encode($results), true);
        $rallydata = array_map(function ($item) {
            $item['data'] = json_decode($item['data'], true);
            $item['data_children'] = json_decode($item['data_children'], true);
            return $item;
        }, $rallydata ?? []);
        $rallydata = Arr::where($rallydata, function ($item, $key) use ($dataId) {
            return @$item['data']['id'] == $dataId;
        });
        return Arr::first($rallydata);
    }

    public function fillData($resource, $amounts, $locale)
    {
        $faker = Faker\Factory::create($locale);
        $fields = $resource['fields'];

        $rallyDatas = [];
        for ($i = 1; $i <= $amounts[$resource['id']]; $i++) {
            $obj = [];
            try {
                foreach ($fields as $field) {
                    $name = $field['name'];
                    $type = $field['type'];
                    $fakerjs = $field['fakerjs'] ?? null;
                    if ($name == 'id') {
                        $obj[$name] = $i;
                    }
                    if ($type == 'Faker.js' && $fakerjs == 'image.imageUrl(avatar)') {
//                        $image = asset('storage/filldata-media/' . rand(1, 10) . '.jpg');
//                        $obj[$name] = [
//                            'image'       => $image,
//                            'thumb_image' => $this->media_service->get_thumb($image),
//                            'id'          => null,
//                        ];
                        $obj[$name] = [
                            "type"      => "media",
                            "media_ids" => [rand(-10, -1)]
                        ];
                        continue;
                    }
                    if ($type == 'Faker.js' && $fakerjs && $fakerjs !== 'datetime.dateTime') {
                        $fakerjsArr = explode('.', $fakerjs);
                        $obj[$name] = $faker->{$fakerjsArr[1]};
                    }
                    if ($type == 'Text') {
                        $obj[$name] = $faker->text;
                    }
                    if ($type == 'LongText') {
                        $obj[$name] = $faker->text(1000);
                    }
                    if ($type == 'Number') {
                        $obj[$name] = $faker->randomNumber();
                    }
                    if ($type == 'Boolean') {
                        $obj[$name] = $faker->randomElement([true, false]);
                    }
                    if ($type == 'Object') {
                        $obj[$name] = [];
                    }
                    if ($type == 'Array') {
                        $obj[$name] = [];
                    }
                    if ($type == 'Date' || $fakerjs == 'datetime.dateTime') {
                        $obj[$name] = now();
                    }
                }
            } catch (Exception $e) {
            }
            $rallyDatas[] = $obj;
        }
        return $rallyDatas;
    }

    public function removeDataByAmounts($dataset, $amounts = [])
    {
        $resourceIds = array_keys($amounts);
        return RallyData::whereIn('resource_id', $resourceIds)
            ->where('dataset_id', $dataset->id)
            ->delete();
    }

    public function fillDataByAmounts($dataset, $amounts = [])
    {
        $resourceIds = array_keys($amounts);
        $resources = $this->resource_repository->getByIds($resourceIds)->toArray();

        foreach ($resources as $resource) {
            $rallyDatas = self::fillData($resource, $amounts, $dataset->locale);

            $payloads = array_map(function ($data) use ($resource, $dataset) {
                $payload = [
                    'user_id'     => $dataset->user_id,
                    'dataset_id'  => $dataset->id,
                    'resource_id' => $resource['id'],
                    'data'        => json_encode($data),
                    'created_at'  => Carbon::now()->toDateTimeString(),
                    'updated_at'  => Carbon::now()->toDateTimeString(),
                ];
                return $payload;
            }, $rallyDatas);
            RallyData::insert($payloads);
        }
    }


    public function duplicate($dataset, $datasetNew)
    {
        $rallyData = RallyData::selectRaw('id, user_id, resource_id, data, data_children')
            ->where('dataset_id', $dataset->id)
            ->get()
            ->toArray();
        $rallyIds = [];
        foreach ($rallyData as $item) {
            $nItem = array_merge($item, ['dataset_id' => $datasetNew->id]);
            $nItem = array_diff_key($nItem, array_flip(['id']));
            $nRally = RallyData::create($nItem);
            $rallyIds[$item['id']] = $nRally['id'];
        }
        return $rallyIds;
    }

    public function getByDatasetIdResourceIdParentSearch($datasetId, $resourceId, $config = [])
    {
        [$perPage, $currentPage, $sorts, $searchs, $parent] = $config;
        $pResource = $this->resource_repository->findByNameDatasetId($parent[0], $datasetId);
        if (!$pResource) {
            throw new \ErrorException('Parent resource not found!');
        }
        $pRally = $this->findByDataId($datasetId, $pResource->id, $parent[1]);
        $rallyIds = collect(@$pRally['data_children'])
            ->where('resource_id', $resourceId)
            ->first();
        $rallyIds = @$rallyIds['rallydata_ids'] ?? null;
        $sqlChild = $rallyIds ? "and `rallydatas`.`id` in (" . implode(', ', $rallyIds) . ")"
            : "and `rallydatas`.`id`=0";

        $offset = $perPage == -1 ? 0 : $perPage * ($currentPage - 1);
        $sql = "select * from (select rallydatas.id, rallydatas.data, rallydatas.data_children";
        $sql .= isset($sorts[0]) ? ", JSON_EXTRACT(data, '$.{$sorts[0]}') AS sortKey" : "";
        $sql .= isset($searchs[0]) ? ", LOWER(CONCAT(JSON_EXTRACT(data, '$.{$searchs[0]}'))) AS searchKey" : "";
        $sql .= " from `rallydatas`
      where `dataset_id` = {$datasetId}
        and `rallydatas`.`resource_id` = '{$resourceId}'
        and `rallydatas`.`deleted_at` is null
        {$sqlChild}
     ) t";

        $searchKey = isset($searchs[1]) ? strtolower($searchs[1]) : "";
        $sql .= isset($searchs[1]) ? " where `searchKey` like '%{$searchKey}%'" : "";
        $total = 0;
        try {
            $countSql = preg_replace('#^select \*#mis', 'select count(*) as count', $sql);
            $total = DB::selectOne($countSql);
            $total = isset($total->count) ? $total->count : 0;
        } catch (\QueryException $e) {
            throw new QueryException($e->getMessage());
        }

        if (isset($sorts[0])) {
            $sorts[1] = isset($sorts[1]) ? $sorts[1] : 'desc';
            if ($sorts[0] == 'id') {
                $sql .= " order by `id` {$sorts[1]}";
            } else {
                $sql .= " order by `sortKey` {$sorts[1]}";
            }
        }
        $perPage += 1;
        if ($currentPage != -1) {
            $sql .= " limit {$perPage} offset {$offset}";
        }
        return $this->_handleData($currentPage, $sql, $perPage, $total);

    }

    public function getByDatasetIdResourceId($datasetId, $resourceId, $config = [])
    {
        [$perPage, $currentPage, $sorts, $searchs] = $config;
        $offset = $perPage == -1 ? 0 : $perPage * ($currentPage - 1);
        $sql = "select * from (select rallydatas.id, rallydatas.data, rallydatas.data_children";
        $sql .= isset($sorts[0]) ? ", JSON_EXTRACT(data, '$.{$sorts[0]}') AS sortKey" : "";
        $sql .= isset($searchs[0]) ? ", LOWER(CONCAT(JSON_EXTRACT(data, '$.{$searchs[0]}'))) AS searchKey" : "";
        $sql .= " from `rallydatas`
      where `dataset_id` = {$datasetId}
        and `rallydatas`.`resource_id` = '{$resourceId}'
        and `rallydatas`.`deleted_at` is null
     ) t";

        $searchKey = isset($searchs[1]) ? strtolower($searchs[1]) : "";
        $sql .= isset($searchs[1]) ? " where `searchKey` like '%{$searchKey}%'" : "";
        $total = 0;
        try {
            $countSql = preg_replace('#^select \*#mis', 'select count(*) as count', $sql);
            $total = DB::selectOne($countSql);
            $total = isset($total->count) ? $total->count : 0;
        } catch (\QueryException $e) {
            throw new QueryException($e->getMessage());
        }

        if (isset($sorts[0])) {
            $sorts[1] = isset($sorts[1]) ? $sorts[1] : 'desc';
            if ($sorts[0] == 'id') {
                $sql .= " order by `id` {$sorts[1]}";
            } else {
                $sql .= " order by `sortKey` {$sorts[1]}";
            }
        }
        $perPage += 1;
        if ($currentPage != -1) {
            $sql .= " limit {$perPage} offset {$offset}";
        }
        return $this->_handleData($currentPage, $sql, $perPage, $total);
//        $rallyDatas = [];
//        $isPrev = $currentPage == 1 ? false : true;
//        $isNext = false;
//        try {
//            $rallyDatas = DB::select($sql);
//            $rallyDatas = json_decode(json_encode($rallyDatas), true);
//            if (count($rallyDatas) == $perPage) {
//                $isNext = true;
//                array_pop($rallyDatas);
//            }
//        } catch (\QueryException $e) {
//            throw new QueryException($e->getMessage());
//        }
//        $rallyDatas = array_map(function ($rally) {
//            $rally['data'] = json_decode($rally['data'], true);
//            $rally['data_children'] = json_decode($rally['data_children'], true);
//            return $rally;
//        }, $rallyDatas);
//        return [$rallyDatas, $total, $isPrev, $isNext];
    }

    protected function _handleData($currentPage, $sql, $perPage, $total)
    {
        $rallyDatas = [];
        $isPrev = $currentPage == 1 ? false : true;
        $isNext = false;
        try {
            $rallyDatas = DB::select($sql);
            $rallyDatas = json_decode(json_encode($rallyDatas), true);
            if (count($rallyDatas) == $perPage) {
                $isNext = true;
                array_pop($rallyDatas);
            }
        } catch (\QueryException $e) {
            throw new QueryException($e->getMessage());
        }
        $rallyDatas = array_map(function ($rally) {
            $rally['data'] = json_decode($rally['data'], true);
            $rally['data_children'] = json_decode($rally['data_children'], true);
            return $rally;
        }, $rallyDatas);
        return [$rallyDatas, $total, $isPrev, $isNext];
    }

    public function getByDatasetId($datasetId, $rallyIds = [], $select = '*')
    {
        $rallyDatas = RallyData::selectRaw($select)
            ->where('dataset_id', $datasetId);
        if (!empty($rallyIds)) {
            $rallyDatas = $rallyDatas->whereIn('id', $rallyIds);
        }
        $rallyDatas = $rallyDatas
            ->orderBy('id', 'desc')
            ->get();
        return $rallyDatas;
    }

    public function getMyDatasetIdResourceId($userId, $datasetId, $resourceId, $select = '*')
    {
        $rallyDatas = RallyData::selectRaw($select)
            ->where('user_id', $userId)
            ->where('dataset_id', $datasetId)
            ->where('resource_id', $resourceId)
            ->orderBy('id', 'desc')
            ->get();
        return $rallyDatas;
    }

    public function createManual($rally)
    {
        $maxRally = self::findMaxByDatasetResource($rally['dataset_id'], $rally['resource_id']);
        $id = isset($maxRally['data']['id']) ? $maxRally['data']['id'] : 0;
        $rally['data']['id'] = $id + 1;
        return RallyData::create($rally);
    }

    public function getMediaIds($rallydatas)
    {
        $mediaIds = [];
        foreach ($rallydatas as $rallydata) {
//            dd($rallydata);
//            if (isset($rallydata['data'])) {
//                foreach ($rallydata['data'] as $datum) {
//                    if (isset($datum['media_ids'])) {
//                        $mediaIds = array_merge($mediaIds, $datum['media_ids']);
//                    }
//                }
//            }
            foreach ($rallydata as $rallydatum) {
                if (!is_array($rallydatum)) {
                    continue;
                }
                // restful
                if (isset($rallydatum['media_ids'])) {
                    $mediaIds = array_merge($mediaIds, $rallydatum['media_ids']);
                    continue;
                }
                // graphql
                foreach ($rallydatum as $item0) {
                    if (!is_array($item0)) {
                        continue;
                    }
                    foreach ($item0 as $item) {
                        if (isset($item['media_ids'])) {
                            $mediaIds = array_merge($mediaIds, $item['media_ids']);
                            continue;
                        }
                    }
                }
            }
        }

        return $mediaIds;
    }

    /**
     * @param $rallydatas
     * @param Media $media
     * @return mixed
     */
    protected function _handleMediumItem($mediaId, $media, $thumbSizes)
    {
        $file = asset("storage/filldata-media/{$mediaId}.jpg");
        $fileType = 'image';
        $thumbs = [];
        foreach ($thumbSizes as $size) {
            $thumbs[$size['width']] = $this->media_service->get_thumb($file, $size);
        }
        $medium = $media->where('id', $mediaId)->first();
        if ($mediaId > 0 && $medium) {
            $file = $medium->file;
            $fileType = $medium->file_type;
            $thumbs = $medium->thumb_files;
        }
        /*
        $file = asset("storage/filldata-media/{$mediaId}.jpg");
        $thumbImage = $this->media_service->get_thumb($file);
        $fileType = 'image';
        $medium = $media->where('id', $mediaId)->first();
        if ($mediaId > 0 && $medium) {
            $file = $medium->file;
            $thumbImage = $medium->thumb_image;
            $fileType = $medium->file_type;
        }*/

        $item = [
            'id'          => $mediaId,
//            'thumb_image' => $thumbImage,
            'file_type'   => $fileType,
            'file'        => $file,
            'thumb_files' => $thumbs,
        ];
        return $item;
    }

    public function mappingMedia($rallydatas, $media)
    {
//        dd($rallydatas, $media);
        $thumbSizes = null;
        $datasetId = null;

        foreach ($rallydatas as &$rallydata) {
            foreach ($rallydata as &$rallydatum) {
                if (!is_array($rallydatum)) {
                    continue;
                }
                // thumbSizes
                if (!($thumbSizes && $datasetId)) {
                    if (isset($rallydatum['media_ids'])) {
                        $datasetId = $rallydata['dataset_id'];
                    }
                    foreach ($rallydatum as &$item0) {
                        if (!is_array($item0)) {
                            continue;
                        }
                        foreach ($item0 as &$item) {
                            if (isset($item['media_ids'])) {
                                $datasetId = $rallydatum['dataset_id'];
                            }
                        }
                    }
                    $thumbSizes = DataSet::find($datasetId)->api->thumb_sizes;
                }

                // restful
                if (isset($rallydatum['media_ids'])) {
                    $rallydatum = array_merge($rallydatum, ['media' => []]);
                    foreach ($rallydatum['media_ids'] as $mediaId) {
                        $rallydatum['media'][] = $this->_handleMediumItem($mediaId, $media, $thumbSizes);
                    }
                    continue;
                }

                // graphql
                foreach ($rallydatum as &$item0) {
                    if (!is_array($item0)) {
                        continue;
                    }
                    foreach ($item0 as &$item) {
                        if (isset($item['media_ids'])) {
                            $item = array_merge($item, ['media' => []]);
                            foreach ($item['media_ids'] as $mediaId) {
                                $item['media'][] = $this->_handleMediumItem($mediaId, $media, $thumbSizes);
                            }
                        }
                    }
                }
            }
        }
        return $rallydatas;
    }

    public function getByMediaIds($mediaIds)
    {
        $wRaw = "data REGEXP 'media_ids.+?(\"" . implode('"|"', $mediaIds) . "\")'";
        return RallyData::select("*")
            ->where('user_id', Auth::id())
            ->whereRaw($wRaw)
            ->get();
    }

    public function getByMediaFiles($mediaFiles)
    {
        $wRaw = "data REGEXP '" . implode('|', $mediaFiles) . "'";
        return RallyData::select("*")
            ->where('user_id', Auth::id())
            ->whereRaw($wRaw)
            ->get();
    }

    public function updateDataByList($rallies)
    {
        $updateCount = 0;
        foreach ($rallies as $rally) {
            $updateCount += RallyData::where('id', $rally['id'])
                ->update(['data' => json_encode($rally['data'])]);
        }
        return $updateCount;
    }

}
