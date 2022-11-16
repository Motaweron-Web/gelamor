<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;


class CheckAuthApi
{

    public function handle(Request $request, Closure $next,$guard = null)
    {

        if($guard != null){

            auth()->shouldUse($guard);

            try {

                auth()->authenticate();

            }catch (\Exception $exception){


                return returnMessageError($exception->getMessage(),401);
            }

            return $next($request);

        }




    }
}
