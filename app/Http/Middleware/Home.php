<?php

namespace App\Http\Middleware;

use Closure;

class Home
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
        if(!($request->session()->exists('name'))) {
            return redirect()->action('home\Login@login');
        }
        return $next($request);
    }
}
