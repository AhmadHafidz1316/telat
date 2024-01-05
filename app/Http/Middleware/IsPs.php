<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class IsPs
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::user()->role === 'ps') {
            return $next($request);
        } else {
            return redirect()->route('login')->with('canAccess', 'Silahkan login terlebih dahulu!');
        }
    }
}
