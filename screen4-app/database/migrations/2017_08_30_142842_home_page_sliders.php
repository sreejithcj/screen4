<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class HomePageSliders extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('home_page_sliders', function (Blueprint $table) {
         $table->increments('id');
         $table->integer('videoId');
         $table->integer('order')->unique();
         $table->timestamps();
         $table->foreign('videoId')
            ->references('id')->on('videos')
            ->onDelete('cascade');
     });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
