<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response) $next
     */


    public function handle(Request $request, Closure $next): Response
    {
        if (!auth()->user()->is_admin) {
            return redirect(RouteServiceProvider::HOME);
        }
        return $next($request);
    }
}
