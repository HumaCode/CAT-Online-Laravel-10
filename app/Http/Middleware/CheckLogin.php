<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!Auth::check()) {
            // Jika pengguna belum login, tampilkan SweetAlert
            return response()->view('auth.login', [
                'alert'         => true,
                'alertMessage'  => 'Kamu harus login dulu!'
            ]);
        }

        return $next($request);
    }
}
