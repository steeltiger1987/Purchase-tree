<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateModifyProductTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::table('product', function($t) {
            $t->string('min_order_unit')->nullable()->default(0);
            $t->string('supply_ability_unit')->nullable()->default(0);
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
            $t->dropColumn('min_order_unit');
            $t->dropColumn('supply_ability_unit');
        });
	}
}
