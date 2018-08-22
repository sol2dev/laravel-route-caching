<?php

namespace App\Services;

class RouteCachingService implements RouteCachingInterface
{

    /**
     * @var array
     */
    private $config;

    public function __construct(array $config)
    {
        $this->config = $config;
    }
}
