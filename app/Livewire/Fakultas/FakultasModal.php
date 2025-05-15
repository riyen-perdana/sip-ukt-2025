<?php

namespace App\Livewire\Fakultas;

use Livewire\Component;
use App\Models\Fakultas;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\On;
use Illuminate\Support\Facades\Validator;

class FakultasModal extends Component
{

    public ?Fakultas $fakultas;

    public $headModal = 'Tambah';
    public $tombol  = 'Simpan';

    public $name = '';

    public $abbr = '';

    public $isAktif = '';

    public function __construct()
    {
        $this->fakultas = new Fakultas();
    }

    public function mount(Fakultas $fakultas)
    {
        $this->fakultas = $fakultas;
    }

    public function render()
    {
        return view('livewire.fakultas.fakultas-modal');
    }

    public function save()
    {
        if($this->fakultas->id) {
            $validated = Validator::make([
                'name'        => $this->name,
                'abbr'        => $this->abbr,
                'is_aktif'    => $this->isAktif
            ],[
                'name'         => 'required',
                'abbr'         => 'required|unique:fakultas,abbr,' . $this->fakultas->id,
                'is_aktif'     => 'required'
            ],[
                'name.required'                => 'Kolom Nama Fakultas Wajib Diisi',
                'abbr.required'                => 'Kolom Singkatan Wajib Diisi',
                'abbr.unique'                  => 'Kolom Singkatan Sudah Ada, Isikan Yang Lain',
                'is_aktif.required'            => 'Kolom Status Aktif Wajib Dipilih'
            ]);

            if($validated) {

                DB::beginTransaction();
                try {
                    $fakultas = Fakultas::findOrFail($this->fakultas->id);
                    $fakultas->update([
                        'name'      => $this->name,
                        'abbr'      => $this->abbr,
                        'is_aktif'  => $this->isAktif
                    ]);

                    DB::commit();
                    $this->dispatch('sweet-alert', icon: 'success', title: 'Data Fakultas Berhasil Diubah');
                    $this->dispatch('renderTable')->to(FakultasTable::class);
                    $this->resetForm();

                } catch (\Throwable $th) {
                    DB::rollBack();
                    $this->dispatch('sweet-alert', icon: 'danger', title: 'Data Fakultas Gagal Diubah');
                }
            }
        } else {
            $validated = Validator::make([
                'name'        => $this->name,
                'abbr'        => $this->abbr,
                'is_aktif'    => $this->isAktif
            ],[
                'name'         => 'required',
                'abbr'         => 'required|unique:fakultas,abbr',
                'is_aktif'     => 'required'
            ],[
                'name.required'                => 'Kolom Nama Fakultas Wajib Diisi',
                'abbr.required'                => 'Kolom Singkatan Wajib Diisi',
                'abbr.unique'                  => 'Kolom Singkatan Sudah Ada, Isikan Yang Lain',
                'is_aktif.required'            => 'Kolom Status Aktif Wajib Dipilih'
            ]);

            if($validated) {

                DB::beginTransaction();
                try {
                    Fakultas::create([
                        'name'      => $this->name,
                        'abbr'      => $this->abbr,
                        'is_aktif'  => $this->isAktif
                    ]);

                    DB::commit();
                    $this->dispatch('sweet-alert', icon: 'success', title: 'Data Fakultas Berhasil Ditambah');
                    $this->dispatch('renderTable')->to(FakultasTable::class);
                    $this->resetForm();

                } catch (\Throwable $th) {
                    DB::rollBack();
                    $this->dispatch('sweet-alert', icon: 'danger', title: 'Data Fakultas Gagal Ditambah');
                }
            }
        }
    }

    public function resetForm()
    {
        $this->dispatch('close-modal', 'fakultas-modal');
        $this->reset();
        $this->resetErrorBag();
        $this->resetValidation();
    }

    #[On('setFakultas')]
    public function setFakultas(Fakultas $fakultas)
    {
        $this->fakultas     = $fakultas;
        $this->name         = $fakultas->name;
        $this->abbr         = $fakultas->abbr;
        $this->isAktif      = $fakultas->is_aktif;
        $this->headModal    = 'Edit';
        $this->tombol       = 'Ubah';
        $this->dispatch('open-modal', 'fakultas-modal');
    }
}
