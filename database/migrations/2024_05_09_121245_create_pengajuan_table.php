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
            $table->id();
            $table->string('nama');
            $table->string('no_telepon');
            $table->string('jenis');
            $table->string('ktp'); // Kolom untuk menyimpan nama file KTP
            $table->text('surat'); // Kolom untuk menyimpan nama file surat
            $table->char('status_validasi', 1)->default('0');
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
