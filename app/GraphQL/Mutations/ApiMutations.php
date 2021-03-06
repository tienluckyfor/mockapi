<?php


namespace App\GraphQL\Mutations;


use App\Models\Api;
use App\Services\StringService;
use Illuminate\Support\Facades\Auth;

class ApiMutations
{
    private $stringService;
    public function __construct(StringService $stringService)
    {
        $this->stringService = $stringService;
    }

    public function createApi($_, array $args): Api
    {
        $args['user_id'] = Auth::id();
        return Api::create($args);
    }

    public function editApi($_, array $args): Api
    {
        $args = array_diff_key($args, array_flip(['directive']));
        return tap(Api::findOrFail($args['id']))
            ->update($args);
    }

    public function deleteApi($_, array $args): bool
    {
        $ids = isset($args['ids']) ? $args['ids'] : [$args['id']];
        return Api::whereIn('id', $ids)->delete();
    }

    public function duplicateApi($_, array $args): bool
    {
        $api = Api::where('id', $args['id'])->first()->toArray();
        $api['name'] = $this->stringService->duplicate($api['name']);
        if (Api::create($api)) {
            return true;
        }
        return false;
    }
}
