<?php

namespace App\Http\Middleware;

use Closure;

class Phone
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    // Middleware para consumir datos desde la aplicación de android
    public function handle($request, Closure $next)
    {
        return $next($request)
                    ->header('Access-Control-Allow-Origin', '*')
                    ->header('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS');
    }
}
