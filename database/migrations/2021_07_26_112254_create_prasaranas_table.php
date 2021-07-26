<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrasaranasTable extends Migration
{
    const TABLE_NAME = "tbl_prasarana";
    public function up()
    {
        Schema::create(self::TABLE_NAME, function (Blueprint $table) {
            $table->id('id_prasarana');
            
            $table->unsignedBigInteger('id_sekolah');
            $table->string('nama')->unique();
            $table->text('spesifikasi')->nullable();
            $table->unsignedBigInteger('jumlah')->default(0);

            $table->foreign('id_sekolah')->references('id_profil')
                ->on('tbl_sekolah')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
            
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
