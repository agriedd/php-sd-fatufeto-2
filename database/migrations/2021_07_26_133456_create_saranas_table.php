<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSaranasTable extends Migration
{
    const TABLE_NAME = 'tbl_sarana';
    public function up()
    {
        Schema::create(self::TABLE_NAME, function (Blueprint $table) {
            $table->id('id_sarana');
            $table->unsignedBigInteger('id_prasarana');
            $table->string('nama');
            $table->unsignedBigInteger('jumlah')->default(0);
            $table->string('kondisi')->nullable();
            $table->timestamps();

            $table->foreign('id_prasarana')->references('id_prasarana')
                ->on('tbl_prasarana')
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
        Schema::dropIfExists(self::TABLE_NAME);
    }
}
