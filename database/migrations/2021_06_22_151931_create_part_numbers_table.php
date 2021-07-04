<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePartNumbersTable extends Migration
{
    public function up()
    {
        Schema::create('part_number', function (Blueprint $table) {
            $table->bigIncrements('part_number_id');
            $table->integer('model_id');
            $table->string('part_no', 100);
            $table->string('description', 150);
            $table->integer('user_updated')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('part_number');
    }
}
