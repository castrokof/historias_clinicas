<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PermisoConsultor
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $rol = session()->get('rol_nombre');

        if (in_array($rol, ['administrador', 'empresa', 'empleado'])) {
            return $next($request);
        }

        return redirect('/tablero')->with('mensaje', 'No tiene permiso para entrar aqui');
    }
}
