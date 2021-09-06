<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Repositories\DatasetRepository;
use App\Services\PostmanService;
use Illuminate\Support\Facades\URL;
use Carbon\Carbon;

class PostmanController extends Controller
{

    private $postman_service;
    private $dataset_repository;

    public function __construct(
        PostmanService $PostmanService,
        DatasetRepository $DatasetRepository
    ) {
        $this->dataset_repository = $DatasetRepository;
        $this->postman_service = $PostmanService;
    }

    public function collection($datasetId)
    {
        $data = $this->postman_service->collection($datasetId);
        return response()->json($data);
    }

    public function environment($datasetId)
    {
        $data = $this->postman_service->environment($datasetId);
        return response()->json($data);
    }
}
