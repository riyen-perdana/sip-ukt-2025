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
        $data = Jadwal::with([
            'pengajuan' => function($query) {
                $query->where('mahasiswa_id', Auth::guard('mahasiswa')->user()->id)->orderBy('created_at', 'asc');
            },
            'pengajuan.verifikasi',
            'pengajuan.mahasiswa' => function($query) {
                $query->where('id', Auth::guard('mahasiswa')->user()->id);
            }
        ])->orderBy('tahun', 'asc')->get();

        return view('livewire.mahasiswa.index',[
            'data' => $data,
            'ajk' => false,
        ]);
    }
}
