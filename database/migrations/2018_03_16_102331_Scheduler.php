<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Scheduler extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schedules', function (Blueprint $table) {
            $table->increments('id');
            $table->string('assignable_type');
            $table->integer('assignable_id');            
            $table->string('name');
            $table->integer('repeat_cycle_id')->unsigned()->index();
            $table->timestamp('start_time');
            $table->timestamp('expiration_date');
            $table->integer('occurence_count')->nullable();
            $table->bigInteger('occurence_interval')->nullable();
            $table->integer('duration');
            $table->smallInteger('sound_output');
            $table->timestamps();
           

            $table->softDeletes();

             $table->foreign('repeat_cycle_id')->references('id')->on('repeat-cycles')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('schedules');
    }
}
