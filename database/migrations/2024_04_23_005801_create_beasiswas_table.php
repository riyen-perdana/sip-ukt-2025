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
        Schema::create('beasiswa', function (Blueprint $table) {
            $table->id();
            $table->string('nim')->unique()->comment('Nomor Induk Mahasiswa Penerima Beasiswa');
            $table->string('name')->comment('Nama Penerima Beasiswa');
            $table->enum('is_aktif',['Y','N'])->comment('Status Penerima Beasiswa')->default('Y');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('beasiswa');
    }
};
