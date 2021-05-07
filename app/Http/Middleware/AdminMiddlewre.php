<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminMiddlewre
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
        if($request->session()->get('role') == 'admin')
        {
            return $next($request);
        }
        else
        {
            $request->session()->flash('msg','You are not an Admin.');
            return redirect()->route('home');

        }
    }
}
