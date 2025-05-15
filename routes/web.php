<?php

use App\Livewire\Beasiswa\BeasiswaIndex;
use App\Livewire\Fakultas\FakultasIndex;
use App\Livewire\Jadwal\JadwalIndex;
use App\Livewire\Pendaftar\PendaftarIndex;
use App\Livewire\Pengajuan\PengajuanIndex;
use App\Livewire\PenggunaIndex;
use App\Livewire\Prodi\ProdiIndex;
use App\Livewire\User\UserIndex;
use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::view('/', 'welcome')->name('welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth:web,mahasiswa','verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::get('/pengguna', UserIndex::class)
    ->middleware(['auth','ceklevel:adm'])
    ->name('user.index');

Route::get('/jadwal', JadwalIndex::class)
    ->middleware(['auth','ceklevel:adm'])
    ->name('jadwal.index');

Route::get('/fakultas', FakultasIndex::class)
    ->middleware(['auth','ceklevel:adm'])
    ->name('fakultas.index');

Route::get('/prodi', ProdiIndex::class)
    ->middleware(['auth','ceklevel:adm'])
    ->name('prodi.index');

Route::get('/beasiswa', BeasiswaIndex::class)
    ->middleware(['auth','ceklevel:adm'])
    ->name('beasiswa.index');

Route::get('/pendaftaran', PengajuanIndex::class)
    ->middleware(['auth:mahasiswa','isdaftar','checkisdaftar'])
    ->name('pengajuan.index');

Route::get('/pendaftar', PendaftarIndex::class)
    ->middleware(['auth'])
    ->name('pendaftar.index');

require __DIR__ . '/auth.php';
