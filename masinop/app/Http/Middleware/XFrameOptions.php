<?php

namespace App\Http\Middleware;

use Closure;

class XFrameOptions
{
    public function handle($request, Closure $next)
    {
        $response = $next($request);

        $response->header('X-Frame-Options', 'SAMEORIGIN');

        return $response;
    }
}