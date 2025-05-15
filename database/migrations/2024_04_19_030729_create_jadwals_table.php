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
        Schema::create('jadwal', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->integer('tahun')->unique()->comment('Tahun Pembukaan Pendaftaran');
            $table->date('daftar_buka')->comment('Tanggal Buka Pendaftaran');
            $table->date('daftar_tutup')->comment('Tanggal Tutup Pendaftaran');
            $table->enum('is_aktif',['Y','N'])->default('Y')->comment('Apakah Jadwal Aktif');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jadwal');
    }
};
