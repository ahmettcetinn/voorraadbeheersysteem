<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string $role): Response
    {
        /** @var \App\Models\Gebruiker $user */
        $user = Auth::user();

        // Check if user is logged in
        if (!$user) {
            abort(403, 'Je moet ingelogd zijn.');
        }

        // Check role
        if ($role === 'docent' && !$user->isDocent()) {
            abort(403, 'Alleen docenten mogen dit doen.');
        }

        if ($role === 'student' && !$user->isStudent()) {
            abort(403, 'Alleen studenten mogen dit doen.');
        }

        return $next($request);
    }
}