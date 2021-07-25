<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGurusTable extends Migration
{
    const TABLE_NAME = "tbl_guru";
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){
        Schema::create(self::TABLE_NAME, function (Blueprint $table) {
            $table->id('id_guru');
            $table->string('nip')->nullable();
            $table->string('nama');
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
            $table->enum('status', ['0', '1', '2', '3'])->default('1')->comment();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists(self::TABLE_NAME);
    }
}
