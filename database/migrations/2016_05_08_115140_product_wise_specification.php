<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ProductWiseSpecification extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_wise_specification', function(Blueprint $table){
            $table->increments('id');
            $table->integer('fk_product_id')->unsigned();
            $table->integer('fk_specification_id')->unsigned();
            $table->string('details');
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
        Schema::Drop('product_wise_specification');    
    }
}
