<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class Setlanguage
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
        \App::setlocale($request->language);

        if ($request->language == null) {
            if (Cookie::get('user_lang') != null) {
                App::getLocale()
                return redirect()->route('home');
            }
        }
        return $next($request);
    }
}
