<?php

namespace App\Http\Middleware;

use Closure;

class PermisoAdministrador
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        if ((session()->get('rol_nombre') == ('administrador')))
        return $next($request);
        
        abort(403, "No tienes autorización para ingresar.");
        //return redirect('/tablero')->with('mensaje', 'No tiene permiso para entrar aqui');

    }

   
}
