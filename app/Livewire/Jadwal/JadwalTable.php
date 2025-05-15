<?php

namespace App\Livewire\Jadwal;

use Livewire\Component;
use App\Models\Jadwal;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\On;
use Livewire\WithPagination;
use Livewire\WithoutUrlPagination;
use Livewire\Attributes\Url;


class JadwalTable extends Component
{

    use WithPagination, WithoutUrlPagination;

    #[Url()]
    public $search = '';

    #[Url()]
    public $pages = 10;

    #[On('renderTable')]
    public function render()
    {
        return view('livewire.jadwal.jadwal-table', [
            'data' => Jadwal::where('tahun','like','%'.$this->search.'%')
            ->paginate($this->pages)
        ]);
    }

    public function updatedSearch(){
        $this->resetPage();
    }

    public function delete($id)
    {
        DB::beginTransaction();
        try {
            Jadwal::destroy($id);
            DB::commit();
            $this->dispatch('sweet-alert', icon:'success', title:'Data Jadwal Berhasil Dihapus');
        } catch (\Throwable $th) {
            DB::rollBack();
            $this->dispatch('sweet-alert', icon:'danger', title:'Data Jadwal Gagal Dihapus');
        }
    }

    #[On('getJadwal')]
    public function getJadwal($data)
    {
        $this->dispatch('setJadwal',$data)->to(JadwalModal::class);
    }

}
