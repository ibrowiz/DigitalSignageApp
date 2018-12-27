<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBillingTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('billing_transactions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('type')->default('billing');
            $table->integer('schedule_id');
            $table->string('amount');
            $table->string('assignable_type');
            $table->integer('assignable_id');
            $table->boolean('confirmed')->default(0);
            $table->timestamps();
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('billing_transactions');
    }
}
