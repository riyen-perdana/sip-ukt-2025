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
        Schema::create('mahasiswa', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('nim')->unique()->comment('Nomor Induk Mahasiswa');
            $table->string('password')->comment('Password Mahasiswa');
            $table->string('nama')->comment('Nama Mahasiswa');
            $table->string('prodi_id')->comment('ID Prodi');
            $table->integer('ukt')->comment('Grade UKT');
            $table->bigInteger('jml_ukt_awal')->comment('Jumlah UKT');
            $table->bigInteger('jml_ukt_turun')->comment('Jumlah UKT Penurunan');
            $table->integer('semester')->comment('Semester Mahasiswa');
            $table->date('tgl_lhr')->comment('Tanggal Lahir Mahasiswa');
            $table->string('tpt_lhr')->comment('Tempat Lahir Mahasiswa');
            $table->string('foto')->comment('Link Foto Mahasiswa');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mahasiswa');
    }
};
