<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use Session;
class checkverify
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

        if (Auth::user()->state == 'unverify') {
            Auth::logout();
            return redirect()->intended(route('login'))->with(Session::flash('error', 'You are not Verify by Developer please Contact Master Admin, more info in about page'));
        }
        return $next($request);
    }
}
