<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\App;

class SetLocale
{
    public function handle($request, Closure $next)
    {
        // Vérifie si une langue est stockée dans la session
        $locale = session('locale', config('app.locale'));

        // Définit la langue active
        App::setLocale($locale);

        return $next($request);
    }
}
