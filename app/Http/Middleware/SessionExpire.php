<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SessionExpire
{
    public function handle(Request $request, Closure $next)
    {
        $maxLifetime = now()->subHours(5);

        if (Auth::check() && session('last_activity') && session('last_activity') < $maxLifetime) {
            Auth::logout();
            session()->flush();
            return redirect()->route('login')->with('message', 'Session expired. Please login again.');
        }

        session(['last_activity' => now()]);

        return $next($request);
    }
}
