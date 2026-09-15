<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class HSTS
{
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);
        $response->header('Strict-Transport-Security', 'max-age=16070400; includeSubdomains');

        return $response;
    }
}
