<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RestrictAfterAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if( Auth::guard('admin')->user()){
            return redirect()->route('admin.dashboard');
        }

        if( Auth::guard('seller')->user()){
            return redirect()->route('seller.dashboard');
        }

        if( Auth::guard('editor')->user()){
            return redirect()->route('editor.dashboard');
        }


        if( Auth::guard('web')->user()){
            return redirect()->route('user.dashboard');

        }

        return $next($request);
    }
}
