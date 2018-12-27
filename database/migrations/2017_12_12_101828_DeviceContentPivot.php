<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DeviceContentPivot extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('device_content', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('device_id')->unsigned()->index();
            $table->integer('content_id')->unsigned()->index();
            $table->boolean('status')->default(1);
            $table->foreign('device_id')->references('id')->on('devices')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('content_id')->references('id')->on('contents')->onUpdate('cascade')->onDelete('cascade');
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('device_content');
    }
}
