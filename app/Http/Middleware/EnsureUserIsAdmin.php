<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class EnsureUserIsAdmin
{
    public function handle(Request $request, Closure $next): Response
{
    if (!Auth::user()?->isAdmin()) { // O '?->' é o operador nullsafe
        abort(403, 'Acesso não autorizado.');
    }
    return $next($request);
}
}