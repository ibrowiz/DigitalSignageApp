<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Resource extends Migration
{
    public function up()
    {
        Schema::create('resources', function (Blueprint $table) {
            $table->increments('id');
            $table->string('label')->nullable();
            $table->integer('content_id')->unsigned()->index()->nullable();
            $table->string('tag')->nullable();
            $table->string('file_name');
            $table->string('file_ext');
            $table->string('file_type');
            $table->string('lenght')->nullable();
            $table->string('width')->nullable();
            $table->string('file_size')->nullable();
            $table->string('checksum')->nullable();
            $table->integer('assignable_id');
            $table->string('assignable_type');
            $table->string('resource_type')->nullable();
            $table->boolean('error')->default(0);
            $table->string('path')->nullable();
            $table->timestamps();
            $table->integer('last_updated_by')->nullable();
            $table->integer('deleted_by')->nullable();
            $table->integer('created_by')->nullable();

            $table->foreign('content_id')->references('id')->on('contents')->onUpdate('cascade')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('resources');
    }
}
