<?php

namespace App\GraphQL\Queries;

use App\Models\SubComment;

class SubCommentQueries
{
    public function listSubComment($_, array $args)
    {
        $subComments = SubComment::select('*');
        $perPage = isset($args['args']['per_page']) && is_numeric($args['args']['per_page'])
            ? abs((int)$args['args']['per_page']) : 20;
        $currentPage = isset($args['args']['current_page']) && is_numeric($args['args']['current_page']) && $args['args']['current_page'] >= -1
            ? (int)$args['args']['current_page'] : 1;
        $offset = $perPage == -1 ? 0 : $perPage * ($currentPage - 1);
        $perPage += 1;
        if (isset($args['args']['sort'])) {
            $sort = $args['args']['sort'];
            $subComments = $subComments->orderBy($sort[0], $sort[1]);
        }else {
            $subComments = $subComments->orderBy('id', 'desc');
        }
        $total = SubComment::selectRaw('count(*) as COUNT')
            ->where('comment_id', $args['comment_id']);
        if (!empty($args['name'])) {
            $subComments = $subComments->where('name', 'like', "%{$args['name']}%");
            $total = $total->where('name', 'like', "%{$args['name']}%");
        }
        $subComments = $subComments->where('comment_id', $args['comment_id']);

        $total = $total->first()->COUNT;
        $isPrev = $currentPage == 1 ? false : true;
        $isNext = false;
        if ($currentPage != -1) {
            $subComments = $subComments
                ->limit($perPage)
                ->offset($offset);
        }
        $subComments = $subComments->get();
        if ($subComments->count() == $perPage) {
            $isNext = true;
            $subComments = $subComments->slice(0, -1);
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
            'data'     => $subComments,
            'pageInfo' => $pageInfo
        ];
    }

    public function detailSubComment($_, array $args)
    {
        return SubComment::select('*')
            ->find($args['id']);
    }

}
