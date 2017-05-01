<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMapsPreviewImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('map_preview_images', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();

            $table->integer('map_id')->unsigned();
            $table->foreign('map_id')->references('id')->on('maps')->onDelete('cascade');

            $table->string('path');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('map_preview_images');
    }
}
