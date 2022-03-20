<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CommentsRating extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments_rating', function(Blueprint $table){
            $table->increments('id');
            $table->integer('fk_user_id')->unsigned();
            $table->string('comments');
            $table->integer('rating');
            $table->string('status');
            $table->timestamp('created_at');
            $table->timestamp('updated_at')->nullable();

        });    
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::Drop('comments_rating');    }
}
