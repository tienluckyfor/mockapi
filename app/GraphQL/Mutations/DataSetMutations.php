<?php


namespace App\GraphQL\Mutations;


use App\Models\DataSet;
use App\Models\RallyData;
use App\Models\Resource;
use Carbon\Carbon;
use Faker;
use Illuminate\Support\Facades\Auth;
use App\Repositories\RallydataRepository;

class DataSetMutations
{
    private $rallydata_repository;
    public function __construct(RallydataRepository $RallydataRepository)
    {
        $this->rallydata_repository = $RallydataRepository;
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
        if (isset($args['amounts'])) {
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

    public function duplicateDataSet($_, array $args): bool
    {
        $dataset = Dataset::where('id', $args['id'])->first();
        $datasetNew = $dataset;
        $datasetNew->name = "Copy of {$datasetNew->name}";
        if ($datasetNew = Dataset::create($datasetNew->toArray())) {
            $this->rallydata_repository->duplicate($dataset, $datasetNew);
            return true;
        }
        return false;
    }
}
