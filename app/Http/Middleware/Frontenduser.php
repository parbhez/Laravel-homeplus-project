<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Session;

class FrontendUser
{
    public function handle($request, Closure $next, $guard = 'user')
    {
        if (Session::has('frontend_lang')) {
            app()->setLocale((Session::get('frontend_lang') == 1) ? 'en' : 'bn');
        }else{
            Session::set('frontend_lang',1);
        }

        if (Auth::guard($guard)->guest()) {
            if ($request->ajax() || $request->wantsJson()) {
                return response('Unauthorized.', 401);
            } else {
                Session::flash('flash_error', 'You are not logged in.');
                return redirect()->guest('frontendUser');
            }
        }

        return $next($request);
    }
}
