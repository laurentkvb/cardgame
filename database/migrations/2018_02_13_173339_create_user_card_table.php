<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserCardTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {   // added S to user_card 
        Schema::create('user_cards', function (Blueprint $table) {
        $table->engine = 'InnoDB';
        $table->increments('id');

        $table->integer('user_id')->unsigned();
        $table->integer('card_id')->unsigned();

        $table->foreign('user_id')->references('id')->on('users');
        $table->foreign('card_id')->references('id')->on('cards');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_card');
    }
}
