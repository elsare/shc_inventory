<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGapsTable extends Migration
{
   
    public function up()
    {
        Schema::create('gap', function (Blueprint $table) {
            $table->bigIncrements('gap_id');
            $table->integer('stock_id');
            $table->string('actual', 100);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('gap');
    }
}
