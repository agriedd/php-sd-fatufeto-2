<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIdKategoriColumnToBeritaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tbl_berita', function (Blueprint $table) {
            $table->unsignedBigInteger('id_kategori')->nullable();
            $table->foreign('id_kategori')->references('id_kategori')->on('tbl_kategori')->onDelete('set null')
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
        Schema::table('tbl_berita', function (Blueprint $table) {
            $table->dropForeign(['id_kategori']);
            $table->dropColumn('id_kategori');
        });
    }
}
