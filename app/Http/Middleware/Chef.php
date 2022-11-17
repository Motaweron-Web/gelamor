<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Chef
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
//        abort(403);
        if (Auth::guard('chef')->check()){
            if ($request=='login'){
                return redirect()->route('chef.home');
            }
//            return $request;
            return $next($request);
        }
//        abort(403);
        return redirect()->route('select-login');
    }
}
