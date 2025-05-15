<?php

namespace App\Livewire\Jadwal;

use Livewire\Component;
use App\Models\Jadwal;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\On;

class JadwalModal extends Component
{

    public ?Jadwal $jadwal;

    public $headModal = 'Tambah';
    public $tombol  = 'Simpan';
    public $tahun = '';
    public $daftar_buka = '';
    public $daftar_tutup = '';
    public $isAktif = '';

    public function mount(Jadwal $jadwal)
    {
        $this->jadwal = $jadwal;
    }

    public function render()
    {
        return view('livewire.jadwal.jadwal-modal');
    }

    public function save()
    {
        if($this->jadwal->id) {
            $validated = Validator::make([
                'tahun'        => $this->tahun,
                'daftar_buka'  => $this->daftar_buka,
                'daftar_tutup' => $this->daftar_tutup,
                'is_aktif'     => $this->isAktif
            ],[
                'tahun'        => 'required|unique:jadwal,tahun,' . $this->jadwal->id,
                'daftar_buka'  => 'required',
                'daftar_tutup' => 'required|after_or_equal:daftar_buka',
                'is_aktif'     => 'required'
            ],[
                'tahun.required'                => 'Kolom Tahun Wajib Dipilih',
                'tahun.unique'                  => 'Kolom Tahun Sudah Ada, Pilih Yang Lain',
                'daftar_buka.required'          => 'Kolom Tanggal Mulai Daftar Wajib Diisi',
                'daftar_tutup.required'         => 'Kolom Tanggal Akhir Daftar Wajib Diisi',
                'daftar_tutup.after_or_equal'   => 'Kolom Tanggal Akhir Daftar Salah',
                'is_aktif.required'             => 'Kolom Status Aktif Wajib Dipilih'
            ]);

            if($validated) {

                DB::beginTransaction();

                try {

                    $jadwal = Jadwal::findOrFail($this->jadwal->id);
                    $jadwal->update([
                        'tahun'         => $this->tahun,
                        'daftar_buka'   => $this->daftar_buka,
                        'daftar_tutup'  => $this->daftar_tutup,
                        'is_aktif'      => $this->isAktif
                    ]);

                    DB::commit();
                    $this->dispatch('sweet-alert', icon: 'success', title: 'Data Jadwal Berhasil Diubah');
                    $this->dispatch('renderTable')->to(JadwalTable::class);
                    $this->resetForm();

                } catch (\Throwable $th) {
                    DB::rollBack();
                    $this->dispatch('sweet-alert', icon: 'danger', title: 'Data Jadwal Gagal Diubah');
                    $this->resetForm();
                }
            }

        } else {

            $validated = Validator::make([
                'tahun'        => $this->tahun,
                'daftar_buka'  => $this->daftar_buka,
                'daftar_tutup' => $this->daftar_tutup,
                'is_aktif'     => $this->isAktif
            ],[
                'tahun'        => 'required|unique:jadwal,tahun',
                'daftar_buka'  => 'required',
                'daftar_tutup' => 'required|after_or_equal:daftar_buka',
                'is_aktif'     => 'required'
            ],[
                'tahun.required'                => 'Kolom Tahun Wajib Dipilih',
                'tahun.unique'                  => 'Kolom Tahun Sudah Ada, Pilih Yang Lain',
                'daftar_buka.required'          => 'Kolom Tanggal Mulai Daftar Wajib Diisi',
                'daftar_tutup.required'         => 'Kolom Tanggal Akhir Daftar Wajib Diisi',
                'daftar_tutup.after_or_equal'   => 'Kolom Tanggal Akhir Daftar Salah',
                'is_aktif.required'             => 'Kolom Status Aktif Wajib Dipilih'
            ]);

            if($validated) {

                DB::beginTransaction();

                try {
                    Jadwal::create([
                        'tahun'         => $this->tahun,
                        'daftar_buka'   => $this->daftar_buka,
                        'daftar_tutup'  => $this->daftar_tutup,
                        'is_aktif'      => $this->isAktif
                    ]);

                    DB::commit();
                    $this->dispatch('sweet-alert', icon: 'success', title: 'Data Jadwal Berhasil Ditambah');
                    $this->dispatch('renderTable')->to(JadwalTable::class);
                    $this->resetForm();

                } catch (\Throwable $th) {
                    DB::rollBack();
                    $this->dispatch('sweet-alert', icon: 'success', title: 'Data Jadwal Gagal Ditambah');
                    $this->resetForm();
                }
            }
        }
    }

    public function resetForm()
    {
        $this->dispatch('close-modal', 'jadwal-modal');
        $this->reset();
        $this->resetErrorBag();
        $this->resetValidation();
    }

    #[On('setJadwal')]
    public function setJadwal(Jadwal $jadwal)
    {
        $this->jadwal       = $jadwal;
        $this->tahun        = $jadwal->tahun;
        $this->daftar_buka  = $jadwal->daftar_buka;
        $this->daftar_tutup = $jadwal->daftar_tutup;
        $this->isAktif      = $jadwal->is_aktif;
        $this->headModal    = 'Edit';
        $this->tombol       = 'Ubah';
        $this->dispatch('open-modal', 'jadwal-modal');
    }
}
