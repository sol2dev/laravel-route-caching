<?php

namespace Api\v1\Middleware;

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
        $this->routeCachingApi = $routeCachingApi;
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
        return $next($request);
    }
}
