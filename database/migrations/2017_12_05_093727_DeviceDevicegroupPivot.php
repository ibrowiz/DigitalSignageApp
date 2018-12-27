<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DeviceDevicegroupPivot extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('devicegroup_device', function (Blueprint $table) {

            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('device_id')->unsigned()->index();
            $table->integer('device_group_id')->unsigned()->index();

            $table->foreign('device_id')->references('id')->on('devices')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('device_group_id')->references('id')->on('device_groups')->onUpdate('cascade')->onDelete('cascade');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::dropIfExists('devicegroup_device');
    }
}
