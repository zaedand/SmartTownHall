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
        Schema::create('pajak', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('nama');
            $table->integer('telp');
            $table->string('email');
            $table->string('jenis');
            $table->integer('nominal');
            $table->string('ktp');
            $table->char('status_validasi', 1)->default('0');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_pajak');
    }
};
