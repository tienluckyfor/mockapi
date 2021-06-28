<?php


namespace App\GraphQL\Queries;

use App\Models\Api;
use App\Models\Resource;
use Illuminate\Support\Facades\Auth;

class ResourceQueries
{
    public function my_resource_list($_, array $args)
    {
        // resource
        $resources = Resource::where('user_id', Auth::id())
            ->orderBy('id', 'desc');
        if (!empty($args['name'])) {
            $resources = $resources
                ->where('name', 'like', "%{$args['name']}%");
        }
        if (!empty($args['api_id'])) {
            $resources = $resources
                ->where('api_id', $args['api_id']);
        }
        $resources = $resources->get();

        // api
        $apiIds = $resources->pluck('api_id')->toArray();
        $apis = Api::whereIn('id', $apiIds)
            ->get()
            ->map(function ($api) use ($resources) {
                $api->count = $resources
                    ->where('api_id', $api['id'])
                    ->count();
                return $api;
            })
            ->keyBy('id');

        // sort
        $resourcesSort = [];
        $checks = [];
        foreach ($resources->toArray() as $resource) {
            if (in_array($resource['api_id'], $checks)) {
                continue;
            }
            $checks[] = $resource['api_id'];
            $resourcesSort = array_merge($resourcesSort, collect($resources)
                ->where('api_id', $resource['api_id'])
                ->sort(function ($a, $b) {
                    return strtotime($a->updated_at) < strtotime($b->updated_at);
                })
                ->values()
                ->toArray()
            );
        }
        $data = ['resources' => $resourcesSort, 'apis' => $apis];
        return $data;
    }
}
