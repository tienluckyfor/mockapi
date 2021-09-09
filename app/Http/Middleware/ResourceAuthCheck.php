<?php

namespace App\Http\Middleware;

use App\Repositories\ResourceRepository;
use Closure;
use Illuminate\Http\Request;

class ResourceAuthCheck
{

    private $resource_repository;

    public function __construct(
        ResourceRepository $resourceRepository
    ) {
        $this->resource_repository = $resourceRepository;
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
        $r = $request->input('_restful');
        if (isset($r['resource']) && $this->resource_repository->checkAuthByResource($r['resource'])) {
            abort(401, "This method doesn't support Auth Resource");
        }
        return $next($request);
    }
}
