<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddEmailAndPasswordToGuruTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){
        Schema::table('tbl_guru', function (Blueprint $table) {
            $table->string('email')->nullable();
            $table->string('password')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tbl_guru', function (Blueprint $table) {
            //
        });
    }
}
