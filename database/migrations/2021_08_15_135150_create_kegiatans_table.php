<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKegiatansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){
        Schema::create('tbl_kegiatan', function (Blueprint $table) {
            $table->id('id_kegiatan');
            $table->timestamps();
            $table->string('nama_kegiatan');
            $table->string('lokasi');
            $table->time('waktu');
            $table->date('tanggal');
            $table->enum('hari', ['senin','selasa','rabu','kamis','jumat','sabtu','minggu'])->nullable();
            $table->unsignedBigInteger('id_profil')->nullable();
            $table->foreign('id_profil')->references('id_profil')->on('tbl_sekolah')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->text('foto')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_kegiatan');
    }
}
