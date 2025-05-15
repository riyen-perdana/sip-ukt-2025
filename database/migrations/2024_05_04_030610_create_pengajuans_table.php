<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pengajuan', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('mahasiswa_id')->comment('UUID Mahasiswa');
            $table->string('no_pengajuan')->comment('Nomor Pengajuan');
            $table->string('no_wa_mhs')->comment('Nomor Whatsapp Mahasiswa')->nullable();
            $table->string('no_wa_ortu')->comment('Nomor Whatsapp Orang Tua Mahasiswa');
            $table->string('surper_mhs')->comment('Surat Permohonan Mahasiswa');
            $table->string('kk_mhs')->comment('Kartu Keluarga Mahasiswa');
            $table->string('ktp_ortu_mhs')->comment('Kartu Tanda Penduduk Orang Tua Mahasiswa');
            $table->string('rknlstrk_mhs')->comment('Rekening Listrik Mahasiswa');
            $table->string('gjortu_mhs')->comment('Surat Keterangan Gaji Orang Tua Mahasiswa');
            $table->string('surkk_mhs')->comment('Surat Keterangan Kematian Orang Tua');
            $table->string('ft_ruangtamu')->comment('Foto Rumah Ruang Tamu');
            $table->string('ft_kamartdr')->comment('Foto Rumah Kamar Tidur');
            $table->string('ft_ruangklrg')->comment('Foto Rumah Ruang Keluarga');
            $table->string('ft_dapur')->comment('Foto Rumah Dapur');
            $table->string('ft_dpnrumah')->comment('Foto Rumah Halaman Depan Rumah');
            $table->string('sk_tdkbs')->comment('Surat Keterangan Tidak Menerima Beasiswa');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengajuan');
    }
};
