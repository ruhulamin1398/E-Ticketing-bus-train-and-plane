<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTplSchedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tpl_schedules', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('tpl_id');
            $table->unsignedBigInteger('company_type_id');
            $table->unsignedBigInteger('counter_id');
            $table->unsignedBigInteger('company_id');
            $table->unsignedBigInteger('from_destination_id');
            $table->dateTime('schedule');
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
        Schema::dropIfExists('tpl_schedules');
    }
}
