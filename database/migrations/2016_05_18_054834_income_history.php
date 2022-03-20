<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class IncomeHistory extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('income_history', function(Blueprint $table){
            $table->increments('id');
            $table->integer('fk_income_expense_head_id')->unsigned();
            $table->string('comments');
            $table->integer('amount');
            $table->timestamp('created_at');
            $table->timestamp('updated_at')->nullable();
            $table->timestamp('transection_date');
            $table->integer('created_by');
            $table->integer('updated_by')->nullable();

        }); 
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::Drop('income_history');
    }
}
