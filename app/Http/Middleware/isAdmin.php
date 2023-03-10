<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Auth;
use Closure;
use Illuminate\Http\Request;

class isAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next, ...$levels)
    {
        $roles = array_slice(func_get_args(), 2);

        foreach ($roles as $role) { 
            $user = \Auth::user()->level;
            if( $user == $role){
                return $next($request);
            }
        }

        /* if (\Auth::user() &&  in_array(\Auth::user()->level, $levels) ) {
            return $next($request);
       } */

       return back()->with('error','Opps, Error');
    }
}

/* public function handle(Request $request, Closure $next, ...$levels)
{
    if (in_array($request->user()->level, $levels)) {
        return $next($request);
    }


   return back()->with('error','Opps');
} */