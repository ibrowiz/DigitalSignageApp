<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTopUpTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('top_up_transactions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('type')->default('cash');
            $table->decimal('amount',25, 2);
            $table->decimal('balance', 25, 2);
            $table->decimal('points',25, 2);
            $table->decimal('point_balance', 25, 2);
            $table->integer('currency_id');
            $table->string('assignable_type');
            $table->integer('assignable_id');
            $table->timestamps();
            $table->foreign('currency_id')->references('id')->on('currencies')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('top_up_transactions');
    }
}
