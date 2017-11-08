<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Videos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('videos', function (Blueprint $table) {
         $table->increments('id');
         $table->string('title');
         $table->string('brief');
         $table->string('duration');
         $table->date('year');
         $table->string('url');
         $table->string('image');
         $table->integer('genreId');
         $table->integer('categoryId');
         $table->integer('userId');
         $table->timestamps();
         $table->foreign('genreId')
            ->references('id')->on('genres');
         $table->foreign('categoryId')
            ->references('id')->on('categories');
         $table->foreign('userId')
            ->references('id')->on('users');
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
