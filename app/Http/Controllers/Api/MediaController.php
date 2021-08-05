<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Media;
use App\Repositories\MediaRepository;
use App\Services\MediaService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;
use Illuminate\Validation\ValidationException;
use Image;
use Pusher\ApiErrorException;

class MediaController extends Controller
{

    private $media_service;
    private $media_repository;

    public function __construct(
        MediaService $MediaService,
        MediaRepository $MediaRepository
    ) {
        $this->media_service = $MediaService;
        $this->media_repository = $MediaRepository;
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function index(Request $request)
    {
        $img = Image::canvas(600, 600, '#5E00EF');
        $img->text($request->text, ($img->getWidth() / 2), ($img->getHeight() / 2), function ($font) use ($img) {
            $font->file(storage_path() . '/fonts/Open_Sans/OpenSans-Bold.ttf');
            $font->color('#fff');
            $font->align('center');
            $font->valign('middle');
            $image_width = $img->getWidth();
            $font_size = 20;
            $font->size($font_size);
            $box_size = $font->getBoxSize();
            $larger = $box_size["width"] > $image_width;

            while (($larger && $box_size["width"] > $image_width) || (!$larger && $box_size["width"] < $image_width)) {
                if ($larger) {
                    $font_size--;
                } else {
                    $font_size++;
                }
                $font->size($font_size);
                $box_size = $font->getBoxSize();
            }
            if ($box_size["width"] > $image_width) {
                $font_size--;
            }
            $font_size -= 10;
            $font->size($font_size);
        });
        return $img->response();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $file = $request->file('file');
        if(!$file){
            throw ValidationException::withMessages([
                'file' => ['File is required'],
            ]);
        }
        $extension = $file->extension();

        if (!$file || !$file->isValid()) {
            return response()->json(['status' => false]);
        }
        switch ($file->getMimeType()) {
            case (preg_match('#video#', $file->getMimeType()) ? true : false):
                $fileType = 'video';
                $fileName = 'media/videos/' . date('Y-m-d') . '-' . time() . '-' . rand() . '-' . Auth::id() . '.' . $extension;
                $filePath = storage_path() . "/app/public";
                $file->move($filePath . '/media/videos', $fileName);
                $fileThumb = 'api/media?text=' . urlencode($file->getClientOriginalName());
                $convertStatus = true;
                break;
            case (preg_match('#image#', $file->getMimeType()) ? true : false):
                $fileType = 'image';
                $path = $file->getRealPath();
                $fileName = 'media/images/' . date('Y-m-d') . '-' . time() . '-' . rand() . '-' . Auth::id() . '.wepb';
                $filePath = storage_path() . "/app/public/$fileName";
                $convertStatus = $this->media_service->jcphp01_generate_webp_image($path, $filePath);
                $this->media_service->thumb_image($path, $filePath);
                $fileThumb = $this->media_service->get_thumb($fileName);
                if ($convertStatus == 'NOT_SUPPORT') {
                    $fileName = 'media/images_NOT_SUPPORT/' . date('Y-m-d') . '-' . time() . '-' . rand() . '-' . Auth::id() . '.' . $extension;
                    $filePath = storage_path() . "/app/public";
                    $file->move($filePath . '/media/images_NOT_SUPPORT', $fileName);
                }
                break;
            default:
                $fileType = preg_replace('#\/.*?$#mis', '', $file->getMimeType());
                $extension = !empty($extension) ? $extension : $fileType;
                $extension = in_array($extension, ['text']) ? 'txt' : $extension.'1';
                $fileName = 'media/files/' . date('Y-m-d') . '-' . time() . '-' . rand() . '-' . Auth::id() . '.' . $extension;
                $filePath = storage_path() . "/app/public";
                $file->move($filePath . '/media/files', $fileName);
                $fileThumb = 'api/media?text=' . urlencode($file->getClientOriginalName());
                $convertStatus = true;
                break;
        }
        if (@$convertStatus) {
            $media = array_merge($request->all(), [
                'name_upload' => $file->getClientOriginalName(),
                'file_type'   => @$fileType,
                'file_name'   => @$fileName,
                'file_thumb' => @$fileThumb,
                'user_id' => Auth::id(),
                'stage'   => 'first upload',
            ]);
            $create = Media::create($media);
        }
        return response()->json(@$create);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Media $media
     * @return \Illuminate\Http\Response
     */
    public function show(Media $media)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Media $media
     * @return \Illuminate\Http\Response
     */
    public function edit(Media $media)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Media $media
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Media $media)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Media $media
     * @return \Illuminate\Http\Response
     */
    public function destroy(Media $media)
    {
        //
    }
}
