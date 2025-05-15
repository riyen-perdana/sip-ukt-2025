<?php

namespace App\Livewire\Pendaftar;

use Livewire\Component;
use App\Models\Verifikasi;
use App\Models\Pengajuan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\On;
use Livewire\Attributes\Validate;

class PendaftarModal extends Component
{
    public $id_pengajuan = '';

    public $surat_permohonan;
    public $kartu_keluarga;
    public $ktp_ortu;
    public $gaji_ortu;
    public $rekening_listrik;
    public $skk_ortu;
    public $ft_ruangtamu;
    public $ft_kmrtidur;
    public $ft_ruangklrg;
    public $ft_dapur;
    public $ft_dpnrumah;
    public $sk_tdkbs;
    public $spkd;

    #[Validate('required', message:'Kolom Persetujuan Pengajuan Wajib Diisi')]
    public $is_setuju = '';

    public $mahasiswa = '';

    #[Validate('required',message:'Kolom Catatan Persetujuan Wajib Diisi')]
    public $komentar = '';

    public $tombol = 'Verifikasi';

    public function render()
    {
        return view('livewire.pendaftar.pendaftar-modal');
    }

    public function resetForm()
    {
        $this->updateStatusPengajuan();
        $this->dispatch('close-modal', 'pendaftar-modal');
        $this->reset('id_pengajuan','is_setuju','komentar');
        $this->resetErrorBag();
        $this->resetValidation();
    }

    public function resetFormData()
    {
        $this->dispatch('close-modal', 'pendaftar-modal');
        $this->reset('id_pengajuan','is_setuju','komentar');
        $this->resetErrorBag();
        $this->resetValidation();
    }

    #[On('setVerifikasi')]
    public function setVerifikasi($data)
    {
        $this->id_pengajuan = $data['pengajuan'][0]['id'];
        $this->surat_permohonan = $data['pengajuan'][0]['surper_mhs'];
        $this->kartu_keluarga = $data['pengajuan'][0]['kk_mhs'];
        $this->ktp_ortu = $data['pengajuan'][0]['ktp_ortu_mhs'];
        $this->gaji_ortu = $data['pengajuan'][0]['gjortu_mhs'];
        $this->rekening_listrik = $data['pengajuan'][0]['rknlstrk_mhs'];
        $this->skk_ortu = $data['pengajuan'][0]['surkk_mhs'];
        $this->ft_ruangtamu = $data['pengajuan'][0]['ft_ruangtamu'];
        $this->ft_kmrtidur = $data['pengajuan'][0]['ft_kamartdr'];
        $this->ft_ruangklrg = $data['pengajuan'][0]['ft_ruangklrg'];
        $this->ft_dapur = $data['pengajuan'][0]['ft_dapur'];
        $this->ft_dpnrumah = $data['pengajuan'][0]['ft_dapur'];
        $this->sk_tdkbs = $data['pengajuan'][0]['sk_tdkbs'];
        $this->spkd = $data['pengajuan'][0]['spkd'];

        $this->mahasiswa = $data['nama'];
        $this->dispatch('open-modal', 'pendaftar-modal');
    }

    #[On('showModal')]
    public function showModal($view)
    {
        $this->dispatch('showModalView',$view)->to(PendaftarModalView::class);
    }

    public function updateStatusPengajuan()
    {
        DB::connection();
        try {
            $pengajuan = Pengajuan::findOrFail($this->id_pengajuan);
            $pengajuan->update([
                'status' => 'ajk'
            ]);
            DB::commit();
        } catch (\Throwable $th) {
            Db::rollBack();
        }
    }

    public function save()
    {
        $this->validate();

        DB::beginTransaction();

        try {

            Verifikasi::create([
                'pengajuan_id'      => $this->id_pengajuan,
                'user_id'           => Auth::user()->id,
                'is_setuju'         => $this->is_setuju,
                'komentar'          => $this->komentar
            ]);

            $pengajuan = Pengajuan::findOrFail($this->id_pengajuan);
            $pengajuan->update([
                'status' => 'vrf'
            ]);

            DB::commit();
            $this->dispatch('sweet-alert', icon: 'success', title: 'Verifikasi Data Mahasiswa Berhasil');
            $this->resetFormData();
            $this->dispatch('renderTable')->to(PendaftarIndex::class);

        } catch (\Throwable $th) {
            DB::rollBack();
            $this->dispatch('sweet-alert', icon: 'danger', title: 'Verifikasi Data Mahasiswa Berhasil');
        }
    }
}
