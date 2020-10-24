<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Dispatcher
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (!Auth::check())
            return redirect()->route('login');
        else{
            if (Auth::user()->role_id == 1)
                return redirect()->route('dummy');

            if (Auth::user()->role_id == 2)
                return redirect()->route('home');

            if (Auth::user()->role_id == 3)
                return redirect()->route('home');

            if (Auth::user()->role_id == 5 or 4)
                return $next($request);
        }
    }
}
