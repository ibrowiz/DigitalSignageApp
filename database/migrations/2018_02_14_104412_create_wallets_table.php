<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWalletsTable extends Migration
{

     public function up()
    {
        Schema::create('wallets', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('tenant_profile_id');
            $table->integer('currency_id')->index()->unsigned();
            $table->decimal('cash', 25, 2);
            $table->decimal('point', 30, 2);
            $table->decimal('bonus', 30, 2);
            $table->boolean('bonus_flag')->default(1);
            $table->boolean('point_flag')->default(1);
            $table->timestamps();

            $table->foreign('currency_id')->references('id')->on('currencies')->onDelete('cascade')->onUpdate('cascade');

            $table->foreign('tenant_profile_id')->references('id')->on('tenant_profiles')->onDelete('cascade')->onUpdate('cascade');

        });
    }

   
    public function down()
    {
       Schema::drop('wallets');
    }
}
