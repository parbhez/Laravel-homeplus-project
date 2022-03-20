<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ProductWiseTags extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_wise_tags', function(Blueprint $table){
            $table->increments('id');
            $table->integer('fk_product_id')->unsigned();
            $table->integer('fk_tag_id')->unsigned();
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
        Schema::Drop('product_wise_tags');
    }
}
