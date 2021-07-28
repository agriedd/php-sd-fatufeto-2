<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnIdKelasOnJadwalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tbl_jadwal', function(Blueprint $table){
            $table->dropForeign(['id_prasarana']);
            $table->dropColumn('id_prasarana');
            $table->unsignedBigInteger('id_kelas')->nullable();
            $table->foreign('id_kelas')->references('id_kelas')->on('tbl_kelas')
                ->cascadeOnUpdate()
                ->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(){
        Schema::table('tbl_jadwal', function(Blueprint $table){
            $table->dropColumn('id_kelas');
        });
    }
}
