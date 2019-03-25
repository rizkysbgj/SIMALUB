<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class ManajerMiddleware
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
        if(in_array(Auth::user()->IDRole, [1, 2, 3, 6]))
        {
            return $next($request);
        }
        else
        {
            return redirect()->route('login');
        }
    }
}
