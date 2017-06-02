<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Arcanedev\Localization\Facades\Localization;
class SetGettextLocale
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        //dd(Localization::getCurrentLocaleRegional());
        \Xinax\LaravelGettext\Facades\LaravelGettext::setLocale(Localization::getCurrentLocaleRegional());

        return $next($request);
    }
}
