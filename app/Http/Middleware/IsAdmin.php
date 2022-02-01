<?php

namespace App\Http\Middleware;
use Closure;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;

// use Illuminate\Auth\Middleware\IsAdmin as Middleware;
// extends Middleware
class IsAdmin 
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::user()->login_type != 'admin') {
            return redirect('/');
        }

        return $next($request);
    }
}