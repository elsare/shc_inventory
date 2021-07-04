<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDepartemensTable extends Migration
{
    
    public function up()
    {
        Schema::create('departemen', function (Blueprint $table) {
            $table->bigIncrements('departemen_id');
            $table->string('nama_departemen', 100);
            $table->string('password');
            $table->integer('user_updated')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('departemen');
    }
}
