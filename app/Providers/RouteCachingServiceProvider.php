<?php

namespace App\Providers;

use App\Services\RouteCachingService;
use App\Services\RouteCachingInterface;
use Api\v1\Middleware\RouteCaching;

class RouteCachingServiceProvider
{

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../../config/route-caching.php' => config_path('route-caching.php'),
        ]);
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        app('router')->aliasMiddleware('route.caching', RouteCaching::class);

        $this->app->singleton(RouteCachingInterface::class, function ($app) {
            return new RouteCachingService(config('route-caching'));
        });
    }
}
