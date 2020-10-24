<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class DummyRole
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
                return $next($request);

            if (Auth::user()->role_id == 2)
                return redirect()->route('home');

            if (Auth::user()->role_id == 3)
                return redirect()->route('home');

            if (Auth::user()->role_id == 4)
                return redirect()->route('home');

            if (Auth::user()->role_id == 5)
                return redirect()->route('home');
        }    }
}
