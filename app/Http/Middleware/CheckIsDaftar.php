<?php

namespace App\Http\Middleware;

use App\Models\Pengajuan;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class CheckIsDaftar
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        $pengajuan = Pengajuan::whereHas('jadwal', function ($query) {
                        $query->where('is_aktif','Y');
                    })
                    ->whereHas('mahasiswa', function ($query) {
                        $query->where('mahasiswa_id',Auth::guard('mahasiswa')->user()->id);
                    })->first();

        if($pengajuan) {
            return redirect('/dashboard');
        }

        return $next($request);
    }
}
