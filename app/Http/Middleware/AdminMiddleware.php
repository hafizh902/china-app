<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

// Middleware untuk memproteksi route admin
class AdminMiddleware
{
    /**
     * Handle an incoming request.
     * Mengecek apakah user sudah login dan memiliki role admin
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Jika user belum login atau bukan admin, tolak akses
        if (!auth()->check() || auth()->user()->role !== 'admin') {
            abort(403, 'Unauthorized'); // Error 403 Forbidden
        }

        return $next($request);
    }
}
