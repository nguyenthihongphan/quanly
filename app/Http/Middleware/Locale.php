<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\App;
use Closure;
use Illuminate\Http\Request;

class Locale
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        // if (session()->has('locale')) {
        //     App::setLocale(session()->get('locale'));
        // }
        // else { // This is optional as Laravel will automatically set the fallback language if there is none specified
        //     App::setLocale(config('app.fallback_locale'));
        // }
        // return $next($request);
        $availLocale=['en'=>'en', 'vi'=>'vi'];

              // Locale is enabled and allowed to be change
              if(session()->has('locale') && array_key_exists(session()->get('locale'),$availLocale)){
                  // Set the Laravel locale
                  app()->setLocale(session()->get('locale'));
              }
              return $next($request);
            }

}
