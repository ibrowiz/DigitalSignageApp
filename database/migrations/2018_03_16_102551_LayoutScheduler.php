<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class LayoutScheduler extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
   public function up()
    {
        Schema::create('layout_schedule', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('layout_id')->unsigned()->index();
            $table->integer('scheduler_id')->unsigned()->index();
            $table->string('assignable_type');
            $table->integer('assignable_id'); 
            $table->integer('duration');
            $table->integer('transition_id')->unsigned()->index();
            $table->timestamps();
           

             $table->foreign('layout_id')->references('id')->on('layouts')->onUpdate('cascade')->onDelete('cascade');
              $table->foreign('scheduler_id')->references('id')->on('schedules')->onUpdate('cascade')->onDelete('cascade');
               $table->foreign('transition_id')->references('id')->on('transitions')->onUpdate('cascade')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('layout_schedule');
    }
}
