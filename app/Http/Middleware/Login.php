<?php

namespace App\Http\Middleware;

use Closure;

class Login
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
        //判断有没有session,没有跳到登录页面
        if(!($request->session()->exists('name'))) {
            return redirect()->action('myshop\LoginController@login');
        }
        return $next($request);
    }
}
