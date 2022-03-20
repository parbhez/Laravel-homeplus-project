<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class OrderDetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_details', function(Blueprint $table){
            $table->increments('id');
            $table->integer('fk_order_id')->unsigned();
            $table->integer('fk_product_id')->unsigned();
            $table->integer('fk_product_wise_size_id')->unsigned();
            $table->integer('fk_product_wise_color_id')->unsigned();
            $table->integer('price');
            $table->integer('discount');

        });    
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::Drop('order_details');
    }
}
