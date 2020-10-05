<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TransactionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     * @author Prakash.j <prakash.j@digient.in>
     */
    public function up()
    {
        if (!Schema::hasTable('transaction')) {
            Schema::create('transaction', function($table){
                   $table->engine = 'InnoDB';
                   $table->increments('ID');
                   $table->string('TRANSACTION_ID', 100);
                   $table->string('BONUS_ID', 100);
                   $table->integer('PLAYER_ID');
                   $table->integer('STATUS')->default(1);
                   $table->string('RESPONSE_DATA', 255);
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
        Schema::dropIfExists('transaction');
    }
}
