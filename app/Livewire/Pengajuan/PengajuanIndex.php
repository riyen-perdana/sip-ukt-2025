<?php

namespace App\Livewire\Pengajuan;

use App\Models\Jadwal;
use Livewire\Attributes\On;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Pengajuan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PengajuanIndex extends Component
{

    use WithFileUploads;

    #[Validate('required',message:'Kolom Nomor Whatapps Mahasiswa Harus Diisi')]
    #[Validate('regex:/^(08)(\d{3,4}-?){2}\d{3,4}$/',message:'Format Kolom Nomor Whatapps Mahasiswa Salah')]
    public $no_wa_mhs = '';

    #[Validate('required',message:'Kolom Nomor Whatapps Orang Tua/Wali Mahasiswa Harus Diisi')]
    #[Validate('regex:/^(08)(\d{3,4}-?){2}\d{3,4}$/',message:'Format Nomor Whatapps Orang Tua/Wali Mahasiswa Salah')]
    public $no_wa_ortu = '';

    #[Validate('required',message:'Bagian Ini Harus Diisi')]
    #[Validate('mimes:pdf',message:'Format Data Yang Anda Upload Tidak Sesuai')]
    #[Validate('max:500',message:'Ukuran Berkas Harus Kecil atau Sama Dengan 500Kb')]
    public $surper_mhs = null;

    #[Validate('required',message:'Bagian Ini Harus Diisi')]
    #[Validate('mimes:pdf',message:'Format Data Yang Anda Upload Tidak Sesuai')]
    #[Validate('max:500',message:'Ukuran Berkas Harus Kecil atau Sama Dengan 500Kb')]
    public $kk_mhs = null;

    #[Validate('required',message:'Bagian Ini Harus Diisi')]
    #[Validate('mimes:pdf',message:'Format Data Yang Anda Upload Tidak Sesuai')]
    #[Validate('max:500',message:'Ukuran Berkas Harus Kecil atau Sama Dengan 500Kb')]
    public $ktp_ortu_mhs = null;

    #[Validate('required',message:'Bagian Ini Harus Diisi')]
    #[Validate('mimes:pdf',message:'Format Data Yang Anda Upload Tidak Sesuai')]
    #[Validate('max:500',message:'Ukuran Berkas Harus Kecil atau Sama Dengan 500Kb')]
    public $rknlstrk_mhs = null;

    #[Validate('required',message:'Bagian Ini Harus Diisi')]
    #[Validate('mimes:pdf',message:'Format Data Yang Anda Upload Tidak Sesuai')]
    #[Validate('max:500',message:'Ukuran Berkas Harus Kecil atau Sama Dengan 500Kb')]
    public $gjortu_mhs = null;

    #[Validate('required',message:'Bagian Ini Harus Diisi')]
    #[Validate('mimes:pdf',message:'Format Data Yang Anda Upload Tidak Sesuai')]
    #[Validate('max:500',message:'Ukuran Berkas Harus Kecil atau Sama Dengan 500Kb')]
    public $surkk_mhs = null;

    #[Validate('required',message:'Bagian Ini Harus Diisi')]
    #[Validate('mimes:pdf',message:'Format Data Yang Anda Upload Tidak Sesuai')]
    #[Validate('max:500',message:'Ukuran Berkas Harus Kecil atau Sama Dengan 500Kb')]
    public $ft_ruangtamu = null;

    #[Validate('required',message:'Bagian Ini Harus Diisi')]
    #[Validate('mimes:pdf',message:'Format Data Yang Anda Upload Tidak Sesuai')]
    #[Validate('max:500',message:'Ukuran Berkas Harus Kecil atau Sama Dengan 500Kb')]
    public $ft_kamartdr = null;

    #[Validate('required',message:'Bagian Ini Harus Diisi')]
    #[Validate('mimes:pdf',message:'Format Data Yang Anda Upload Tidak Sesuai')]
    #[Validate('max:500',message:'Ukuran Berkas Harus Kecil atau Sama Dengan 500Kb')]
    public $ft_ruangklrg = null;

    #[Validate('required',message:'Bagian Ini Harus Diisi')]
    #[Validate('mimes:pdf',message:'Format Data Yang Anda Upload Tidak Sesuai')]
    #[Validate('max:500',message:'Ukuran Berkas Harus Kecil atau Sama Dengan 500Kb')]
    public $ft_dapur = null;

    #[Validate('required',message:'Bagian Ini Harus Diisi')]
    #[Validate('mimes:pdf',message:'Format Data Yang Anda Upload Tidak Sesuai')]
    #[Validate('max:500',message:'Ukuran Berkas Harus Kecil atau Sama Dengan 500Kb')]
    public $ft_dpnrumah = null;

    #[Validate('required',message:'Bagian Ini Harus Diisi')]
    #[Validate('mimes:pdf',message:'Format Data Yang Anda Upload Tidak Sesuai')]
    #[Validate('max:500',message:'Ukuran Berkas Harus Kecil atau Sama Dengan 500Kb')]
    public $sk_tdkbs = null;

    #[Validate('required',message:'Bagian Ini Harus Diisi')]
    #[Validate('mimes:pdf',message:'Format Data Yang Anda Upload Tidak Sesuai')]
    #[Validate('max:500',message:'Ukuran Berkas Harus Kecil atau Sama Dengan 500Kb')]
    public $spkd = null;


    #[Validate('required',message:'Bagian Ini Harus Diisi')]
    public $remember = false;

    public $view;

    public function render()
    {
        return view('livewire.pengajuan.index');
    }

    public function save()
    {
        $validated = $this->validate();

        $surper_mhs     = md5($this->surper_mhs . microtime()).'.'.$this->surper_mhs->extension();
        $kk_mhs         = md5($this->kk_mhs . microtime()).'.'.$this->kk_mhs->extension();
        $ktp_ortu_mhs   = md5($this->ktp_ortu_mhs . microtime()).'.'.$this->ktp_ortu_mhs->extension();
        $rknlstrk_mhs   = md5($this->rknlstrk_mhs . microtime()).'.'.$this->rknlstrk_mhs->extension();
        $gjortu_mhs     = md5($this->gjortu_mhs . microtime()).'.'.$this->gjortu_mhs->extension();
        $surkk_mhs      = md5($this->surkk_mhs . microtime()).'.'.$this->surkk_mhs->extension();
        $ft_ruangtamu   = md5($this->ft_ruangtamu . microtime()).'.'.$this->ft_ruangtamu->extension();
        $ft_kamartdr    = md5($this->ft_kamartdr . microtime()).'.'.$this->ft_kamartdr->extension();
        $ft_ruangklrg   = md5($this->ft_ruangklrg . microtime()).'.'.$this->ft_ruangklrg->extension();
        $ft_dapur       = md5($this->ft_dapur . microtime()).'.'.$this->ft_dapur->extension();
        $ft_dpnrumah    = md5($this->ft_dpnrumah . microtime()).'.'.$this->ft_dpnrumah->extension();
        $sk_tdkbs       = md5($this->sk_tdkbs . microtime()).'.'.$this->sk_tdkbs->extension();
        $spkd           = md5($this->spkd. microtime()).'.'.$this->spkd->extension();

        $this->surper_mhs->storeAs('public/files', $surper_mhs);
        $this->kk_mhs->storeAs('public/files', $kk_mhs);
        $this->ktp_ortu_mhs->storeAs('public/files', $ktp_ortu_mhs);
        $this->ktp_ortu_mhs->storeAs('public/files', $ktp_ortu_mhs);
        $this->rknlstrk_mhs->storeAs('public/files', $rknlstrk_mhs);
        $this->gjortu_mhs->storeAs('public/files', $gjortu_mhs);
        $this->surkk_mhs->storeAs('public/files', $surkk_mhs);
        $this->ft_ruangtamu->storeAs('public/files', $ft_ruangtamu);
        $this->ft_kamartdr->storeAs('public/files', $ft_kamartdr);
        $this->ft_ruangklrg->storeAs('public/files', $ft_ruangklrg);
        $this->ft_dapur->storeAs('public/files', $ft_dapur);
        $this->ft_dpnrumah->storeAs('public/files', $ft_dpnrumah);
        $this->sk_tdkbs->storeAs('public/files', $sk_tdkbs);
        $this->spkd->storeAs('public/files', $spkd);

        DB::beginTransaction();
        try {

            //Cek Jadwal Aktif
            $jadwal = Jadwal::where('is_aktif','Y')->first();

            // Create Data
            Pengajuan::create([
                'mahasiswa_id' => Auth::guard('mahasiswa')->user()->id,
                'jadwal_id' => $jadwal->id,
                'no_wa_mhs' => $this->no_wa_mhs,
                'no_wa_ortu' => $this->no_wa_ortu,
                'surper_mhs' => $surper_mhs,
                'kk_mhs' => $kk_mhs,
                'ktp_ortu_mhs' => $ktp_ortu_mhs,
                'rknlstrk_mhs' => $rknlstrk_mhs,
                'gjortu_mhs' => $gjortu_mhs,
                'surkk_mhs' => $surkk_mhs,
                'ft_ruangtamu' => $ft_ruangtamu,
                'ft_kamartdr' => $ft_kamartdr,
                'ft_ruangklrg' => $ft_ruangklrg,
                'ft_dapur' => $ft_dapur,
                'ft_dpnrumah' => $ft_dpnrumah,
                'sk_tdkbs' => $sk_tdkbs,
                'spkd' => $spkd
            ]);

            DB::commit();
            $this->dispatch('sweet-alert', icon: 'success', title: 'Data Anda Berhasil Disimpan');
            $this->resetForm();
            sleep(5);
            return redirect('/dashboard');

        } catch (\Throwable $th) {
            DB::rollBack();
            $this->dispatch('sweet-alert', icon: 'danger', title: 'Data Anda Gagal Disimpan');

        }

    }

    #[On('viewData')]
    public function viewData($view)
    {
        $this->view = $view;
        $this->dispatch('open-modal', 'modal-view');
    }

    public function resetForm()
    {
        $this->reset();
        $this->resetErrorBag();
        $this->resetValidation();
    }

}
