<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SubCategoriesDetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub_categories_details', function(Blueprint $table){
            $table->increments('id');
            $table->integer('fk_sub_category_id')->unsigned();
            $table->string('sub_category_details_lng1');
            $table->string('sub_category_details_lng2');
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
        Schema::Drop('sub_categories_details');
    }
}
