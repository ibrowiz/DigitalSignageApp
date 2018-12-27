<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAccountRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('account_roles', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('assignable_id');
            $table->string('assignable_type');
            $table->integer('role_id');
            $table->timestamps();
            $table->foreign('role_id')->references('roles')->on('id')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('account_roles');
    }
}
