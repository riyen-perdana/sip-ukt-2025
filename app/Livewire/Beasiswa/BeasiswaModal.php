<?php

namespace App\Livewire\Beasiswa;

use Livewire\Component;
use App\Models\Beasiswa;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\On;
use Illuminate\Support\Facades\Validator;

class BeasiswaModal extends Component
{

    public $beasiswa ='';

    public $nim     = '';
    public $name    = '';
    public $isAktif = '';

    public function __construct()
    {
        $this->beasiswa = new Beasiswa();
    }

    public function mount(Beasiswa $beasiswa)
    {
        $this->beasiswa = $beasiswa;
    }

    public function render()
    {
        return view('livewire.beasiswa.beasiswa-modal');
    }

    #[On('setBeasiswa')]
    public function setBeasiswa(Beasiswa $beasiswa)
    {
        $this->beasiswa     = $beasiswa;
        $this->nim          = $beasiswa->nim;
        $this->name         = $beasiswa->name;
        $this->isAktif      = $beasiswa->is_aktif;
        $this->dispatch('open-modal', 'beasiswa-modal');
    }

    public function resetForm()
    {
        $this->dispatch('close-modal', 'beasiswa-modal');
        $this->reset();
        $this->resetErrorBag();
        $this->resetValidation();
    }

    public function save()
    {
        $validated = Validator::make([
            'nim'           => $this->name,
            'name'          => $this->abbr,
            'is_aktif'      => $this->isAktif
        ],[
            'nim'           => 'required|unique:beasiswa,nim' . $this->beasiswa->id,
            'name'          => 'required',
            'is_aktif'      => 'required'
        ],[
            'nim.required'      => 'Kolom Nomor Induk Mahasiswa Wajib Diisi',
            'nim.unqiue'        => 'Kolom Nomor Induk Mahasiswa Sudah Ada',
            'name.required'     => 'Kolom Nama Wajib Diisi',
            'is_aktif.required' => 'Kolom Status Aktif Wajib Dipilih'
        ]);

        if($validated) {

            DB::beginTransaction();
            try {
                $beasiswa = Beasiswa::findOrFail($this->beasiswa->id);
                $beasiswa->update([
                    'nim'       => $this->nim,
                    'name'      => $this->name,
                    'is_aktif'  => $this->isAktif
                ]);

                DB::commit();
                $this->dispatch('sweet-alert', icon: 'success', title: 'Data Penerima Beasiswa Berhasil Diubah');
                $this->dispatch('renderTable')->to(BeasiswaTable::class);
                $this->resetForm();

            } catch (\Throwable $th) {
                DB::rollBack();
                $this->dispatch('sweet-alert', icon: 'danger', title: 'Data Penerima Beasiswa Gagal Diubah');
            }
        }

    }


}
