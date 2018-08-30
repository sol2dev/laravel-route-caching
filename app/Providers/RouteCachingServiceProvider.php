<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\RouteCachingService;
use App\Services\RouteCachingInterface;
use App\Http\Middleware\RouteCaching;

/**
 *
 */
class RouteCachingServiceProvider extends ServiceProvider
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
