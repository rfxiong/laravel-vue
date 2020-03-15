<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class AdminCheck
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
        if(!Auth::guard('admin')->check()){
            return redirect('admin/login')->with('danger','请先登录！');

            //return view('admin.entry.login');  不能在中间件中直接return view
        }
        return $next($request);
    }
}
