<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Services\RouteCachingInterface;

class RouteCaching
{

    /**
     * @var RouteCachingInterface
     */
    private $routeCachingApi;

    public function __construct(RouteCachingInterface $routeCachingApi)
    {
        $this->setRouteCachingApi($routeCachingApi);
    }

    private function setRouteCachingApi(RouteCachingInterface $routeCachingApi)
    {
        $this->routeCachingApi = $routeCachingApi;
        return $this;
    }

    private function getRouteCachingApi()
    {
        return $this->routeCachingApi;
    }

    /**
     * Handle an incoming request.
     *
     * @param Request   $request
     * @param Closure   $next
     * @param mixed     ...$guards
     *
     * @return mixed
     */
    public function handle($request, Closure $next, ...$guards)
    {
        return $this
            ->getRouteCachingApi()
            ->sure(
                $request,
                function () use ($next, $request) {
                    return $next($request);
                }
            );
    }
}
