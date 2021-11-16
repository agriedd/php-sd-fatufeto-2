<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RemoveColumnIdPrasaranaOnJadwalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tbl_jadwal', function (Blueprint $table) {
            $table->dropForeign(['id_prasarana']);
            $table->dropColumn('id_prasarana');
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
            $table->unsignedBigInteger('id_prasarana')->nullable();
            $table->foreign('id_prasarana')->references('id_prasarana')
                ->on('tbl_prasarana')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
        });
    }
}
