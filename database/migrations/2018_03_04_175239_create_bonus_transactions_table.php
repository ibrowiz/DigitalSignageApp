<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBonusTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bonus_transactions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('type')->default('bonus');
            $table->string('amount');
            $table->string('assignable_type');
            $table->integer('assignable_id');
            $table->timestamps();
            
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bonus_transactions');
    }
}
