<?php

namespace App\Http\Middleware;

use Closure;

class member
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $guard="members")
    {
        if(!auth()->guard($guard)->check()) {
            return redirect(route('member.login'));
        }
        return $next($request);
    }
}
