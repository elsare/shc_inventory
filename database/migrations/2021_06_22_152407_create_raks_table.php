<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRaksTable extends Migration
{
    public function up()
    {
        Schema::create('rak', function (Blueprint $table) {
            $table->bigIncrements('rak_id');
            $table->string('blok_rak', 5)->nullable();
            $table->integer('no_satu')->nullable();
            $table->integer('no_dua')->nullable();
            $table->integer('user_updated')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('rak');
    }
}
