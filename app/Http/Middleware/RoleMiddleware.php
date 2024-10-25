<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, $role)
    {
        // Obtener el ID del rol basado en el string pasado
        $roleId = $this->getRoleId($role);

        // Permitir acceso si el usuario es admin, independientemente del rol requerido
        if (!Auth::check() || (Auth::user()->role_id != 1 && Auth::user()->role_id != 2)) {
            return response()->json(['error' => 'Unauthorized'], 401); // Retorna JSON si no tiene acceso
        }

        return $next($request);
    }

    private function getRoleId($role)
    {
        $roles = [
            'admin' => 1,
            'teacher' => 2,
            'student' => 3,
        ];

        return $roles[$role] ?? null; // Devuelve null si el rol no está definido
    }
}

