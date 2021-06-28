<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Media;
use App\Repositories\MediaRepository;
use App\Services\MediaService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $req = $request->all();
        $image = $request->file('file');
        if (!$image->isValid()) {
            return response()->json(['status' => false]);
        }

        $type = preg_replace('#\/.*?$#mis', '', $image->getMimeType());
        switch ($type) {
            case 'image':
                $path = $image->getRealPath();
                $imageName = 'media/images/' . date('Y-m-d') . '-' . time() . '-' . rand() . '-' . Auth::id() . '.wepb';
                $imagePath = storage_path() . "/app/public/$imageName";
                $isConverted = $this->media_service->jcphp01_generate_webp_image($path, $imagePath);
                $this->media_service->thumb_image($path, $imagePath);
                if ($isConverted) {
                    $media = array_merge($request->all(), [
                        'name_upload' => $image->getClientOriginalName(),
                        'file_type'   => $type,
                        'file_name'   => $imageName,
                    ]);
                    if($create = $this->media_repository->create_first_upload($media)){
                        $image = asset('storage/'.$create->file_name);
                        $create->image = $image;
                        $create->thumb_image = $this->media_service->get_thumb($image);
                    }
                }
                return response()->json(@$create);
                break;
        }
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
