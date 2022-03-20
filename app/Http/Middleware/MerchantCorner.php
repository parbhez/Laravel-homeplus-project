<?php

namespace App\Http\Middleware;

use Closure;
use Session;

class MerchantCorner
{
    public function handle($request, Closure $next)
    {
        if (Session::has('frontend_lang')) {
            app()->setLocale((Session::get('frontend_lang') == 1) ? 'en' : 'bn');
        }else{
            Session::set('frontend_lang',1);
        }
        
        if (! Session::has('merchant.id')){
            Session::flash('flash_error','You are not login.');
            return redirect('merchantPage');
        }
        return $next($request);
    }
}
