<?php

namespace App\Http\Middleware;
use Auth;
use Closure;
use Illuminate\Auth\Middleware\Authenticate as Middleware;

class AdminAuthenticate
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
        // dd($request);
        if (!Auth::guard('admin')->check()){
          return redirect('admin/login');
        }
        return $next($request);
    }
}
