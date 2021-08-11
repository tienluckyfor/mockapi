<?php


namespace App\GraphQL\Mutations;


use App\Models\Media;
use App\Repositories\MediaRepository;
use App\Repositories\RallydataRepository;
use App\Services\StringService;

class MediaMutations
{
    private $stringService;
    private $rallydataRepository;
    private $mediaRepository;

    public function __construct(
        StringService $stringService,
        RallydataRepository $rallydataRepository,
        MediaRepository $mediaRepository
    ) {
        $this->mediaRepository = $mediaRepository;
        $this->stringService = $stringService;
        $this->rallydataRepository = $rallydataRepository;
    }

    public function askDeleteMedia($_, array $args)
    {
        // type Media
        $rallies = $this->rallydataRepository
            ->getByMediaIds($args['ids'])
            ->map(function ($item) {
                $data = array_filter($item->data, function ($item1, $key1) {
                    return in_array(gettype($item1), ['string', 'integer']);
                }, ARRAY_FILTER_USE_BOTH);
                return $data;
            });

        // type LongText
        $mediaFiles = $this->mediaRepository->getByIds($args['ids'])
            ->map(function ($item) {
                return preg_replace('/^.+?([^\/]+)\..+?$/mis', '$1', $item->file_name);
            })->toArray();
        $rallies1 = $this->rallydataRepository
            ->getByMediaFiles($mediaFiles)
            ->map(function ($item) {
                return $item->data;
            });
//        \Illuminate\Support\Facades\Log::channel('single')->info('$rallies1', [$rallies1]);
//        dd($rallies, $rallies1);
        $mergedRallies = $rallies->toBase()->merge($rallies1->toBase());
        if ($mergedRallies->isEmpty()) {
            Media::whereIn('id', $args['ids'])
                ->delete();
            return [
                'status'  => true,
                'rallies' => $mergedRallies,
            ];
        }
        return [
            'status'  => false,
            'rallies' => $mergedRallies,
        ];
    }

    public function deleteMedia($_, array $args): bool
    {
        // type Media
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

        // type LongText
        $mediaFiles = $this->mediaRepository->getByIds($args['ids'])
            ->map(function ($item) {
                return preg_replace('/^.+?([^\/]+)\..+?$/mis', '$1', $item->file_name);
            })->toArray();
        $rallies = $this->rallydataRepository
            ->getByMediaFiles($mediaFiles)
            ->map(function ($item) use ($mediaFiles) {
                $data = $item->data;
                foreach ($mediaFiles as $mediaFile) {
                    foreach ($data as &$datum) {
                        if(is_string($datum))
                            $datum = preg_replace('#<img[^>]+' . $mediaFile . '[^>]+>|<p><\/p>#mis', '', $datum);
                    }
                }
                $item->data = $data;
                return $item;
            });
        $updateCount = $this->rallydataRepository->updateDataByList($rallies->toArray());
        $isDelete = Media::whereIn('id', $args['ids'])
            ->delete();
        return true;
    }

}
