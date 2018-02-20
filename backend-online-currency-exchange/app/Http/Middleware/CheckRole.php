<?php

namespace App\Http\Middleware;
use Auth;
use Closure;

class CheckRole
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

        if(Auth::user()->hasRole('Administrator')){
            return redirect('/login');
        }else{
            return $next($request);            
        }
    }
}
