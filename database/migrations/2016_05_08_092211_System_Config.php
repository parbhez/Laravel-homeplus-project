<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SystemConfig extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('system_config', function(Blueprint $table){
            $table->increments('id');
            $table->string('company_name');
            $table->string('address');
            $table->string('mobile_no');
            $table->string('logo');
            $table->string('currency');
            $table->timestamp('created_at');
            $table->timestamp('updated_at')->nullable();
            $table->string('slogun');
            $table->string('time_zone');
            $table->string('Default_lang');
            $table->tinyInteger('installation_status');


        });  
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::Drop('system_config');
    }
}
