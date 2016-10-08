<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShoppingCartTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('shopping_cart', function($t) {
			$t->engine ='InnoDB';
			$t->increments('id')->unsigned();
			$t->string('billing_firstname');
			$t->string('billing_lastname');
			$t->string('billing_email');
			$t->string('billing_phone');
			$t->string('billing_address1');
			$t->string('billing_address2');
			$t->string('billing_city');
			$t->string('billing_zip');
			$t->integer('billing_country');

			$t->string('shipping_firstname');
			$t->string('shipping_lastname');
			$t->string('shipping_email');
			$t->string('shipping_phone');
			$t->string('shipping_address1');
			$t->string('shipping_address2');
			$t->string('shipping_city');
			$t->string('shipping_zip');
			$t->integer('shipping_country');
			$t->string('total');
			$t->string('escrowFee');
			$t->string('subTotal');
			$t->string('type');
			$t->string('status');
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
		Schema::drop('shopping_cart');
	}

}
