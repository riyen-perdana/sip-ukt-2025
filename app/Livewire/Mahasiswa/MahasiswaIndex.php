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
        // $data = Jadwal::whereHas('pengajuan', function ($query) {
        //             $query->whereHas('mahasiswa', function ($query) {
        //                 $query->where('mahasiswa_id',Auth::guard('mahasiswa')->user()->id);
        //             });
        //         })
        //         ->get();

        // $jadwal = Jadwal::where('is_aktif','Y')->get();
        // $data = Mahasiswa::with('pengajuan')
        //         ->whereHas()
        //         ->where('id',Auth::guard('mahasiswa')->user()->id)->get();

        //$jadwal = Jadwal::where('is_aktif','Y')->get();
        // $data = Jadwal::
        //         whereHas('pengajuan', function ($query) {
        //             $query->whereHas('mahasiswa', function ($query) {
        //                 $query->where('id',Auth::guard('mahasiswa')->user()->id);
        //             });
        //         })
        //         ->where('is_aktif','Y')
        //         ->get();
        $jadwal = Jadwal::where('is_aktif','Y')->first();
        $data = Pengajuan::with('mahasiswa')
                ->where('mahasiswa_id',Auth::guard('mahasiswa')->user()->id)
                ->where('jadwal_id',$jadwal->id)
                ->get();

        return view('livewire.mahasiswa.index',[
            'data' => $data,
            'ajk' => false
        ]);
    }
}
