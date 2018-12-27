<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWalletLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wallet_logs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('wallet_id')->unsigned()->index();
            $table->string('action');
            $table->integer('transaction_id')->unsigned()->index();
            $table->enum('type', ['cash', 'point', 'bonus']);
            $table->decimal('amount', 25,2);
            $table->string('status');
            $table->json('wallet_worth');
            $table->integer('last_wallet_log')->index()->unsigned()->nullable();
            $table->json('operation');
            $table->timestamps();
            $table->integer('wallet_id')->unsigned()->index();
             $table->foreign('wallet_id')->references('id')->on('wallets')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('last_wallet_log')->references('id')->on('wallet_logs')->onDelete('set null')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('wallet_logs');
    }
}
