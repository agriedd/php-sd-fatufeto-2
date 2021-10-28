<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RemoveTanggalLahirAndTempatLahirOnTblSiswa extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tbl_siswa', function (Blueprint $table) {
            $table->dropColumn('tanggal_lahir');
            $table->dropColumn('tempat_lahir');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tbl_siswa', function (Blueprint $table) {
            //
        });
    }
}
