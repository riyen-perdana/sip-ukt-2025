<?php

namespace App\Livewire\Pendaftar;

use Livewire\Attributes\On;
use Livewire\Component;

class PendaftarModalView extends Component
{

    public $view;

    public function render()
    {
        return view('livewire.pendaftar.pendaftar-modal-view');
    }

    #[On('showModalView')]
    public function showModalView($view)
    {
        $this->view = $view;
        $this->dispatch('open-modal', 'pendaftar-modal-view');
    }

    public function resetForm()
    {
        $this->reset('view');
        $this->dispatch('close-modal', 'pendaftar-modal-view');
    }
}
