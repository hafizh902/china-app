<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DisablePageExpired
{
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);
        
        // Disable browser cache untuk mencegah "page expired"
        $response->headers->set('Cache-Control', 'no-cache, no-store, must-revalidate');
        $response->headers->set('Pragma', 'no-cache');
        $response->headers->set('Expires', '0');
        
        return $response;
    }
}