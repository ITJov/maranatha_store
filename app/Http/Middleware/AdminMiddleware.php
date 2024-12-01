<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (auth()->check()) {
            \Log::info('Authenticated User ID: ' . auth()->user()->id);
            \Log::info('User Role ID: ' . auth()->user()->role_id);
        }

        if (auth()->check() && auth()->user()->role_id !== '1') {
            abort(403, 'Access denied. Admins only.');
        }
        return $next($request);
    }
}