<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLobbiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lobbies', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->string('game_slug');
            $table->foreign('game_slug')->references('slug')->on('games')->onDelete('cascade');

            $table->timestamp('scheduled_time');
            $table->timestamp('end_time');

            $table->string('title');
            $table->text('description');
            $table->integer('slots_available')->unsigned();

            $table->enum('security', ['open', 'request', 'password'])->default('open');
            $table->string('password')->nullable();

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
        Schema::drop('lobbies');
    }
}
