<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductAdditionalCategoryTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('product_additional_category', function($t) {
			$t->engine ='InnoDB';
			$t->increments('id')->unsigned();
			$t->integer('user_id')->unsigned();
			$t->integer('product_id')->unsigned();
			$t->integer('additional_category_id')->unsigned();
			$t->string('values');
			$t->integer('role')->defalut(0);
			$t->foreign('user_id')->references('id')->on('member')->onUpdate('cascade')->onDelete('cascade');
			$t->foreign('product_id')->references('id')->on('product')->onUpdate('cascade')->onDelete('cascade');
			$t->foreign('additional_category_id')->references('id')->on('additional_category')->onUpdate('cascade')->onDelete('cascade');
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
		Schema::drop('product_additional_category');
	}

}
