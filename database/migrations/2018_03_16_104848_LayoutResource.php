<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class LayoutResource extends Migration
{
   public function up()
    {
        Schema::create('layout_resources', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('layout_id');
             $table->string('assignable_type');
            $table->integer('assignable_id'); 
            $table->string('type');
            $table->string('name');
            $table->string('weblink')->nullable();
            $table->string('left');
            $table->string('top');
            $table->string('width');
            $table->string('height');
            $table->string('tag')->nullable();
            $table->integer('content_id')->nullable();
            $table->string('scalex');
            $table->string('scaley');
            $table->longtext('object');
            $table->timestamps();
            $table->foreign('layout_id')->references('layouts')->on('id')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('layout_resources');
    }
}
