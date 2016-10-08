<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateModifyProduct20160506Table extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('product', function($t) {
			$t->string('price_usd1')->nullable()->default(0);
			$t->string('price_usd2')->nullable()->default(0);
			$t->string('price_usd3')->nullable()->default(0);
			$t->string('change_date')->nullable();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('product', function($t) {
			$t->dropColumn('price_usd1');
			$t->dropColumn('price_usd2');
			$t->dropColumn('price_usd3');
			$t->dropColumn('change_date');
		});
	}

}
