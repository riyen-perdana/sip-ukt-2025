<?php

namespace App\Livewire\Beasiswa;

use Livewire\Component;
use App\Models\Beasiswa;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\On;
use Livewire\WithPagination;
use Livewire\WithoutUrlPagination;
use Livewire\Attributes\Url;

class BeasiswaTable extends Component
{

    use WithPagination, WithoutUrlPagination;

    #[Url()]
    public $search = '';

    #[Url()]
    public $pages = 10;

    #[On('renderTable')]
    public function render()
    {
        return view('livewire.beasiswa.beasiswa-table', [
            'data' => Beasiswa::where('nim','like','%'.$this->search.'%')
                      ->orWhere('name','like','%'.$this->search.'%')
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
            Beasiswa::destroy($id);
            DB::commit();
            $this->dispatch('sweet-alert', icon:'success', title:'Data Penerima Beasiswa Dihapus');
        } catch (\Throwable $th) {
            DB::rollBack();
            $this->dispatch('sweet-alert', icon:'danger', title:'Data Penerima Beasiswa Gagal Dihapus');
        }
    }

    #[On('getBeasiswa')]
    public function getBeasiswa($data)
    {
        $this->dispatch('setBeasiswa',$data)->to(BeasiswaModal::class);
    }
}
