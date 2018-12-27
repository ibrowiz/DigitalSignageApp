<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBanksTable extends Migration
{
   
    public function up()
    {
        Schema::create('banks', function (Blueprint $table)  {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('name');
            $table->integer('account_number');
            $table->integer('sort_code');
            $table->timestamps();
            $table->integer('last_updated_by');
            $table->integer('deleted_by');
            $table->integer('created_by');
         });
    }
    public function down()
    {
        Schema::dropIfExists('banks');
    }
}
