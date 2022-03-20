<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class IncomeExpenseHead extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('income_expense_head', function(Blueprint $table){
            $table->increments('id');
            $table->string('title_lng1');
            $table->string('title_lng2');
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
        Schema::Drop('income_expense_head');
    }
}
