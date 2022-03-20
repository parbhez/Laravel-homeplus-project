<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Specification extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('specification', function(Blueprint $table){
            $table->increments('id');
            $table->string('title_name_lng1');
            $table->string('title_name_lng2');
            $table->tinyInteger('status');
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
        Schema::Drop('specification');    
    }
}
