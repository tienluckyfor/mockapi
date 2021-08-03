<?php


namespace App\GraphQL\Mutations;


use App\Models\DataSet;
use App\Models\RallyData;
use App\Repositories\MediaRepository;
use App\Repositories\RallydataRepository;
use App\Services\StringService;
use Illuminate\Support\Facades\Auth;

class DataSetMutations
{
    private $rallydata_repository;
    private $string_service;
    private $media_repository;

    public function __construct(
        RallydataRepository $rallydataRepository,
        StringService $stringService,
        MediaRepository $mediaRepository
    ) {
        $this->rallydata_repository = $rallydataRepository;
        $this->string_service = $stringService;
        $this->media_repository = $mediaRepository;
    }

    public function createDataSet($_, array $args): DataSet
    {
        $args['user_id'] = Auth::id();
        $dataset = DataSet::create($args);
        if (isset($args['amounts'])) {
            $this->rallydata_repository->fillDataByAmounts($dataset, $args['amounts']);
        }
        return $dataset;
    }

    public function editDataSet($_, array $args): DataSet
    {
        $args = array_diff_key($args, array_flip(['directive']));
        $dataset = tap(DataSet::findOrFail($args['id']))
            ->update($args);
        if (isset($args['amounts']) && $args['count_change_rally']>0) {
            $this->rallydata_repository->removeDataByAmounts($dataset, $args['amounts']);
            $this->rallydata_repository->fillDataByAmounts($dataset, $args['amounts']);
        }
        return $dataset;
    }

    public function deleteDataSet($_, array $args): bool
    {
        $ids = isset($args['ids']) ? $args['ids'] : [$args['id']];
        return DataSet::whereIn('id', $ids)->delete();
    }

    public function forceDeleteDataSet($_, array $args): bool
    {
        $ids = isset($args['ids']) ? $args['ids'] : [$args['id']];
        RallyData::whereIn('dataset_id', $ids)->delete();
        return DataSet::whereIn('id', $ids)->delete();
    }

    public function duplicateDataSet($_, array $args): bool
    {
        $dataset = Dataset::where('id', $args['id'])->first();
        $datasetNew = $dataset;
        $datasetNew->name = $this->string_service->duplicate($datasetNew->name);
        if ($datasetNew = Dataset::create($datasetNew->toArray())) {
            $nRallyIds = $this->rallydata_repository->duplicate($dataset, $datasetNew);
            $rallydata = $this->rallydata_repository->getByDatasetId($datasetNew->id);
            $rallies = $rallydata->map(function ($item) {
                return $item->data;
            });
            // duplicate data_children
            $rallydata->map(function ($item) use ($nRallyIds) {
                $item = $item->toArray();
                $isUpdate = 0;
                foreach ($item['data_children'] as &$datum) {
                    if (!isset($datum['rallydata_ids'])) {
                        continue;
                    }
                    $isUpdate++;
                    $rallydata_ids = [];
                    foreach ($datum['rallydata_ids'] as $rally_id) {
                        $rallydata_ids[] = $nRallyIds[$rally_id];
                    }
                    $datum['rallydata_ids'] = $rallydata_ids;
                }
                if ($isUpdate) {
                    RallyData::where('id', $item['id'])
                        ->update(['data_children' => $item['data_children']]);
                }
            });
//            dd($rallydata->toArray());
            // duplicate media
            $mediaIds = $this->rallydata_repository->getMediaIds($rallies);
            $media = $this->media_repository->getByIds($mediaIds)->toArray();
            $nMediaIds = $this->media_repository->duplicate($datasetNew->id, $media);
            $rallydata->map(function ($item) use ($nMediaIds) {
                $item = $item->toArray();
                $isUpdate = 0;
                foreach ($item['data'] as &$datum) {
                    if (!isset($datum['media_ids'])) {
                        continue;
                    }
                    $isUpdate++;
                    $media_ids = [];
                    foreach ($datum['media_ids'] as $media_id) {
                        $media_ids[] = $nMediaIds[$media_id];
                    }
                    $datum['media_ids'] = $media_ids;
                }
                if ($isUpdate) {
                    RallyData::where('id', $item['id'])
                        ->update(['data' => $item['data']]);
                }
            });
            return true;
        }
        return false;
    }
}
