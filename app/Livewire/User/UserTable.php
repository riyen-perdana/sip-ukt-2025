<?php

namespace App\Livewire\User;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\On;
use Livewire\WithPagination;
use Livewire\WithoutUrlPagination;
use Livewire\Attributes\Url;

class UserTable extends Component
{

    use WithPagination, WithoutUrlPagination;

    #[Url()]
    public $search = '';

    #[Url()]
    public $pages = 10;


    #[On('renderTable')]
    public function render()
    {
        return view('livewire.user.user-table', [
            'data' => User::with('fakultas')->where('name','like','%'.$this->search.'%')
                      ->orWhere('nip','like','%'.$this->search.'%')
                      ->orWhere('email','like','%'.$this->search.'%')
                      ->paginate($this->pages)
        ]);
    }


    public function delete($id)
    {
        DB::beginTransaction();
        try {
            User::destroy($id);
            DB::commit();
            $this->dispatch('sweet-alert', icon:'success', title:'Data Pengguna Berhasil Dihapus');
        } catch (\Throwable $th) {
            DB::rollBack();
            $this->dispatch('sweet-alert', icon:'danger', title:'Data Pengguna Gagal Dihapus');
        }
    }

    #[On('getUser')]
    public function getUser($data)
    {
        $this->dispatch('setUser',$data)->to(UserModal::class);
    }

}
