<?php

namespace App\Repositories;


use App\Models\Media;
use App\Services\MediaService;
use Illuminate\Support\Facades\Auth;

class MediaRepository
{

    private $media_service;

    public function __construct(
        MediaService $MediaService
    ) {
        $this->media_service = $MediaService;
    }

//    public function handle_media($args)
//    {
//        $mediaIds = [];
//        foreach ($args['data'] as $key => &$datum) {
//            if (isset($datum[0]['uid'])) {
//                $media_ids = [];
//                foreach ($datum as &$item) {
//                    if (isset($item['response']['id'])) {
//                        $media_ids[] = $item['response']['id'];
//                    }
//                }
//                $mediaIds = array_merge($mediaIds, $media_ids);
//                $datum = [
//                    'type'      => 'media',
//                    'media_ids' => $media_ids
//                ];
//            }
//        }
//        self::uploaded($mediaIds);
//        return $args;
//    }

    public function create_first_upload($media)
    {
        $media = array_merge($media, [
            'user_id' => Auth::id(),
            'stage'   => 'first upload',
        ]);
        $create = Media::create($media);
        if ($create) {
            return $create;
        }
        return null;
    }

    public function uploaded($mediaIds)
    {
        $upload = Media::whereIn('id', $mediaIds)
            ->where('stage', 'first upload')
            ->update(['stage' => 'uploaded']);
        return $upload;
    }

    public function getByIds($mediaIds, $select = '*')
    {
        return Media::selectRaw($select)
            ->whereIn('id', $mediaIds)
            ->get();
    }

    public function getByDatasetId($datasetId, $select = '*')
    {
        $media = Media::selectRaw($select)
            ->orderBy('id', 'desc');
        if ($datasetId) {
            $media->where('dataset_id', $datasetId);
        }
        $media = $media
            ->get()
            ->map(function ($medium) {
                $image = asset('storage/'.$medium->file_name);
                $medium->image = $image;
                $medium->thumb_image = $this->media_service->get_thumb($image);
                return $medium;
            });
        return $media;
    }

}
