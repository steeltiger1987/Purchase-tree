<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShoppingCartProductTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('shopping_cart_product', function($t) {
			$t->engine ='InnoDB';
			$t->increments('id')->unsigned();
			$t->integer('cart_id')->unsigned();
			$t->integer('product_id')->unsigned();
			$t->string('unit')->nullable();
			$t->string('qty')->nullable();
			$t->string('size')->nullable();
			$t->string('color')->nullable();
			$t->string('image_url')->nullable();
			$t->string('product_price')->nullable();
			$t->string('shipping_price')->nullable();
			$t->string('shipping_method')->nullable();
			$t->string('sub_total')->nullable();
			$t->foreign('cart_id')->references('id')->on('shopping_cart')->onUpdate('cascade')->onDelete('cascade');
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
		Schema::drop('shopping_cart_product');
	}

}
