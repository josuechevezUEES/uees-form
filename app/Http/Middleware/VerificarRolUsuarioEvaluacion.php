<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class VerificarRolUsuarioEvaluacion
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {


        // Verifica si el usuario está autenticado
        if (!Auth::check()) {
            return abort(401, 'Usuario no autenticado');
        }

        // Obtén el usuario autenticado
        $user = Auth::user();

        // Verifica si el usuario tiene el rol 'evaluador'
        if (!$user->hasRole('estudiante')) {
            return abort(403, 'No tiene los accesos requeridos');
        }


        return $next($request);
    }
}
