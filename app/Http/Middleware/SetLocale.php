<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SetLocale
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        if ($request->has('lang')) {
            $locale = $request->query('lang');
            if (in_array($locale, ['en', 'cn'])) {
                session(['locale' => $locale]);
            }
        }

        $locale = session('locale', 'en');
        app()->setLocale($locale);

        return $next($request);
    }
}
