<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
           $table->bigIncrements('id');
            $table->unsignedBigInteger('bus_seat_id');

            $table->dateTime('time');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('road_id');
            $table->unsignedBigInteger('counter_id');
            $table->unsignedBigInteger('seat_id');
            $table->timestamps();

            $table->foreign('bus_seat_id')->references('id')->on('bus_seats');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('road_id')->references('id')->on('roads');
            $table->foreign('counter_id')->references('id')->on('counters');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tickets');
    }
}
