<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTplScheduleSeatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tpl_schedule_seats', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('tpl_schedule_id');
            $table->unsignedBigInteger('tpl_seat_id');
            $table->string('seat_name');

            $table->string('customer_name')->nullable();
            $table->string('customer_phone')->nullable();
            $table->unsignedBigInteger('customer_id')->nullable();
            $table->integer('status_id');

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
        Schema::dropIfExists('tpl_schedule_seats');
    }
}
