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
        Schema::create('ktp', function (Blueprint $table) {
            $table->id();
            $table->integer('No_NIK');
            $table->integer('No_KK');
            $table->string('Foto_KK');
            $table->char('status_validasi', 1)->default('0');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_ktp');
    }
};
