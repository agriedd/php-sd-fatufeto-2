<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnWaktuMulaiAndWaktuBerakhirOnJadwalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tbl_jadwal', function (Blueprint $table) {
            $table->time('waktu_mulai')->default('00:00');
            $table->time('waktu_berakhir')->default('00:00');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tbl_jadwal', function (Blueprint $table) {
            $table->dropColumn('waktu_mulai');
            $table->dropColumn('waktu_berakhir');
        });
    }
}
