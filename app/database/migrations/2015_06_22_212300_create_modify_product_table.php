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
            $t->string('min_order')->nullable()->default(0);
            $t->string('supply_ability')->nullable()->default(0);
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
            $t->dropColumn('min_order');
            $t->dropColumn('supply_ability');
        });
	}

}
