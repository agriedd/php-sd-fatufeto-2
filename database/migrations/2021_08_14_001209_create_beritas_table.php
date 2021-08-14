<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBeritasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_berita', function (Blueprint $table) {
            $table->id('id_berita');
            $table->timestamps();
            $table->string('judul');
            $table->text('isi');
            $table->enum('jenis', ['berita', 'pengumuman'])->default('berita');
            $table->string('deskripsi')->nullable();
            $table->string('kontributor')->nullable();
            $table->dateTime('expired_at')->nullable();
            $table->dateTime('tanggal_terbit')->nullable();
            $table->unsignedBigInteger('id_profil')->nullable();
            $table->foreign('id_profil')->references('id_profil')->on('tbl_sekolah')
                ->onDelete('set null')
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
        Schema::dropIfExists('tbl_berita');
    }
}
