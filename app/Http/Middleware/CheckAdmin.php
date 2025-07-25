<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Periksa apakah user sudah login
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        // Periksa apakah user memiliki role admin
        if (Auth::user()->role !== 'admin') {
            abort(403, 'Unauthorized access.');
        }

        return $next($request);
    }
}
