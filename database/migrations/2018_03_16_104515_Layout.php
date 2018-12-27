<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Layout extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Layouts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('assignable_type');
            $table->integer('assignable_id'); 
            $table->longtext('screen');
            $table->string('title');
            $table->string('content_type');
            $table->string('category');
            $table->string('orientation');
            $table->string('aspect_ratio');
            $table->string('background_color');
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
         Schema::dropIfExists('Layouts');
    }
}

