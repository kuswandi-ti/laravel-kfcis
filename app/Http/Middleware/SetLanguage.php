<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\SettingSystem;
use Illuminate\Support\Facades\App;
use Symfony\Component\HttpFoundation\Response;

class SetLanguage
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $setting_default = SettingSystem::pluck('value', 'key')->toArray();
        $locale = !empty($setting_default['default_language']) ? $setting_default['default_language'] : 'id';

        App::setLocale($locale);

        return $next($request);
    }
}
