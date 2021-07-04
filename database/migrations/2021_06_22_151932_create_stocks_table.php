<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStocksTable extends Migration
{
    
    public function up()
    {
        Schema::create('stock', function (Blueprint $table) {
            $table->bigIncrements('stock_id');
            $table->integer('part_number_id');
            $table->integer('rak_id')->nullable();
            $table->integer('jumlah_stock')->nullable();
            $table->integer('user_updated')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('stock');
    }
}
