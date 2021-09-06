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
                \App::setlocale(Cookie::get('user_lang'));
                return redirect()->route('home',['language'=>\App::getlocale()]);
            }else{
                $cookie = Cookie::make('user_lang','fr', 60 * 24 * 365);
                return redirect()->route('home',['language'=>'fr'])->cookie($cookie);
            }
        }
        return $next($request);
    }
}
