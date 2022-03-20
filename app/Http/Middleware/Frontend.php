<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Session;

class Frontend
{

    public function handle($request, Closure $next, $guard = null)
    {
        if (Session::has('frontend_lang')) {
            app()->setLocale((Session::get('frontend_lang') == 1) ? 'en' : 'bn');
        }else{
            Session::set('frontend_lang',1);
        }

        return $next($request);
    }
}
