<?php

namespace App\Livewire\Pendaftar;

use Livewire\Component;
use App\Models\Mahasiswa;
use App\Models\Pengajuan;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\On;
use Livewire\WithPagination;
use Livewire\WithoutUrlPagination;
use Livewire\Attributes\Url;
use Illuminate\Support\Facades\Auth;

class PendaftarTable extends Component
{
    use WithPagination, WithoutUrlPagination;

    #[Url()]
    public $search = '';

    #[Url()]
    public $pages = 10;

    public function render()
    {
        if((Auth::user()->akses == 'adm' || Auth::user()->akses == 'keu') && Auth::user()->is_aktif == 'Y') {
            $data = Mahasiswa::with('prodi','prodi.fakultas','pengajuan','pengajuan.jadwal')
                    ->whereHas('pengajuan.jadwal', function ($query) {
                        $query->where('is_aktif','Y');
                    })
                    ->where('nim','like','%'.$this->search.'%')
                    ->orWhere('nama','like','%'.$this->search.'%')
                    ->paginate($this->pages);
        } else {
            $data = Mahasiswa::with('prodi','prodi.fakultas','pengajuan','pengajuan.jadwal','pengajuan.verifikasi.user')
                    ->whereHas('prodi.fakultas', function ($query) {
                        $query->where('fakultas_id','=',Auth::user()->fakultas_id);
                    })
                    ->whereHas('pengajuan.jadwal', function ($query) {
                        $query->where('is_aktif','Y');
                    })
                    ->where('nim','like','%'.$this->search.'%')
                    ->orWhere('nama','like','%'.$this->search.'%')
                    ->paginate($this->pages);
        }
        return view('livewire.pendaftar.pendaftar-table', [
            'data' => $data
        ]);
    }

    #[On('verifikasi')]
    public function verifikasi($data) {

        //Update Status
        DB::connection();
        try {
            $pengajuan = Pengajuan::findOrFail($data['pengajuan'][0]['id']);
            $pengajuan->update([
                'status' => 'prs'
            ]);
            DB::commit();

            $this->dispatch('setVerifikasi',$data)->to(PendaftarModal::class);

        } catch (\Throwable $th) {
            DB::rollBack();
        }
    }

    // public function updatedSearch(){
    //     $this->resetPage();
    // }
}
