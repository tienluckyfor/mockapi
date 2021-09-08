<?php

namespace App\Http\Middleware;

use App\Helpers\RallydataHelper;
use App\Repositories\RallydataRepository;
use App\Services\StringService;
use Closure;
use Illuminate\Http\Request;

class RallyTokenIsValid
{

    private $string_service;
    private $rallydata_repository;
    private $rallydata_helper;

    public function __construct(
        RallydataHelper $rallydataHelper,
        StringService $stringService,
        RallydataRepository $rallydataRepository
    ) {
        $this->rallydata_helper = $rallydataHelper;
        $this->rallydata_repository = $rallydataRepository;
        $this->string_service = $stringService;
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
        $token = $request->header('rallytoken', 'Bearer ');
        $token = str_replace('Bearer ', '', $token);
        $decode = $this->string_service->JWT_decode($token);
        $r = $request->input('_restful');
        if (isset($r['resource']['id']) && isset($decode['_username'], $decode['_password'])) {
            unset($decode['time']);
            $rally = $this->rallydata_helper->findRallyByFields($r, $decode);
            if ($rally) {
                $request->request->set('_rallydata', $rally);
                return $next($request);
            }
            abort(401, 'Rallytoken is not valid!');
        }
        abort(401, 'Unauthorized');
    }
}
