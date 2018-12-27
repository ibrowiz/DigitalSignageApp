<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DeviceScheduleManager extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('device_schedule_managers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('device_id')->unsigned()->index();
            $table->integer('schedule_id')->unsigned()->index();
            $table->string('status');
            $table->dateTime('initial_playing_time');
            $table->integer('bill');
            $table->integer('transaction_id')->unsigned()->index(); 
            $table->integer('times_played');
            $table->timestamps();
            


            $table->foreign('device_id')->references('id')->on('contents')->onUpdate('cascade')->onDelete('cascade');

            $table->foreign('schedule_id')->references('id')->on('schedules')->onUpdate('cascade')->onDelete('cascade');

            $table->foreign('transaction_id')->references('id')->on('transactions')->onUpdate('cascade')->onDelete('cascade');
        });
       
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('device_schedule_managers');
    }
}