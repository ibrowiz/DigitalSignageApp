<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('client_profiles', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
             $table->integer('client_id')->unsigned()->index();
            $table->string('phone');
            $table->string('contact_person')->nullable();
            $table->string('contact_email');
            $table->text('address')->nullable();
            $table->integer('location_id')->nullable();
            $table->integer('country_id')->nullable();
            $table->string('logo')->nullable();
            $table->integer('updated_by')->nullable();
            $table->timestamps();

            $table->foreign('client_id')->references('id')->on('clients')->onDelete('cascade')->onUpdate('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('client_profiles');
    }
}
