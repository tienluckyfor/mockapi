<?php

namespace App\GraphQL\Queries;

use App\Models\App;

class AppQueries
{
    public function listApp($_, array $args)
    {
        $apps = App::select('*');
        $perPage = $args['args']['per_page'] && is_numeric($args['args']['per_page'])
            ? abs((int)$args['args']['per_page']) : 20;
        $currentPage = $args['args']['current_page'] && is_numeric($args['args']['current_page']) && $args['args']['current_page'] >= -1
            ? (int)$args['args']['current_page'] : 1;
        $offset = $perPage == -1 ? 0 : $perPage * ($currentPage - 1);
        $perPage += 1;
        if (isset($args['args']['sort'])) {
            $sort = $args['args']['sort'];
            $apps = $apps->orderBy($sort[0], $sort[1]);
        }
        $total = App::selectRaw('count(*) as COUNT');
        if (!empty($args['name'])) {
            $apps = $apps->where('name', 'like', "%{$args['name']}%");
            $total = $total->where('name', 'like', "%{$args['name']}%");
        }
        $total = $total->first()->COUNT;
        $isPrev = $currentPage == 1 ? false : true;
        $isNext = false;
        if ($currentPage != -1) {
            $apps = $apps
                ->limit($perPage)
                ->offset($offset);
        }
        $apps = $apps->get();
        if ($apps->count() == $perPage) {
            $isNext = true;
            $apps = $apps->slice(0, -1);
        }
        $perPage -= 1;
        $pageInfo = [
            "per_page"     => $currentPage == -1 ? $total : $perPage,
            "current_page" => $currentPage,
            "total_item"   => $total,
            "total_page"   => $currentPage == -1 ? 1 : ceil($total / $perPage),
            "is_prev"      => $isPrev,
            "is_next"      => $isNext,
        ];
        return [
            'data'     => $apps,
            'pageInfo' => $pageInfo
        ];
    }

    public function detailApp($_, array $args)
    {
        return App::select('*')
            ->find($args['id']);
    }

}
