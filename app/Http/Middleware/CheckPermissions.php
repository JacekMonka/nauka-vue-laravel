<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckPermissions
{
    public function handle(Request $request, Closure $next): Response
    {
        // Sprawdź czy użytkownik istnieje
        if (!$request->user()) {
            return redirect()->route('login');
        }

        // Wywołaj Policy
        if (!$request->user()->can('access', $request->user())) { // ✅ Przekaż instancję User
            \Log::warning('Brak dostępu dla: ' . $request->user()->email);
            return redirect('/');
        }

        return $next($request);
    }
}
