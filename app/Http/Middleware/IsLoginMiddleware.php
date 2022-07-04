<?php

namespace App\Http\Middleware;

use Auth;
use Closure;
use Sentinel;
use Redirect;

class IsLoginMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $type='')
    {
        if ($type != 'manger') {
            if (Sentinel::check()) {
                return Redirect::route('dashboard');
            } else {
                return $next($request);
            }
        } else {
            if (Auth::guard('mangers')->user()) {
               
                return Redirect::route('Business.index');
            } else {
               
                return $next($request);
            }
        }
    }
}
