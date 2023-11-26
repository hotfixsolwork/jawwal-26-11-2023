<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class IsCustomer
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
        if (Auth::check() && (Auth::user()->user_type == 'customer')) {
            // if customer is not approved
            if(Auth::user()->status != 1){
                return redirect()->signedRoute('seller.registration.status', ['user_id' => Auth::user()->id]);
            }
            return $next($request);
        }
        else{
            session(['link' => url()->current()]);
            return redirect()->route('user.login');
        }
    }
}
