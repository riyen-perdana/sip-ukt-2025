<?php

namespace App\Livewire\Dashboard;

use App\Models\Beasiswa;
use App\Models\Fakultas;
use App\Models\Pengajuan;
use App\Models\Prodi;
use Livewire\Component;
use App\Models\User;


class DashboardIndex extends Component
{
    public function render()
    {
        $user = User::count();
        $bs   = Beasiswa::where('is_aktif','Y')->count();
        $fkt  = Fakultas::where('is_aktif','Y')->count();
        $prd  = Prodi::where('is_aktif','Y')->count();
        $dftr = Pengajuan::whereHas('jadwal', function ($query) {
                    $query->where('is_aktif','=','Y');
                })->count();

        return view('livewire.dashboard.index',[
            'user' => $user,
            'bs'   => $bs,
            'fkt'  => $fkt,
            'prd'  => $prd,
            'dftr' => $dftr
        ]);
    }
}
