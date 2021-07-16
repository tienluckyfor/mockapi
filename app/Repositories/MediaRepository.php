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

    public function create_first_upload($media)
    {
        $media = array_merge($media, [
            'user_id' => Auth::id(),
            'stage'   => 'first upload',
        ]);
        $media['dataset_id'] = (int)@$media['dataset_id'];
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

    public function mappingMedia($media)
    {
        return $media->map(function ($medium) {
            $image = asset('storage/' . $medium->file_name);
            $medium->image = $image;
            $medium->thumb_image = $this->media_service->get_thumb($image);
            return $medium;
        });
    }

    public function getByDatasetId($datasetId, $select = '*')
    {
        $media = Media::selectRaw($select)
            ->orderBy('id', 'desc');
        if ($datasetId) {
            $media->where('dataset_id', $datasetId);
        }
        $media = $this->mappingMedia($media->get());
        return $media;
    }

    public function getByUserId($userId, $select = '*')
    {
        $media = Media::selectRaw($select)
            ->orderBy('id', 'desc')
            ->where('user_id', $userId);
        $media = $this->mappingMedia($media->get());
        return $media;
    }

}
