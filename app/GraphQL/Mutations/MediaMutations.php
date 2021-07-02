<?php


namespace App\GraphQL\Mutations;


use App\Models\Media;
use App\Repositories\RallydataRepository;
use App\Services\StringService;

class MediaMutations
{
    private $stringService;
    private $rallydataRepository;

    public function __construct(
        StringService $stringService,
        RallydataRepository $rallydataRepository
    ) {
        $this->stringService = $stringService;
        $this->rallydataRepository = $rallydataRepository;
    }

    public function askDeleteMedia($_, array $args)
    {
        $rallies = $this->rallydataRepository
            ->getByMediaIds($args['ids'])
            ->map(function ($item) {
                $data = array_filter($item->data, function ($item1, $key1) {
                    return in_array(gettype($item1), ['string', 'integer']);
                }, ARRAY_FILTER_USE_BOTH);
                return $data;
            });
        if ($rallies->isEmpty()) {
            Media::whereIn('id', $args['ids'])
                ->delete();
            return [
                'status'  => true,
                'rallies' => $rallies,
            ];
        }
        return [
            'status'  => false,
            'rallies' => $rallies,
        ];
    }

    public function deleteMedia($_, array $args): bool
    {
        $rallies = $this->rallydataRepository
            ->getByMediaIds($args['ids'])
            ->map(function ($item) use ($args) {
                $data = $item->data;
                foreach ($data as &$datum) {
                    if (isset($datum['type']) && $datum['type'] == 'media') {
                        $datum['media_ids'] = array_diff($datum['media_ids'], $args['ids']);
                    }
                }
                $item->data = $data;
                return $item;
            });
        $updateCount = $this->rallydataRepository->updateDataByList($rallies->toArray());
        $isDelete = Media::whereIn('id', $args['ids'])
            ->delete();
        return true;
//        if ($isDelete) {
//            return true;
//        }
//        return false;
    }

}
