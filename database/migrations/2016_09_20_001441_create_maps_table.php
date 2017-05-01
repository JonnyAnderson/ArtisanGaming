<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMapsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('maps', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();

            $table->string('title');
            $table->string('slug');
            $table->text('brief');
            $table->text('description');
            $table->string('download_url');

            $table->boolean('featured')->default(false);
            $table->enum('status', ['published','hidden'])->default('hidden');

            $table->string('game_slug');
            $table->foreign('game_slug')->references('slug')->on('games')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('maps');
    }
}
