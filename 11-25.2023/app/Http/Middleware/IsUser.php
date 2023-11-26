<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class IsUser
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
        if (Auth::check()){
            if(Auth::user()->user_type == 'customer')
            {
                // if customer is not approved
                if(Auth::user()->status != 1){
                    return redirect()->signedRoute('seller.registration.status', ['user_id' => Auth::user()->id]);
                }
            }
            else if(Auth::user()->user_type == 'seller')
            {
                // if seller is not approved
                if(Auth::user()->status !== 1){
                    return redirect()->signedRoute('registration.status', ['user_id' => Auth::user()->id]);
                }
            }
         return $next($request);
        }
        else{
            session(['link' => url()->current()]);
            return redirect()->route('user.login');
        }
    }
}
