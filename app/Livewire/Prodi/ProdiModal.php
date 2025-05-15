<?php

namespace App\Livewire\Prodi;

use App\Models\Fakultas;
use Livewire\Component;
use App\Models\Prodi;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rules\Unique;
use Livewire\Attributes\On;

class ProdiModal extends Component
{

    public $fakultas;

    public ?Prodi $prodi;

    public $headModal = 'Tambah';
    public $tombol  = 'Simpan';

    public $name_prodi = '';
    public $abbr_prodi = '';
    public $isAktif = '';
    public $fakultas_id = '';

    public function mount()
    {
        $this->fakultas = Fakultas::all();
        $this->prodi = new Prodi;
    }

    public function render()
    {
        return view('livewire.prodi.prodi-modal');
    }

    public function save()
    {
        if ($this->prodi->id) {
            $validated = Validator::make([
                'name_prodi'    => $this->name_prodi,
                'abbr_prodi'    => $this->abbr_prodi,
                'fakultas_id'   => $this->fakultas_id,
                'is_aktif'      => $this->isAktif
            ], [
                'name_prodi'    => 'required',
                'abbr_prodi'    => 'required|unique:prodi,abbr_prodi,' . $this->prodi->id,
                'fakultas_id'   => 'required',
                'is_aktif'      => 'required',
            ], [
                'name_prodi.required'   => 'Kolom Nama Prodi Wajib Diisi',
                'abbr_prodi.required'   => 'Kolom Singkatan Prodi Wajib Diisi',
                'abbr_prodi.unique'     => 'Kolom Singkatan Prodi Sudah Ada, Isikan Yang Lain',
                'fakultas_id.required'  => 'Kolom Fakultas Wajib Diisi',
                'is_aktif.required'     => 'Kolom Status Aktif Wajib Diisi'
            ]);

            if ($validated) {

                DB::beginTransaction();
                try {
                    $prodi = Prodi::findOrFail($this->prodi->id);
                    $prodi->update([
                        'fakultas_id' => $this->fakultas_id,
                        'name_prodi'  => $this->name_prodi,
                        'abbr_prodi'  => $this->abbr_prodi,
                        'is_aktif'    => $this->isAktif
                    ]);

                    DB::commit();
                    $this->dispatch('sweet-alert', icon: 'success', title: 'Data Program Studi Sukses Diubah');
                    $this->dispatch('renderTable')->to(ProdiTable::class);
                    $this->resetForm();
                } catch (\Throwable $th) {
                    DB::rollBack();
                    $this->dispatch('sweet-alert', icon: 'danger', title: 'Data Program Studi Gagal Diubah');
                    $this->resetForm();
                }
            }
        } else {
            $validated = Validator::make([
                'name_prodi'    => $this->name_prodi,
                'abbr_prodi'    => $this->abbr_prodi,
                'fakultas_id'   => $this->fakultas_id,
                'is_aktif'      => $this->isAktif
            ], [
                'name_prodi'    => 'required',
                'abbr_prodi'    => 'required|unique:prodi,abbr_prodi',
                'fakultas_id'   => 'required',
                'is_aktif'      => 'required',
            ], [
                'name_prodi.required'   => 'Kolom Nama Prodi Wajib Diisi',
                'abbr_prodi.required'   => 'Kolom Singkatan Prodi Wajib Diisi',
                'abbr_prodi.unique'     => 'Kolom Singkatan Prodi Sudah Ada, Isikan Yang Lain',
                'fakultas_id.required'  => 'Kolom Fakultas Wajib Diisi',
                'is_aktif.required'     => 'Kolom Status Aktif Wajib Diisi'
            ]);

            if ($validated) {

                DB::beginTransaction();
                try {

                    Prodi::create([
                        'fakultas_id' => $this->fakultas_id,
                        'name_prodi'  => $this->name_prodi,
                        'abbr_prodi'  => $this->abbr_prodi,
                        'is_aktif'    => $this->isAktif
                    ]);

                    DB::commit();
                    $this->dispatch('sweet-alert', icon: 'success', title: 'Data Program Studi Sukses Ditambah');
                    $this->dispatch('renderTable')->to(ProdiTable::class);
                    $this->resetForm();
                } catch (\Throwable $th) {
                    DB::rollBack();
                    $this->dispatch('sweet-alert', icon: 'danger', title: 'Data Program Studi Gagal Ditambah');
                    $this->resetForm();
                }
            }
        }
    }

    public function resetForm()
    {
        $this->dispatch('close-modal', 'prodi-modal');
        $this->reset('isAktif', 'name_prodi', 'abbr_prodi', 'fakultas_id');
        $this->resetErrorBag();
        $this->resetValidation();
    }

    #[On('setProdi')]
    public function setProdi(Prodi $prodi)
    {
        $this->prodi        = $prodi;
        $this->name_prodi   = $prodi->name_prodi;
        $this->abbr_prodi   = $prodi->abbr_prodi;
        $this->isAktif      = $prodi->is_aktif;
        $this->fakultas_id  = $prodi->fakultas_id;
        $this->headModal    = 'Edit';
        $this->tombol       = 'Ubah';
        $this->dispatch('open-modal', 'prodi-modal');
    }

}
