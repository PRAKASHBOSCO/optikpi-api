<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     * @author Prakash.j <prakash.j@digient.in>
     */
    public function up()
    {
        if (!Schema::hasTable('user')) {
            Schema::create('user', function($table){
                   $table->engine = 'InnoDB';
                   $table->increments('USER_ID');
                   $table->string('APP_ID', 10);
                   $table->string('APP_KEY', 10);
                   $table->string('CALL_BACK_URL', 255)->nullable();
                   $table->integer('STATUS')->default(1);
                   $table->unique('APP_ID');
                   $table->dateTime('CREATED_DATE');
                   $table->dateTime('UPDATED_DATE');
           });
       }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     * @author Prakash.j <prakash.j@digient.in>
     */
    public function down()
    {
        Schema::dropIfExists('user');
    }
}
