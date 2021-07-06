<?php

namespace App\Http\Middleware;

use App\Services\StringService;
use Closure;
use Illuminate\Http\Request;

class RestfulTokenIsValid
{

    private $stringService;

    public function __construct(
        StringService $stringService
    ) {
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
        $authorization = $request->header('authorization', 'Bearer ');
        $restful_token = str_replace('Bearer ', '', $authorization);
        $decode = $this->stringService->JWT_decode($restful_token);
        if (isset($decode['dataset_id'])) {
            return $next($request);
        }
        abort(401, 'Unauthorized');
    }
}
