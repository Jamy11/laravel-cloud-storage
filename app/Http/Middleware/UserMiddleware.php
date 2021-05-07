<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class UserMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if($request->session()->get('role')=='user')
        {
            return $next($request);
        }
        else
        {
            $request->session()->flash('msg','Log in to get Access.');
            return redirect()->route('home');
        }

    }
}
