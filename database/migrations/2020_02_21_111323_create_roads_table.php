<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roads', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('starting_counter_id');
            $table->unsignedBigInteger('destination_counter_id');
            $table->double('distance',8,2);
            $table->double('cost',8,2);
            $table->timestamps();

            $table->foreign('starting_counter_id')->references('id')->on('counters');
            $table->foreign('destination_counter_id')->references('id')->on('counters');



        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('roads');
    }
}
