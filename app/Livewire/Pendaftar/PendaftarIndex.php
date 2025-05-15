<?php

namespace App\Livewire\Pendaftar;

use Livewire\Attributes\On;
use Livewire\Component;

class PendaftarIndex extends Component
{
    #[On('renderTable')]
    public function render()
    {
        return view('livewire.pendaftar.index');
    }
}
