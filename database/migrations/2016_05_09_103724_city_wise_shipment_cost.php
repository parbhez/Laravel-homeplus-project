<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CityWiseShipmentCost extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('city_wise_shipment_cost', function(Blueprint $table){
            $table->increments('id');
            $table->integer('fk_city_id')->unsigned();
            $table->integer('cost_amount')->unsigned();
        });    
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::Drop('city_wise_shipment_cost');
    }
}
