<?php

namespace App\GraphQL\Queries;

use App\Models\Unique;

class UniqueQueries
{
    public function listUnique($_, array $args)
    {
        $uniques = Unique::select('*');
        $perPage = isset($args['args']['per_page']) && is_numeric($args['args']['per_page'])
            ? abs((int)$args['args']['per_page']) : 20;
        $currentPage = isset($args['args']['current_page']) && is_numeric($args['args']['current_page']) && $args['args']['current_page'] >= -1
            ? (int)$args['args']['current_page'] : 1;
        $offset = $perPage == -1 ? 0 : $perPage * ($currentPage - 1);
        $perPage += 1;
        if (isset($args['args']['sort'])) {
            $sort = $args['args']['sort'];
            $uniques = $uniques->orderBy($sort[0], $sort[1]);
        } else {
            $uniques = $uniques->orderBy('id', 'desc');
        }
        $total = Unique::selectRaw('count(*) as COUNT')
            ->where('app_id', $args['app_id']);
//            ->where('special_id', $args['special_id']);
        if (!empty($args['special_id'])) {
            $uniques = $uniques->where('special_id', 'like', "%{$args['special_id']}%");
            $total = $total->where('special_id', 'like', "%{$args['special_id']}%");
        }
        $uniques = $uniques->where('app_id', $args['app_id']);

        $total = $total->first()->COUNT;
        $isPrev = $currentPage == 1 ? false : true;
        $isNext = false;
        if ($currentPage != -1) {
            $uniques = $uniques
                ->limit($perPage)
                ->offset($offset);
        }
        $uniques = $uniques->get();
        if ($uniques->count() == $perPage) {
            $isNext = true;
            $uniques = $uniques->slice(0, -1);
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
            'data'     => $uniques,
            'pageInfo' => $pageInfo
        ];
    }

    public function detailUnique($_, array $args)
    {
        return Unique::select('*')
            ->find($args['id']);
    }

    public function detailUniqueSpecialId($_, array $args)
    {
        return Unique::select('*')
            ->where('app_id', $args['app_id'])
            ->where('special_id', $args['special_id'])
            ->first();
    }

}
