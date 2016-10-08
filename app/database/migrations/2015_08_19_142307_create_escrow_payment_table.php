<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEscrowPaymentTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('escrow_payment', function($t) {
            $t->engine = 'InnoDB';
            $t->increments('id')->unsigned();
            $t->string('escrow_id',50);
            $t->integer('quote_id');
            $t->string('total',45);
            $t->string('type',20);
            $t->string('invoice_number',250)->nullable();
            $t->string('transaction_id',250)->nullable();
            $t->string('avs_response',250)->nullable();
            $t->string('cvv_response',250)->nullable();
            $t->string('bank_info',250)->nullable();
            $t->timestamps();
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
        Schema::drop('escrow_payment');
	}

}
