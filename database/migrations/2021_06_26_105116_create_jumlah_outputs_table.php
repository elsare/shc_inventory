<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJumlahOutputsTable extends Migration
{
   
    public function up()
    {
        Schema::create('jumlah_output', function (Blueprint $table) {
            $table->bigIncrements('jumlah_output_id');
            $table->integer('stock_id');
            $table->integer('departemen_id');
            $table->integer('jumlah')->nullable();
            $table->integer('user_updated')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('jumlah_output');
    }
}
