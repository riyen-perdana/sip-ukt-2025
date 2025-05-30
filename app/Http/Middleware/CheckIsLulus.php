<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use App\Models\Mahasiswa;

class CheckIsLulus
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $mahasiswa = Mahasiswa::whereHas('pengajuan')
                    ->whereHas('pengajuan.verifikasi', function ($query) {
                        $query->where('is_setuju', 'Y');
                    })
                    ->where('id', Auth::guard('mahasiswa')->user()->id)->first();
        

        if ($mahasiswa) 
        {
            return redirect('/dashboard');
        }

        return $next($request);
    }
}
