<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDeviceSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('device_settings', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('device_id')->unsigned()->index();
            $table->integer('content_category_id')->unsigned()->index();    
            $table->integer('content_id')->unsigned()->index();
            $table->boolean('public_content_allowed')->default(false);
            $table->integer('country_id')->unsigned()->index();
            $table->integer('location_id')->unsigned()->index();
            $table->string('city')->nullable();
            $table->timestamps();

            $table->foreign('device_id')->references('id')->on('devices')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('country_id')->references('id')->on('countries')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('location_id')->references('id')->on('locations')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('content_category_id')->references('id')->on('content_categories')->onUpdate('cascade')->onDelete('cascade');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('device_settings');
    }
}
