<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsTable extends Migration
{
   
    public function up()
    {
        Schema::create('event', function (Blueprint $table) {
            $table->bigIncrements('event_id');
            $table->string('title');
            $table->dateTime('start');
            $table->dateTime('end');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('event');
    }
}
