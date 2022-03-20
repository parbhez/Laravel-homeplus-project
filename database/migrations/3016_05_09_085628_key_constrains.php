<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class KeyConstrains extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('orders', function ($table) {
        $table->foreign('fk_user_id')->references('id')->on('users');
        }); 

        Schema::table('order_details', function ($table) {
        $table->foreign('fk_order_id')->references('id')->on('orders');
        $table->foreign('fk_product_id')->references('id')->on('products');
        $table->foreign('fk_product_wise_size_id')->references('id')->on('product_wise_size');
        $table->foreign('fk_product_wise_color_id')->references('id')->on('product_wise_color');
        });


        Schema::table('order_wise_shipping', function ($table) {
        $table->foreign('fk_order_id')->references('id')->on('orders');
        $table->foreign('fk_user_id')->references('id')->on('users');
        $table->foreign('fk_city_id')->references('id')->on('cities');
        }); 

        Schema::table('products', function ($table) {
        $table->foreign('fk_category_id')->references('id')->on('categories');
        $table->foreign('fk_sub_category_id')->references('id')->on('sub_categories');
        $table->foreign('fk_sub_category_details_id')->references('id')->on('sub_categories_details');
        $table->foreign('fk_brand_id')->references('id')->on('brands');
        }); 

        Schema::table('product_wise_color', function ($table) {
        $table->foreign('fk_product_id')->references('id')->on('products');
        $table->foreign('fk_color_id')->references('id')->on('colors');
        }); 

        Schema::table('product_wise_image', function ($table) {
        $table->foreign('fk_product_id')->references('id')->on('products');
        });

        Schema::table('product_wise_size', function ($table) {
        $table->foreign('fk_product_id')->references('id')->on('products');
        $table->foreign('fk_size_id')->references('id')->on('sizes');
        });

        Schema::table('product_wise_specification', function ($table) {
        $table->foreign('fk_product_id')->references('id')->on('products');
        $table->foreign('fk_specification_id')->references('id')->on('specification');
        });

        Schema::table('product_wise_tags', function ($table) {
        $table->foreign('fk_product_id')->references('id')->on('products');
        $table->foreign('fk_tag_id')->references('id')->on('tags');
        });

        Schema::table('sub_categories', function ($table) {
        $table->foreign('fk_category_id')->references('id')->on('categories');
        });
        
        Schema::table('sub_categories_details', function ($table) {
        $table->foreign('fk_sub_category_id')->references('id')->on('sub_categories');
        });

        Schema::table('city_wise_shipment_cost', function ($table) {
        $table->foreign('fk_city_id')->references('id')->on('cities');
        });

        Schema::table('income_history', function ($table) {
        $table->foreign('fk_income_expense_head_id')->references('id')->on('income_expense_head');
        });
        
        Schema::table('expense_history', function ($table) {
        $table->foreign('fk_income_expense_head_id')->references('id')->on('income_expense_head');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
