<?php

namespace App\GraphQL\Queries;

use App\Models\Like;

class LikeQueries
{
    public function listLike($_, array $args)
    {
        $likes = Like::select('*');
        $perPage = isset($args['args']['per_page']) && is_numeric($args['args']['per_page'])
            ? abs((int)$args['args']['per_page']) : 20;
        $currentPage = isset($args['args']['current_page']) && is_numeric($args['args']['current_page']) && $args['args']['current_page'] >= -1
            ? (int)$args['args']['current_page'] : 1;
        $offset = $perPage == -1 ? 0 : $perPage * ($currentPage - 1);
        $perPage += 1;
        if (isset($args['args']['sort'])) {
            $sort = $args['args']['sort'];
            $likes = $likes->orderBy($sort[0], $sort[1]);
        } else {
            $likes = $likes->orderBy('id', 'desc');
        }
        $total = Like::selectRaw('count(*) as COUNT')
            ->where('likeable_type', $args['likeable_type'])
            ->where('likeable_id', $args['likeable_id']);
//        if (!empty($args['name'])) {
//            $likes = $likes->where('name', 'like', "%{$args['name']}%");
//            $total = $total->where('name', 'like', "%{$args['name']}%");
//        }
        $likes = $likes
            ->where('likeable_type', $args['likeable_type'])
            ->where('likeable_id', $args['likeable_id']);

        $total = $total->first()->COUNT;
        $isPrev = $currentPage == 1 ? false : true;
        $isNext = false;
        if ($currentPage != -1) {
            $likes = $likes
                ->limit($perPage)
                ->offset($offset);
        }
        $likes = $likes->get();
        if ($likes->count() == $perPage) {
            $isNext = true;
            $likes = $likes->slice(0, -1);
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
            'data'     => $likes,
            'pageInfo' => $pageInfo
        ];
    }

    public function detailLike($_, array $args)
    {
        return Like::select('*')
            ->find($args['id']);
    }

}
