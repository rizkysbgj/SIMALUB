<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class Rule5Middleware
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
        if(Auth::check() && in_array(Auth::user()->IDRole, [1, 2, 3, 4, 5, 6]))
        {
            return $next($request);
        }
        else
        {
            Auth::logout();
            return redirect()->route('login');
        }
    }
}
