<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TemplateContentPivot extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('template_content', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('template_id')->unsigned()->index();
            $table->integer('content_id')->unsigned()->index();
            $table->boolean('status');
            $table->timestamps();
            $table->foreign('template_id')->references('id')->on('templates')->onUpdate('cascade')->onDelete('cascade');
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
      Schema::dropIfExists('templatecontentpivot');
    
    }
}
