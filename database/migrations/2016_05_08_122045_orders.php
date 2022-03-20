<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Orders extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function(Blueprint $table){
            $table->increments('id');
            $table->integer('fk_user_id')->unsigned();
            $table->integer('invoice_no')->unsigned();
            $table->integer('total_amount')->unsigned();
            $table->integer('payable')->unsigned();
            $table->timestamp('created_at');
            $table->integer('paid')->unsigned();
            $table->timestamp('payment_date');
            $table->string('payment_way');
            $table->timestamp('order_date');
            $table->integer('discount')->unsigned();
            $table->tinyInteger('status')->comment('pending,approved,shipment');  

        });    
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::Drop('orders');
    }
}
