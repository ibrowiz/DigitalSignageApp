<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class LayoutContent extends Migration
{
    
    public function up()
    {
        Schema::create('layout_contents', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('lay_id');
            $table->integer('cont_id');
            $table->integer('lay_resource_id');
            $table->timestamps();
            $table->foreign('lay_id')->references('id')->on('layouts')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('cont_id')->references('id')->on('contents')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('lay_resource_id')->references('id')->on('layout_resources')->onUpdate('cascade')->onDelete('cascade');
            
        });
    }

    public function down()
    {
        Schema::dropIfExists('layout_contents');
    }
}
