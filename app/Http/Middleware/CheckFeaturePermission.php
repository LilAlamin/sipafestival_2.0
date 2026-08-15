<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckFeaturePermission
{
    /**
     * Handle an incoming request and check if user has required feature permission.
     */
    public function handle(Request $request, Closure $next, string $feature): Response
    {
        $user = $request->user();

        if (! $user) {
            return redirect()->route('login');
        }

        if (! $user->is_active) {
            auth()->logout();

            return redirect()->route('login')->withErrors(['email' => 'Akun Anda telah dinonaktifkan. Silakan hubungi Super Admin.']);
        }

        if (! $user->hasPermission($feature)) {
            if ($request->expectsJson() || $request->ajax()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Akses ditolak: Anda tidak memiliki izin untuk mengakses fitur ini.',
                ], 403);
            }

            $targetRoute = $user->getDefaultRedirectRoute();

            // Prevent infinite redirect loop if current URL is the default redirect
            if ($request->url() === $targetRoute) {
                abort(403, 'Akses Ditolak: Akun Anda belum memiliki izin untuk mengakses modul ini. Silakan hubungi Super Administrator.');
            }

            return redirect()->to($targetRoute)->with('error', 'Akses ditolak: Akun Anda tidak memiliki izin untuk mengakses menu tersebut.');
        }

        return $next($request);
    }
}
