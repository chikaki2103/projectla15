<?php

namespace App\Http\Middleware;
use Auth;
use Closure;
use Illuminate\Auth\Middleware\Authenticate as Middleware;

class AdminRedirectIfAuthenticated
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

         if (Auth::guard('admin')->check()){
            // dd('abc');

           return redirect('admin/home');
        }
        return $next($request);
    }
}
