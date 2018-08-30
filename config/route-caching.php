<?php

return [
    'default' => env('ROUTE_CACHE_DRIVER', 'redis'),

    'stores' => [
        'redis' => [
            'host' => env('REDIS_HOST', '127.0.0.1'),
            'password' => env('REDIS_PASSWORD', null),
            'port' => env('REDIS_PORT', 6379),
            'database' => 0,
            'ttl' => 10
        ],
    ],
];
