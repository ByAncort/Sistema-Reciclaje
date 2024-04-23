<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    public function handle(Request $request, Closure $next, $role)
    {
        $roleId = intval($role);

        // Asegúrate de que el usuario esté autenticado y tenga el rol requerido
        if (!$request->user() || !$request->user()->hasRole($roleId)) {
            abort(403, 'Unauthorized action.');
        }

        return $next($request);
    }
}
