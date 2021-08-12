<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSiswasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_siswa', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('nama_siswa');
            $table->string('tempat_lahir')->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->enum('jenis_kelamin', ['l', 'p'])->nullable();
            $table->string('nis')->nullable();
            $table->string('nisn')->nullable();
            $table->enum('agama', ['0', '1', '2', '3', '4', '5'])->nullable();
            $table->string('kip')->nullable();
            $table->string('alamat')->nullable();
            $table->unsignedBigInteger('id_kelas');
            $table->foreign('id_kelas')
                ->references('id_kelas')
                ->on('tbl_kelas')
                ->onDelete('cascade')
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
        Schema::dropIfExists('tbl_siswa');
    }
}
