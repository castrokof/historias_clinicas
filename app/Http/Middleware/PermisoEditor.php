<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PermisoEditor
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $rol = session()->get('rol_nombre');

        if (in_array($rol, ['administrador', 'empresa'])) {
            return $next($request);
        }

        return redirect('/tablero')->with('mensaje', 'No tienes autorización para realizar esta acción.');
    }
}
