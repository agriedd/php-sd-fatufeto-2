<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJadwalKelasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jadwal_kelas', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedBigInteger('id_kelas');
            $table->unsignedBigInteger('id_jadwal');
            $table->foreign('id_kelas')
                ->references('id_kelas')
                ->on('tbl_kelas')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
            $table->foreign('id_jadwal')
                ->references('id_jadwal')
                ->on('tbl_jadwal')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jadwal_kelas');
    }
}
