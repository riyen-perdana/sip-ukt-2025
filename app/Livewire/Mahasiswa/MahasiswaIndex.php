<?php

namespace App\Livewire\Mahasiswa;

use Livewire\Component;
use App\Models\Mahasiswa;
use Illuminate\Support\Facades\Auth;
use App\Models\Jadwal;
use App\Models\Pengajuan;

use function Laravel\Prompts\table;

class MahasiswaIndex extends Component
{
    public function render()
    {
        // $data = Jadwal::with(['pengajuan' => function($query) {
        //     $query->where('mahasiswa_id', Auth::guard('mahasiswa')->user()->id);
        // }])
        // ->with('pengajuan.verifikasi')
        // ->where('is_aktif', 'Y')
        // ->get();

        $data = Mahasiswa::with([
                    'pengajuan' => function($query) {
                        $query->orderBy('created_at', 'asc');
                    },
                    'pengajuan.verifikasi',
                    'pengajuan.jadwal' => function($query) {
                        $query->where('is_aktif', 'Y');
                    }
                ])
                ->where('id', Auth::guard('mahasiswa')->user()->id)
                ->first();
                
        $jadwal = Jadwal::where('is_aktif', 'Y')->get();

        return view('livewire.mahasiswa.index',[
            'data' => $data,
            'ajk' => false,
            'jadwal' => $jadwal,
        ]);
    }
}
