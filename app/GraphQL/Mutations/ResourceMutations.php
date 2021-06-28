<?php


namespace App\GraphQL\Mutations;


use App\Models\Resource;
use App\Services\StringService;
use Illuminate\Support\Facades\Auth;

class ResourceMutations
{
    private $stringService;
    public function __construct(StringService $stringService)
    {
        $this->stringService = $stringService;
    }

    public function createResource($_, array $args): Resource
    {
        $args['user_id'] = Auth::id();
        return Resource::create($args);
    }

    public function editResource($_, array $args): Resource
    {
        $args = array_diff_key($args, array_flip(['directive']));
//        if (!is_numeric($args['api_id'])) {
//            unset($args['api_id']);
//        }
        return tap(Resource::findOrFail($args['id']))
            ->update($args);
    }

    public function editParentResource($_, array $args): Resource
    {
        $args = array_diff_key($args, array_flip(['directive']));
        return tap(Resource::findOrFail($args['id']))
            ->update($args);
    }

    public function deleteResource($_, array $args): bool
    {
        $ids = isset($args['ids']) ? $args['ids'] : [$args['id']];
        return Resource::whereIn('id', $ids)->delete();
    }

    public function duplicateResource($_, array $args): bool
    {
        $resource = Resource::where('id', $args['id'])->first()->toArray();
        $resource['name'] = $this->stringService->duplicate($resource['name']);
        if (Resource::create($resource)) {
            return true;
        }
        return false;
    }
}
