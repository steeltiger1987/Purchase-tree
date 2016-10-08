<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateModifyEscrowEscrow28Table extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::table('escrow_escrow', function($t) {
            $t->string('escrowDate',45)->nullable();
            $t->string('approvedDate',45)->nullable();
            $t->string('cancelDate',45)->nullable();
            $t->string('disputedDate',45)->nullable();
            $t->string('confirmDate',45)->nullable();
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
        Schema::table('escrow_escrow', function($t) {
            $t->dropColumn('escrowDate');
            $t->dropColumn('approvedDate');
            $t->dropColumn('cancelDate');
            $t->dropColumn('disputedDate');
            $t->dropColumn('confirmDate');
        });
	}

}
