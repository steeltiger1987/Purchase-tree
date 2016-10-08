<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateModifySellerQuote813Table extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::table('seller_quote', function($t) {
            $t->string('accept')->nullable()->default(0);
            $t->string('accept_status')->nullable()->default(0);
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
        Schema::table('seller_quote', function($t) {
            $t->dropColumn('accept');
            $t->dropColumn('accept_status');
        });
	}

}
