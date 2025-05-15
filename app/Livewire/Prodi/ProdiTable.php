<?php

namespace App\Livewire\Prodi;

use Livewire\Component;
use App\Models\Prodi;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\On;
use Livewire\WithPagination;
use Livewire\WithoutUrlPagination;
use Livewire\Attributes\Url;

class ProdiTable extends Component
{

    use WithPagination, WithoutUrlPagination;

    #[Url()]
    public $search = '';

    #[Url()]
    public $pages = 10;

    #[On('renderTable')]
    public function render()
    {
        DB::enableQueryLog();
        return view('livewire.prodi.prodi-table', [
            'data' => Prodi::with('fakultas')
                      ->whereHas('fakultas', function ($query) {
                        $query->where('name','like','%'.$this->search.'%');
                      })
                      ->orWhere('name_prodi','like','%'.$this->search.'%')
                      ->orWhere('abbr_prodi','like','%'.$this->search.'%')
                      ->paginate($this->pages)
        ]);
    }

    public function updatedSearch(){
        $this->resetPage();
    }

    #[On('getProdi')]
    public function getProdi($data)
    {
        $this->dispatch('setProdi',$data)->to(ProdiModal::class);
    }

    public function delete($id)
    {
        DB::beginTransaction();
        try {
            Prodi::destroy($id);
            DB::commit();
            $this->dispatch('sweet-alert', icon:'success', title:'Data Program Studi Berhasil Dihapus');
        } catch (\Throwable $th) {
            DB::rollBack();
            $this->dispatch('sweet-alert', icon:'danger', title:'Data Program Studi Gagal Dihapus');
        }
    }
}
