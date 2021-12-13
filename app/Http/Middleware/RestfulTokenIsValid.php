<?php

namespace App\Http\Middleware;

use App\Repositories\ResourceRepository;
use App\Services\StringService;
use Closure;
use Illuminate\Http\Request;

class RestfulTokenIsValid
{

    private $stringService;
    private $resource_repository;

    public function __construct(
        StringService $stringService,
        ResourceRepository $resourceRepository
    ) {
        $this->resource_repository = $resourceRepository;
        $this->stringService = $stringService;
    }

    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        \Illuminate\Support\Facades\Log::channel('single')->info('11', []);
        
        $authorization = $request->header('authorization', 'Bearer ');
        $restful_token = str_replace('Bearer ', '', $authorization);
        $decode = $this->stringService->JWT_decode($restful_token);
        \Illuminate\Support\Facades\Log::channel('single')->info('22', []);
        
        if (is_numeric(@$decode['dataset_id']) && is_numeric(@$decode['user_id'])) {
            $resourceName = $request->segment(3);
            $resource = $this->resource_repository->findByNameDatasetId($resourceName, $decode['dataset_id']);
            \Illuminate\Support\Facades\Log::channel('single')->info('33', []);

            if ($resource) {
                $request->request->set('_restful', [
                    'dataset_id' => $decode['dataset_id'],
                    'user_id'    => $decode['user_id'],
                    'resource'   => $resource->toArray(),
                ]);
                return $next($request);
            }
            abort(401, 'Resource not found');
        }
        abort(401, 'Unauthorized');
    }
}
