<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class IsSeller
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
        if (Auth::check() && Auth::user()->user_type == 'seller' && !Auth::user()->banned) {
            if(Auth::user()->phone_verified == 0){
                return redirect()->route('seller.mobile-otp.form');
            }
            
            // if seller is not approved
            if(Auth::user()->status !== 1){
                return redirect()->signedRoute('registration.status', ['user_id' => Auth::user()->id]);
            }
            return $next($request);
        }
        else{
            abort(404);
        }
    }
}
