<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateScheduleModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schedule_models', function (Blueprint $table) {
            $table->increments('id');
            $table->enum('type', ['TRAIN', 'BUS']);
            $table->integer('line');
            $table->integer('from_place_id');
            $table->integer('to_place_id');
            $table->time('departure_time');
            $table->time('arrival_time');
            $table->integer('distance');
            $table->integer('speed');
            $table->enum('status', ['AVAILABLE', 'UNAVAILABLE']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('schedule_models');
    }
}
