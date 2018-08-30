<?php

namespace App\Services;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Redis;

class RouteCachingService implements RouteCachingInterface
{

    /**
     * @var array
     */
    private $config;

    public function __construct(array $config)
    {
        $this->setConfig($config);
    }

    private function setConfig(array $config)
    {
        $this->config = $config;
        return $this;
    }

    private function getConfig()
    {
        return $this->config;
    }

    public function sure(Request $request, Closure $next)
    {
        $cacheKey = $request->getQueryString();
        $response = Redis::get($cacheKey);
        if (!empty($response)) {
            return $response;
        }

        $response = $next();

        if (Response::HTTP_OK == $response->status()) {
            Redis::set($cacheKey, $response, 'EX', $this->getConfig()['ttl']);
        }

        return $response;
    }
}
