<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuickDetailsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('quick_details', function($t) {
			$t->engine = 'InnoDB';
			$t->increments('id')->unsigned();
			$t->integer('category_id')->unsigned();
			$t->string('quick_details_name');
			$t->string('quick_details_sub')->nullable();
			$t->foreign('category_id')->references('id')->on('categories')->onUpdate('cascade')->onDelete('cascade');
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
		Schema::drop('quick_details');
	}

}
