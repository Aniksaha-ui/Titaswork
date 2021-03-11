<?php

namespace App\Http\Middleware;
use App\user;
use Closure;

class admin
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
         if($request->user() && $request->user()->role=="admin"){
                return $next($request);
            }

            else{
                return back();
            }
       
    }
}
