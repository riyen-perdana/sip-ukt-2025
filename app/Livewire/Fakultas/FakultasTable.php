<?php

namespace App\Livewire\Fakultas;

use Livewire\Component;
use App\Models\Fakultas;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\On;
use Livewire\WithPagination;
use Livewire\WithoutUrlPagination;
use Livewire\Attributes\Url;

class FakultasTable extends Component
{
    use WithPagination, WithoutUrlPagination;

    #[Url()]
    public $search = '';

    #[Url()]
    public $pages = 10;

    public function render()
    {
        return view('livewire.fakultas.fakultas-table', [
            'data' => Fakultas::where('name','like','%'.$this->search.'%')
                      ->orWhere('abbr','like','%'.$this->search.'%')
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
            Fakultas::destroy($id);
            DB::commit();
            $this->dispatch('sweet-alert', icon:'success', title:'Data Fakultas Berhasil Dihapus');
        } catch (\Throwable $th) {
            DB::rollBack();
            $this->dispatch('sweet-alert', icon:'danger', title:'Data Fakultas Gagal Dihapus');
        }
    }

    #[On('getFakultas')]
    public function getFakultas($data)
    {
        $this->dispatch('setFakultas',$data)->to(FakultasModal::class);
    }


}
