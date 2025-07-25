<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    public function handle($request, Closure $next, $role)
    {
        if (!Auth::check() || Auth::user()->role !== $role) {
            abort(403, 'anda ada di role yang berbeda, dilarang masuk!');
        }

        return $next($request);
    }
}
