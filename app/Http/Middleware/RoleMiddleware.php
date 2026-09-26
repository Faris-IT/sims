<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    public function handle(
        Request $request,
        Closure $next,
        ...$roles
    ): Response {
        if (! $request->user()) {
            abort(401);
        }

        if (! $request->user()->role) {
            abort(403, 'User belum memiliki role.');
        }

        if (! in_array($request->user()->role->name, $roles)) {
            abort(403, 'Anda tidak memiliki akses ke halaman ini.');
        }

        return $next($request);
    }
}