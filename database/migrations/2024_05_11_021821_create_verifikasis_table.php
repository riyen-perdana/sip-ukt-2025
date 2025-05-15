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
        Schema::create('verifikasi', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('pengajuan_id')->comment('ID Pengajuan Mahasiswa');
            $table->string('user_id')->comment('ID Verifikator');
            $table->enum('is_setuju',['Y','N'])->default('N')->comment('Status Penurunan UKT');
            $table->text('komentar')->comment('Komentar Persetujuan Penurunan UKT')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('verifikasis');
    }
};
