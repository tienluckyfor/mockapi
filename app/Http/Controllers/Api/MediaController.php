<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Media;
use App\Repositories\MediaRepository;
use App\Services\MediaService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Image;

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
        if (!$file || !$file->isValid()) {
            return response()->json(['status' => false]);
        }
//        dd($request->toArray());
        [$convertStatus, $result] = $this->media_service->classify($file, (int) $request->dataset_id);
        if ($convertStatus) {
            $media = array_merge($request->all(), $result);
            \Illuminate\Support\Facades\Log::channel('single')->info('$media', [$media]);
            
            $create = Media::create($media);
//            dd($create->toArray());
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
