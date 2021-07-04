<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateModelsTable extends Migration
{
   
    public function up()
    {
        Schema::create('model', function (Blueprint $table) {
            $table->bigIncrements('model_id');
            $table->string('nama_model', 100);
            $table->integer('user_updated')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('model');
    }
}
