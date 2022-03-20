<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class OrderWiseShipping extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_wise_shipping', function(Blueprint $table){
            $table->increments('id');
            $table->integer('fk_order_id')->unsigned();
            $table->integer('fk_user_id')->unsigned();
            $table->string('address');
            $table->string('mobile_no');
            $table->timestamp('shipping_date');
            $table->timestamp('delivery_date');
            $table->timestamp('created_at');
            $table->timestamp('updated_at')->nullable();
            $table->integer('fk_city_id')->unsigned();


        });    
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::Drop('order_wise_shipping');
    }
}
