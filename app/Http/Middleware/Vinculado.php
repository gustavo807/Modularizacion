<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
//use App\Vinculado;

class Vinculado
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    // Middleware para filtrar a los usuarios
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::user()->rol_id != 2) {
            return redirect('/erros/404');
        }
         return $next($request);
    }
}
