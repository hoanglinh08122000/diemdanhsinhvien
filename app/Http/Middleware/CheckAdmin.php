<?php

namespace App\Http\Middleware;

use Closure;
use Session;

class CheckAdmin
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
        if (Session::get('level') == 1){
            return $next($request);
        }else{
            return redirect()-> route('login')->with('erron','Bạn phải đăng nhập ');
        }
    }
}
