<?php

namespace App\Http\Middleware;

use Closure;

class RouteHome
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
        $admin = !$request->user()->hasRole('user');
        if($admin){
            return redirect('admin');
        } else {
            return $next($request);
        }
    }
}
