<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnKontakSambutanSekolah extends Migration{
    public function up(){
        Schema::table('tbl_sekolah', function (Blueprint $table) {
            $table->string('kontak')->nullable();
            $table->text('sambutan')->nullable();
        });
    }

    public function down(){
        Schema::table('tbl_sekolah', function (Blueprint $table) {
            //
        });
    }
}
