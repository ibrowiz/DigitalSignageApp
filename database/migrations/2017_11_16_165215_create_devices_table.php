<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDevicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('devices', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('assignable_type')->unique();
            $table->integer('assignable_id')->unique();
            $table->string('device_name')->unique();
            $table->integer('default_layout_id')->nullable();
            $table->string('uu_id')->unique()->nullable();
            $table->string('serial_no')->unique()->nullable();
            $table->string('firmware_id')->unique()->nullable();
            $table->integer('version')->nullable();
            $table->integer('update_interval')->nullable();
            $table->string('log_interval')->nullable();
            $table->string('end_of_service')->nullable();
            $table->datetime('last_seen_at')->nullable();
            $table->datetime('last_booted_at')->nullable();
            $table->integer('default_schedule')->nullable();
            $table->integer('location_id')->nullable();
            $table->integer('category_id')->nullable();
             $table->integer('status')->nullable();
             $table->text('description')->nullable();
            $table->timestamps();
            $table->integer('last_updated_by')->nullable();
            $table->integer('deleted_by')->nullable();
            $table->integer('created_by')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('devices');
    }
}
