<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  ...$roles
     * @return mixed
     */
    public function handle(Request $request, Closure $next, ...$roles)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $user = Auth::user();
        \Log::info("Middleware check for role: {$user->role}");
        if (!in_array($user->role, $roles)) {
            \Log::info("Access denied for role: {$user->role}");
            abort(403, 'Akses ditolak.');
        }

        return $next($request);
    }
}
