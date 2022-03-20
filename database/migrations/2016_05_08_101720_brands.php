<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Brands extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('brands', function(Blueprint $table){
            $table->increments('id');
            $table->string('Brand_name');
            $table->tinyInteger('status');
            $table->timestamp('created_at');
            $table->timestamp('updated_at')->nullable();
            $table->string('featured_image');

        });     }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::Drop('brands');    }
}
