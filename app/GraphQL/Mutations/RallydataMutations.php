<?php


namespace App\GraphQL\Mutations;


use App\Models\Rallydata;
use App\Repositories\RallydataRepository;
use App\Repositories\MediaRepository;
use Illuminate\Support\Facades\Auth;

class RallydataMutations
{
    private $rallydata_repository;
    private $media_repository;

    public function __construct(
        RallydataRepository $RallydataRepository,
        MediaRepository $MediaRepository
    )
    {
        $this->media_repository = $MediaRepository;
        $this->rallydata_repository = $RallydataRepository;
    }

    public function createRallydata($_, array $args): Rallydata
    {
        $args['user_id'] = Auth::id();
//        $args = $this->media_repository->handle_media($args);
        return $this->rallydata_repository->createManual($args);
    }

    public function editRallydata($_, array $args): Rallydata
    {
        $args = array_diff_key($args, array_flip(['directive']));
        return tap(Rallydata::findOrFail($args['id']))
            ->update($args);
    }

    public function editParentRallydata($_, array $args): Rallydata
    {
        $args = array_diff_key($args, array_flip(['directive']));
        return tap(Rallydata::findOrFail($args['id']))
            ->update($args);
    }

    public function deleteRallydata($_, array $args): bool
    {
        $ids = isset($args['ids']) ? $args['ids'] : [$args['id']];
        return Rallydata::whereIn('id', $ids)->delete();
    }

    public function duplicateRallydata($_, array $args): bool
    {
        $rallydata = Rallydata::where('id', $args['id'])->first()->toArray();
        if ($this->rallydata_repository->createManual($rallydata)) {
            return true;
        }
        return false;
    }
}
