<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class UserMiddleware
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
        if(Auth::check()){ //check if user is logged in
            if ($request->user()->role_id == 1 || $request->user()->role_id == 2){ // check if user is either an admin or a service point
            return $next($request);
            }
        }
        else{
            return redirect('/');
        }
    }
}
