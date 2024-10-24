<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  $role
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $role)
    {
        // Obtener el ID del rol basado en el string pasado
        $roleId = $this->getRoleId($role);

        // Permitir acceso si el usuario es admin, independientemente del rol requerido
        if (!Auth::check() || (Auth::user()->role_id != $roleId && Auth::user()->role_id != 1)) {
            return redirect('/'); // Redirige si no tiene el rol necesario
        }

        return $next($request);
    }

    private function getRoleId($role)
    {
        // Asigna ID a cada rol
        $roles = [
            'admin' => 1,
            'teacher' => 2,
            'student' => 3,
        ];

        return $roles[$role] ?? null; // Devuelve null si el rol no está definido
    }
}
