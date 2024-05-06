<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    public function handle(Request $request, Closure $next, ...$roles)
    {
        // Asegúrate de que el usuario esté autenticado y tenga al menos uno de los roles requeridos
        $user = $request->user();
        
        if (!$user) {
            abort(403, 'Unauthorized action.');
        }
    
        foreach ($roles as $role) {
            if ($user->hasRole(intval($role))) {
                return $next($request);
            }
        }
    
        abort(403, 'Unauthorized action.');
    }
    
}
