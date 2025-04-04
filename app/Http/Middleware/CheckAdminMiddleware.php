<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
class CheckAdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
      if(Auth::check()){
        if(Auth::user()->role == 'admin'){
            return $next($request);
        }
        else{
            return redirect()->route('login')->with([
                'message'=>'Bạn không có quyền truy cập vào trang này'
            ]);
        }
      }
        return $next($request);
    }
}
