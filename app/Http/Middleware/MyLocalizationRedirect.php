<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Arcanedev\Localization\Middleware\Middleware;

/**
 * Class     LocalizationRedirect
 *
 * @package  Arcanedev\Localization\Middleware
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 */
class MyLocalizationRedirect extends Middleware
{
    /* -----------------------------------------------------------------
      |  Main Methods
      | -----------------------------------------------------------------
     */

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure                  $next
     *
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // If the request URL is ignored from localization.
        if ($this->shouldIgnore($request))
            return $next($request);

        if ($redirectUrl = $this->getRedirectionUrl($request)) {
            // Save any flashed data for redirect
            session()->reflash();

            return $this->makeRedirectResponse($redirectUrl);
        }

        return $next($request);
    }

    /* -----------------------------------------------------------------
      |  Other Methods
      | -----------------------------------------------------------------
     */

    /**
     * Get redirection.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     * @return string|false
     */
    protected function getRedirectionUrl(Request $request)
    {
        $locale = $request->segment(1, null);

        if ($this->localization->getAllLocales()->has($locale)) {
            if (in_array($locale, ['bg', 'en', 'en-US'])) {
                return $this->isDefaultLocaleHidden($locale) ? $this->localization->getNonLocalizedURL() : false;
            } else {
                return $this->localization->getLocalizedURL($this->getDefaultLocale(), $request->url(), [], true);
            }
        }
        // If the current url does not contain any locale
        // The system redirect the user to the very same url "localized" we use the current locale to redirect him
        if (
                $this->getCurrentLocale() !== $this->getDefaultLocale() ||
                !$this->hideDefaultLocaleInURL()
        ) {
            return $this->localization->getLocalizedURL(session('locale'), $request->fullUrl());
        }

        return false;
    }

}
