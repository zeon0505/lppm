<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminNoCache
{
    public function handle(Request $request, Closure $next): Response
    {
        // Kalau belum login, redirect ke halaman login
        if (!Auth::check()) {
            return redirect()->route('admin.login')
                ->with('error', 'Sesi Anda telah berakhir. Silakan login kembali.');
        }

        /** @var Response $response */
        $response = $next($request);

        // Paksa browser TIDAK menyimpan cache halaman admin
        // Tombol back browser akan selalu hit server, bukan cache
        return $response
            ->header('Cache-Control', 'no-store, no-cache, must-revalidate, max-age=0, private')
            ->header('Pragma', 'no-cache')
            ->header('Expires', '0');
    }
}
