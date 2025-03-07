<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class pizzaAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if(auth()->check() && auth()->user()->isAdmin==1){
            return $next($request);
        }else{
            return redirect()->route('login')->with('error', 'You are not authorized to access this page.');
        }

        return $next($request);
    }
}
