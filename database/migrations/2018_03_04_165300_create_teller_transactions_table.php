<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTellerTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teller_transactions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('type')->default('teller');
            $table->integer('currency_id')->index()->unsigned();
             $table->string('assignable_type');
            $table->integer('assignable_id');
           /* $table->string('user_name');
            $table->string('user_type')->nullable();*/
            $table->string('amount')->default(0);
            $table->string('image_path')->nullable();
            $table->string('image_name')->nullable();
            $table->enum('status', ['approved', 'declined']);
            $table->boolean('approval_revert_status')->default(0);
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
        Schema::dropIfExists('teller_transactions');
    }
}
