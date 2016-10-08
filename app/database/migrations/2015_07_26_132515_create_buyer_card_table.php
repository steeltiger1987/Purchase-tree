<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBuyerCardTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('buyer_card', function($t) {
            $t->engine = 'InnoDB';
            $t->increments('id')->unsigned();
            $t->integer('quote_id')->unsigned();
            $t->string('card_number',100)->nullable();
            $t->string('card_month',100)->nullable();
            $t->string('card_year',100)->nullable();
            $t->string('total_payment',100)->nullable();
            $t->string('card_address',100)->nullable();
            $t->string('card_zip',100)->nullable();
            $t->string('card_email',100)->nullable();
            $t->string('card_cvv',100)->nullable();
            $t->string('invoice_number',100)->nullable();
            $t->string('transaction_id',100)->nullable();
            $t->string('avs_response',100)->nullable();
            $t->string('cvv_response',100)->nullable();
            $t->foreign('quote_id')->references('id')->on('seller_quote')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::drop('buyer_card');
	}

}
