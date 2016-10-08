<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShoppingCartDescriptionTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('shopping_cart_description', function($t) {
			$t->engine = 'InnoDB';
			$t->increments('id')->unsigned();
			$t->string('title');
			$t->longtext('description');
			$t->longtext('add1')->nullable();
			$t->longtext('add2')->nullable();
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
		Schema::drop('shopping_cart_description');
	}

}
