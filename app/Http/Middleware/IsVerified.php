<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Sentinel;
use Redirect;
class IsVerified
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {     $user=Sentinel::getUser();
        if ($user!=false && $user->verified==0) {
           return Redirect::to('/profile');
        } else {
            return $next($request);
        }
    }
}
