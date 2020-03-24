<?php

namespace App\Http\Middleware;

use Closure;

class IsAdmin
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
        if(auth()->user()->isAdmin()){
            return $next($request);
        }
        session(['error'=>['code'=>'Access denied','msg'=>'ผู้ใช้ส่วนนี้ต้องเป็น admin เท่านั้น']]);
        return redirect()->route('error');
    }
}
