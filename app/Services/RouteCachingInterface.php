<?php

namespace App\Services;

use Closure;
use Illuminate\Http\Request;

interface RouteCachingInterface
{

    public function sure(Request $request, Closure $next);
}
