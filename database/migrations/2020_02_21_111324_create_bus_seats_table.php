<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBusSeatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bus_seats', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('schedule_id');
            $table->unsignedBigInteger('seat_id');
            $table->unsignedBigInteger('status_id');
            
            $table->timestamps();



            
            $table->foreign('status_id')->references('id')->on('statuses');
            $table->foreign('schedule_id')->references('id')->on('schedules');
            $table->foreign('seat_id')->references('id')->on('seats');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bus_seats');
    }
}
