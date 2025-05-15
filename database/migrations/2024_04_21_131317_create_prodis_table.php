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
        Schema::create('prodi', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('fakultas_id')->comment('UUID Tabel Fakultas');
            $table->string('name_prodi')->comment('Nama Program Studi');
            $table->string('abbr_prodi')->comment('Singkatan Prodi');
            $table->enum('is_aktif',['Y','N'])->comment('Status Aktif Program Studi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prodi');
    }
};
