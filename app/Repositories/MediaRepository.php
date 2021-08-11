<?php

namespace App\Repositories;


use App\Models\Media;
use App\Services\MediaService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

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

//    public function getByFiles($mediaFiles, $select = '*')
//    {
//        return Media::selectRaw($select)
//            ->where('file_name', 'like',
//            ->get();
//    }

    public function getByFiles($mediaFiles)
    {
        $wRaw = "file_name LIKE \"%" . implode('" OR file_name LIKE "%', $mediaFiles) . "%\"";
        return Media::select("*")
//            ->where('user_id', Auth::id())
            ->whereRaw($wRaw)
            ->get();
    }

    private function _copyFileBy($item){
        $randFile = time().'-'.rand();
        $nItem = $item;
        $nItem['file_name'] = preg_replace('/^(.*?[\/])([^\/]+)(\.\w+)$/mis', '${1}'.$randFile.'${3}', $item['file_name']);
        $nItem['file_thumb'] = preg_replace('/^(.*?[\/])([^\/]+)(\.\w+)$/mis', '${1}'.$randFile.'${3}', $item['file_thumb']);
        @copy(Storage::path('public/'.$item['file_name']), Storage::path('public/'.$nItem['file_name']));
        @copy(Storage::path('public/'.$item['file_thumb']), Storage::path('public/'.$nItem['file_thumb']));
        return $nItem;
    }

    public function duplicate($datasetId, $media)
    {
        $nMediaIds = [];
        foreach ($media as $item) {
            $nItem = self::_copyFileBy($item);
            $nItem['dataset_id'] = $datasetId;
            $nMedia = Media::create($nItem);
            $nMediaIds[$item['id']] = (string) $nMedia->id;
        }
        return $nMediaIds;
    }

}
