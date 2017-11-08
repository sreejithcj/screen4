<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class HomePageCategories extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('home_page_categories', function (Blueprint $table) {
         $table->increments('id');
         $table->integer('categoryId');
         $table->integer('order')->unique();
         $table->timestamps();
         $table->foreign('categoryId')
            ->references('id')->on('categories')
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
