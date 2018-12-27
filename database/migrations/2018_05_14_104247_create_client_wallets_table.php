<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientWalletsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('client_wallets', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('client_profile_id')->unsigned()->index();
            $table->integer('currency_id')->index()->unsigned();
            $table->decimal('cash', 25, 2);
            $table->decimal('point', 30, 2);
            $table->decimal('bonus', 30, 2);
            $table->boolean('bonus_flag')->default(1);
            $table->boolean('point_flag')->default(1);
            $table->timestamps();

            $table->foreign('currency_id')->references('id')->on('currencies')->onDelete('cascade')->onUpdate('cascade');

            $table->foreign('client_profile_id')->references('id')->on('client_profiles')->onDelete('cascade')->onUpdate('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('client_wallets');
    }
}
