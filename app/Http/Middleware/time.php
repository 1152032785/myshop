<?php

namespace App\Http\Middleware;

use Closure;

class time
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
      $a=strtotime('now');
      $b=strtotime('15:00');
      $c=strtotime('19:00');
      if($b>$a || $a>$c){
        return redirect()->action('myshop\IndexController@index');   
      }
        return $next($request);
    }
}
