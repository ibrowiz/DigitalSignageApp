<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class LayoutTemplate extends Migration
{
    
    public function up()
    {
        Schema::create('layout_templates', function (Blueprint $table) {
            $table->increments('id');
            $table->string('file_name');
            $table->string('category');
            $table->longtext('layout');
            $table->longtext('image');
            $table->string('type');
            $table->string('orientation');
            $table->timestamps();
            $table->integer('last_updated_by');
            $table->integer('deleted_by');
            $table->integer('created_by');
        });
    }

  
    public function down()
    {
        Schema::dropIfExists('layout_templates');
    }
}
