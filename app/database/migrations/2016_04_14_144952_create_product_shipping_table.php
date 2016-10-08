<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductShippingTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('product_shipping', function($t) {
			$t->engine = 'InnoDB';
			$t->increments('id')->unsigned();
			$t->integer('user_id')->unsigned();
			$t->integer('product_id')->unsigned();

			$t->string('shipping_type1')->nullable();
			$t->string('shipping_type2')->nullable();
			$t->string('shipping_type3')->nullable();

			$t->string('flat_rate1')->nullable();
			$t->string('flat_rate2')->nullable();
			$t->string('flat_rate3')->nullable();

			$t->string('estimated_time1')->nullable();
			$t->string('estimated_time2')->nullable();
			$t->string('estimated_time3')->nullable();

			$t->string('add1')->nullable();
			$t->string('add2')->nullable();
			$t->string('add3')->nullable();

			$t->foreign('user_id')->references('id')->on('member')->onUpdate('cascade')->onDelete('cascade');
			$t->foreign('product_id')->references('id')->on('product')->onUpdate('cascade')->onDelete('cascade');
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
		Schema::drop('product_shipping');
	}

}
