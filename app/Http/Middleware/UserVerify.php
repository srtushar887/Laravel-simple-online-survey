<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserVerify
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

        if (Auth::check()) {
            if (Auth::user()->account_type == 2) {
                return $next($request);
            }elseif (Auth::user()->account_type == 2){
                Auth::guard('web')->logout();
                return redirect()->route('user.login')->with('verify_error','Sorry! Your account has been blocked');

            }else{
                Auth::guard('web')->logout();
                return redirect()->route('user.login')->with('verify_error','Sorry! Your account not verify yet. Please verify your account');
            }
        }


    }
}
