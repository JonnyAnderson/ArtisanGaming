<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('games', function (Blueprint $table) {
            $table->increments('id');

            $table->string('title');
            $table->string('full_title');
            $table->string('slug')->unique();

            $table->boolean('include_for_articles')->default(true);
            $table->boolean('include_for_lobbies')->default(true);
            $table->boolean('include_for_maps')->default(true);
            $table->boolean('include_for_tournaments')->default(true);

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
        Schema::drop('games');
    }
}
