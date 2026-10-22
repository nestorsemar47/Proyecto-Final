<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class EsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!Auth::check() || Auth::user()->rol !== 'administrador') {
            // Rebotamos al usuario a la página de inicio con un mensaje flash de error
            return redirect()->route('home')->with('error', 'No tienes permisos de administrador para acceder a esta sección.');
        }
        
        return $next($request);
    }
}
