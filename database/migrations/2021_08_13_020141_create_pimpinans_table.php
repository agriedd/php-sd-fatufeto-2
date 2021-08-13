<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePimpinansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_pimpinan', function (Blueprint $table) {
            $table->id('id_pimpinan');
            $table->timestamps();
            $table->unsignedBigInteger('id_profil')->nullable();
            $table->foreign('id_profil')->references('id_profil')->on('tbl_sekolah')
                ->onUpdate('cascade')->onDelete('set null');
            $table->string('nama');
            $table->string('nip')->nullable();

            $table->enum('jenis_kelamin', ['l','p'])->nullable();
            $table->string('jabatan')->nullable();
            $table->string('pangkat')->nullable();
            $table->string('golongan')->nullable();
            $table->string('pendidikan_terakhir')->nullable();
            $table->string('pendidikan_profesi')->nullable();
            $table->string('telepon')->nullable();
            $table->string('tempat_lahir')->nullable();
            $table->string('tanggal_lahir')->nullable();
            $table->text('alamat')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_pimpinan');
    }
}
