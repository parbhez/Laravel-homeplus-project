<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ProductWiseColor extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_wise_color', function(Blueprint $table){
            $table->increments('id');
            $table->integer('fk_product_id')->unsigned();
            $table->integer('fk_color_id')->unsigned();

        });    
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::Drop('product_wise_color');    
    }
}
