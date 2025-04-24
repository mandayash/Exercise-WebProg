<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Auth
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next)
    {
        // Periksa apakah user telah login
        $user = $request->session()->get('user');

        if (!isset($user['is_login']) || !$user['is_login']) {
            // Jika belum login, redirect ke halaman login
            return redirect('/signin')->with('error', 'Anda harus login terlebih dahulu.');
        }

        // Jika sudah login, lanjutkan ke request berikutnya
        return $next($request);
    }
}
