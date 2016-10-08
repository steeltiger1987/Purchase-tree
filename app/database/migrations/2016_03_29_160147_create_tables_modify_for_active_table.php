<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablesModifyForActiveTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('product', function($t) {
			$t->integer('admin_active')->nullable()->default(0);
		});
		Schema::table('member', function($t) {
			$t->integer('admin_active')->nullable()->default(0);
		});
		Schema::table('rfq', function($t) {
			$t->integer('admin_active')->nullable()->default(0);
		});
		Schema::table('seller_quote', function($t) {
			$t->integer('admin_active')->nullable()->default(0);
		});
		Schema::table('escrow_users', function($t) {
			$t->integer('admin_active')->nullable()->default(0);
		});
		Schema::table('escrow_escrow', function($t) {
			$t->integer('admin_active')->nullable()->default(0);
		});
		Schema::table('escrow_dispute', function($t) {
			$t->integer('admin_active')->nullable()->default(0);
		});
		Schema::table('email', function($t) {
			$t->integer('admin_active')->nullable()->default(0);
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
			$t->dropColumn('admin_active');
		});
		Schema::table('member', function($t) {
			$t->dropColumn('admin_active');
		});
		Schema::table('rfq', function($t) {
			$t->dropColumn('admin_active');
		});
		Schema::table('seller_quote', function($t) {
			$t->dropColumn('admin_active');
		});
		Schema::table('escrow_users', function($t) {
			$t->dropColumn('admin_active');
		});
		Schema::table('escrow_escrow', function($t) {
			$t->dropColumn('admin_active');
		});
		Schema::table('escrow_dispute', function($t) {
			$t->dropColumn('admin_active');
		});
		Schema::table('email', function($t) {
			$t->dropColumn('admin_active');
		});
	}

}
