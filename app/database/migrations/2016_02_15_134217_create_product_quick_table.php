<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductQuickTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('product_quick_details', function($t) {
			$t->engine ='InnoDB';
			$t->increments('id')->unsigned();
			$t->integer('user_id')->unsigned();
			$t->integer('product_id')->unsigned();
			$t->string('categoryname');
			$t->text('categorycontent');
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
		Schema::drop('product_quick_details');
	}

}
