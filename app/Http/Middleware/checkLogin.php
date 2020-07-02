<?php

namespace App\Http\Middleware;
use Auth;
use Closure;

class checkLogin
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
        if(Auth::check()&&Auth::user()->position=='admin'){
            return $next($request);
        }else{
   return redirect('/');
   $request->session()->flash('logins', 'Bạn không phải là admin bạn không thể vào trang này!');
        }

    }
}
