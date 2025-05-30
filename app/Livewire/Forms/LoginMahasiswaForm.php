<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;
use Illuminate\Auth\Events\Lockout;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
use App\Models\Beasiswa;
use App\Models\Jadwal;
use App\Models\Mahasiswa;
use App\Models\Prodi;
use Illuminate\Support\Facades\Session;

class LoginMahasiswaForm extends Form
{

    public string $nim = '';

    public string $password = '';

    public bool $remember = false;

    public function authenticate(): void
    {
        $this->ensureIsNotRateLimited();

        $array = [7, 9, 11, 14, 12, 16, 17, 20, 21];

        //Fungsi Login Mahasiswa
        if (!Auth::guard('mahasiswa')->attempt($this->only(['nim', 'password']), $this->remember)) {

            // Cek Jadwal Apakah Masih Aktif ?
            $tgl = now()->format('Y-m-d');
            $jadwal = Jadwal::where('is_aktif', 'Y')
                ->where('daftar_buka', '<=', $tgl)
                ->where('daftar_tutup', '>=', $tgl)
                ->first();

            if (!$jadwal) {
                $this->reset(['nim', 'password', 'remember']);
                throw ValidationException::withMessages([
                    session()->flash('status', 'Jadwal Pendaftaran Belum Dibuka')
                ]);
            } else {
                //Data Mahasiswa Tidak Ada Ditabel, Cari Data dari API
                $response = Http::post('https://api-iraise.uin-suska.ac.id/login', [
                    'username' => $this->nim,
                    'password' => $this->password,
                ])->json();

                if ($response['success'] == true) {
                    //Cek Dahulu Semester Mahasiswa
                    if ($response['data']['user']['semester'] < 3) {
                        throw ValidationException::withMessages([
                            session()->flash('status', 'Kriteria Pendaftaran Tidak Sesuai, Minimal Semester 2')
                        ]);
                    } else {
                        //Cek UKT
                        $ukt = intval($response['data']['ukt']['kelompok_ukt_final']);
                        if ($ukt < 5) {
                            throw ValidationException::withMessages([
                                session()->flash('status', 'Kriteria Pendaftaran Tidak Sesuai, Minimal UKT 5')
                            ]);
                        } else {
                            //Cek Data Beasiswa
                            $bs = Beasiswa::where('nim', $this->nim)->first();
                            if ($bs) {
                                throw ValidationException::withMessages([
                                    session()->flash('status', 'Kriteria Pendaftaran Tidak Sesuai, Penerima Beasiswa')
                                ]);
                            } else {
                                // Cek Jalur Masuk
                                $jm = $response['data']['ukt']['id_jalur_masuk'];
                                if (in_array($jm, $array)) {
                                    throw ValidationException::withMessages([
                                        session()->flash('status', 'Kriteria Pendaftaran Tidak Sesuai, Jalur Masuk Salah')
                                    ]);
                                } else {

                                    //Semus Kriteria Tidak Terpenuhi, Kemungkinan
                                    //Lupa Password, Cek Data Mahasiswa

                                    $mhs = Mahasiswa::where('nim', $this->nim)->first();

                                    if ($mhs) {
                                        //Jika Data Mahasiswa Ada, Lakukan Update Data
                                        $mahasiswa = Mahasiswa::findOrFail($mhs->id);
                                        $mahasiswa->password = $this->password;
                                        $mahasiswa->semester = $response['data']['user']['semester'];
                                        $mahasiswa->foto     = $response['data']['user']['foto_profil'];
                                        $mahasiswa->update();
                                    } else {
                                        //Data Mahasiswa Tidak Ada
                                        //Masukkan Ke Database
                                        $prodi = Prodi::where([['abbr_prodi', trim($response['data']['user']['regpd_id_sms'])], ['is_aktif', 'Y']])->first();

                                        if (empty($prodi)) {
                                            throw ValidationException::withMessages([
                                                session()->flash('status', 'Error 500 : Kode Prodi Tidak Ditemukan')
                                            ]);
                                        }

                                        Mahasiswa::create([
                                            'nim' => $this->nim,
                                            'password' => bcrypt($this->password),
                                            'nama' => $response['data']['user']['nm_pd'],
                                            'prodi_id' => $prodi->id,
                                            'ukt' => intval($response['data']['ukt']['kelompok_ukt_final']),
                                            'jml_ukt_awal' => $response['data']['ukt']['jlh_bayar'],
                                            'jml_ukt_turun' => json_encode($response['data']['ukt_minus'], JSON_PRETTY_PRINT),
                                            'semester' => $response['data']['user']['semester'],
                                            'tgl_lhr' => $response['data']['user']['tgl_lahir'],
                                            'tpt_lhr' => $response['data']['user']['tmpt_lahir'],
                                            'foto' => $response['data']['user']['foto_profil']
                                        ]);

                                        Auth::guard('mahasiswa')->attempt($this->only(['nim', 'password']), $this->remember);
                                    }
                                }
                            }
                        }
                    }
                } else {
                    //Login Failed
                    throw ValidationException::withMessages([
                        session()->flash('status', 'Username atau Password Salah')
                    ]);
                }
            }
        }
        // } else {
        //     dd('Login Berhasil');
        //     exit();
        // }

        RateLimiter::hit($this->throttleKey());
    }

    protected function ensureIsNotRateLimited(): void
    {
        if (!RateLimiter::tooManyAttempts($this->throttleKey(), 5)) {
            return;
        }

        event(new Lockout(request()));

        $seconds = RateLimiter::availableIn($this->throttleKey());

        throw ValidationException::withMessages([
            'form.nim' => trans('auth.throttle', [
                'seconds' => $seconds,
                'minutes' => ceil($seconds / 60),
            ]),
        ]);
    }

    protected function throttleKey(): string
    {
        return Str::transliterate(Str::lower($this->nim) . '|' . request()->ip());
    }
}
