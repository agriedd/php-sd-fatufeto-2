<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSekolahsTable extends Migration{

    const TABLE_NAME = "tbl_sekolah";

    public function up(){
        Schema::create(self::TABLE_NAME, function (Blueprint $table) {
            $table->id('id_profil');
            $table->timestamps();
            $table->string('nama_sekolah', 50);
            $table->string('jenjang', 50)->nullable();
            $table->date('tgl_berdiri')->nullable();
            $table->text('struktur_organisasi')->nullable();
            $table->text('visi_misi')->nullable();
            $table->text('alamat')->nullable();
            $table->string('npsn', 20)->unique();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(){
        Schema::dropIfExists(self::TABLE_NAME);
    }
}
