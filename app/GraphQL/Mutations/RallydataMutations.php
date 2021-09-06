<?php


namespace App\GraphQL\Mutations;


use App\Models\RallyData;
use App\Repositories\MediaRepository;
use App\Repositories\RallydataRepository;
use App\Repositories\ResourceRepository;
use App\Services\AuthService;
use GraphQL\Error\Error;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class RallydataMutations
{
    private $resource_repository;
    private $rallydata_repository;
    private $media_repository;
    private $auth_service;

    public function __construct(
        AuthService $authService,
        ResourceRepository $resourceRepository,
        RallydataRepository $rallydataRepository,
        MediaRepository $mediaRepository
    ) {
        $this->auth_service = $authService;
        $this->resource_repository = $resourceRepository;
        $this->media_repository = $mediaRepository;
        $this->rallydata_repository = $rallydataRepository;
    }

    public function createRallydata($_, array $args): RallyData
    {
        if($error = $this->auth_service->validation($args)){
            throw new Error($error);
        }
        $args['user_id'] = Auth::id();
        return $this->rallydata_repository->createManual($args);
    }

    public function editRallydata($_, array $args): RallyData
    {
        if($error = $this->auth_service->validation($args, true)){
            throw new Error($error);
        }
        $args = array_diff_key($args, array_flip(['directive']));
        return tap(RallyData::findOrFail($args['id']))
            ->update($args);
    }

    public function editParentRallydata($_, array $args): RallyData
    {
        $args = array_diff_key($args, array_flip(['directive']));
        return tap(RallyData::findOrFail($args['id']))
            ->update($args);
    }

    public function deleteRallydata($_, array $args): bool
    {
        $ids = isset($args['ids']) ? $args['ids'] : [$args['id']];
        return RallyData::whereIn('id', $ids)->delete();
    }

    public function duplicateRallydata($_, array $args): bool
    {
        $rallydata = RallyData::where('id', $args['id'])->first()->toArray();
        if (isset($rallydata['data']['_username'])) {
            throw new Error('Can\'t duplicate resource has Authentication type');
        }
        if ($this->rallydata_repository->createManual($rallydata)) {
            return true;
        }
        return false;
    }

    public function replaceRallydata($_, array $args): bool
    {
        RallyData::whereIn('id', $args['ids'])
            ->where('data', 'like', "%{$args['find']}%")
            ->get()
            ->map(function ($rally) use ($args) {
                $data = json_encode($rally->data);
                $data = preg_replace("#{$args['find']}#mis", $args['replace'], $data);
                $data = json_decode($data, true);
                RallyData::where('id', $rally->id)
                    ->update(['data' => $data]);
            });
        return true;
    }

    public function sortRallydata($_, array $args): bool
    {
        $instance = new RallyData;
        $value = [];
        foreach ($args['ids'] as $key => $id) {
            $value[] = ['id' => $id, 'pin_index' => $key];
        }
        $index = 'id';
        $result = batch()->update($instance, $value, $index);
        return (bool)$result;
//        dd($result);
//        $result = Batch::update($instance, $values, $batchSize);
//        RallyData::whereIn('id', $args['ids'])
//            ->where('data', 'like', "%{$args['find']}%")
//            ->get()
//            ->map(function ($rally) use ($args) {
//                $data = json_encode($rally->data);
//                $data = preg_replace("#{$args['find']}#mis", $args['replace'], $data);
//                $data = json_decode($data, true);
//                RallyData::where('id', $rally->id)
//                    ->update(['data' => $data]);
//            });
//        return true;

    }
}
