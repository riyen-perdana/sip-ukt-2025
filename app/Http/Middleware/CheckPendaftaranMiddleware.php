<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Jadwal;

class CheckPendaftaranMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        $jadwal = Jadwal::where('is_aktif','Y')->first();
        $tanggal = date('Y-m-d');

        if ($jadwal->daftar_buka <= $tanggal && $jadwal->daftar_tutup >= $tanggal) {
            return $next($request);
        } else {
            return redirect('/dashboard');
        }
    }
}
