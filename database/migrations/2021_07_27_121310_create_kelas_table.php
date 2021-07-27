<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKelasTable extends Migration{

    public function up(){
        Schema::create('tbl_kelas', function (Blueprint $table) {
            $table->id('id_kelas');
            $table->string('nama')->unique();
            $table->string('keterangan')->nullable();
            $table->unsignedBigInteger('id_guru')->nullable();
            $table->timestamps();
            $table->foreign('id_guru')->references('id_guru')->on('tbl_guru')
                ->cascadeOnUpdate()
                ->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_kelas');
    }
}
