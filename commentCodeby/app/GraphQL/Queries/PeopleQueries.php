<?php

namespace App\GraphQL\Queries;

use App\Models\People;

class PeopleQueries
{
    public function listPeople($_, array $args)
    {
        $peoples = People::select('*');
        $perPage = $args['args']['per_page'] && is_numeric($args['args']['per_page'])
            ? abs((int)$args['args']['per_page']) : 20;
        $currentPage = $args['args']['current_page'] && is_numeric($args['args']['current_page']) && $args['args']['current_page'] >= -1
            ? (int)$args['args']['current_page'] : 1;
        $offset = $perPage == -1 ? 0 : $perPage * ($currentPage - 1);
        $perPage += 1;
        if (isset($args['args']['sort'])) {
            $sort = $args['args']['sort'];
            $peoples = $peoples->orderBy($sort[0], $sort[1]);
        }
        $total = People::selectRaw('count(*) as COUNT');
        if (!empty($args['name'])) {
            $peoples = $peoples->where('name', 'like', "%{$args['name']}%");
            $total = $total->where('name', 'like', "%{$args['name']}%");
        }
        $total = $total->first()->COUNT;
        $isPrev = $currentPage == 1 ? false : true;
        $isNext = false;
        if ($currentPage != -1) {
            $peoples = $peoples
                ->limit($perPage)
                ->offset($offset);
        }
        $peoples = $peoples->get();
        if ($peoples->count() == $perPage) {
            $isNext = true;
            $peoples = $peoples->slice(0, -1);
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
            'data'     => $peoples,
            'pageInfo' => $pageInfo
        ];
    }

    public function detailPeople($_, array $args)
    {
        return People::select('*')
            ->find($args['id']);
    }

}
