<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Products extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('products', function(Blueprint $table){
            $table->increments('id');
            $table->integer('fk_category_id')->unsigned();
            $table->integer('fk_sub_category_id')->unsigned();
            $table->integer('fk_sub_category_details_id')->unsigned();
            $table->integer('fk_brand_id')->unsigned();
            $table->string('features_lng1');
            $table->string('features_lng2');
            $table->string('supports_lng1');
            $table->string('supports_lng2');
            $table->integer('discount');
            $table->string('product_name_lng1');
            $table->string('product_name_lng2');
            $table->string('title_lng1');
            $table->string('title_lng2');
            $table->integer('available');

        });   
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::Drop('products');
    }
}
