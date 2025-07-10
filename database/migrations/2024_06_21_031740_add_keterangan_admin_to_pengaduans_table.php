<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddKeteranganAdminToPengaduansTable extends Migration
{
    public function up()
    {
        Schema::table('pengaduans', function (Blueprint $table) {
            $table->text('keterangan_admin')->nullable()->after('status_validasi');
        });
    }

    public function down()
    {
        Schema::table('pengaduans', function (Blueprint $table) {
            $table->dropColumn('keterangan_admin');
        });
    }
}
