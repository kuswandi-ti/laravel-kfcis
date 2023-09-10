<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!Auth::check()) {
            return redirect()->route('admin.login')->with('error', 'Anda tidak bisa mengakses halaman yang dituju. Silahkan login terlebih dahulu');
        } else {
            if (!Auth::user()->email_verified_at) {
                Auth::logout();
                return redirect()->route('admin.login')
                    ->with('error', 'Anda perlu mengonfirmasi akun Anda. Kami telah mengirimkan Anda kode aktivasi, silakan periksa email Anda');
            }
        }

        return $next($request);
    }
}
