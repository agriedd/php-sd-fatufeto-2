<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGambarKegiatanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gambar_kegiatan', function (Blueprint $table) {
            $table->id('id_gambar_kegiatan');
            $table->timestamps();
            $table->unsignedBigInteger('id_kegiatan');
            $table->foreign('id_kegiatan')->references('id_kegiatan')->on('tbl_kegiatan')->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gambar_kegiatan');
    }
}
