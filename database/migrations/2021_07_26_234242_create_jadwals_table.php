<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJadwalsTable extends Migration
{
    const TABLE_NAME = 'tbl_jadwal';
    public function up(){
        Schema::create(self::TABLE_NAME, function (Blueprint $table) {
            $table->id('id_jadwal');
            
            $table->string('mata_pelajaran');
            
            $table->unsignedBigInteger('id_guru')->nullable();
            $table->unsignedBigInteger('id_prasarana');
            
            $table->enum('hari', [ 'senin', 'selasa', 'rabu', 'kamis', 'jumat', 'sabtu' ])->nullable();
            $table->date('tanggal');
            $table->unsignedBigInteger('waktu')->comment("waktu dalam menit")->default(45);

            $table->timestamps();
            
            $table->foreign('id_prasarana')->references('id_prasarana')
                ->on('tbl_prasarana')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
            $table->foreign('id_guru')->references('id_guru')
                ->on('tbl_guru')
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
