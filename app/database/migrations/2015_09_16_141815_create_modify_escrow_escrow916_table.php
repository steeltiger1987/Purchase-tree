<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateModifyEscrowEscrow916Table extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::table('escrow_escrow', function($t) {
            $t->string('total',45)->nullable()->default(0);
            $t->string('type',20)->nullable();
            $t->string('invoice_number',250)->nullable();
            $t->string('transaction_id',250)->nullable();
            $t->string('avs_response',250)->nullable();
            $t->string('cvv_response',250)->nullable();
            $t->string('bank_info',250)->nullable();
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
            $t->dropColumn('total');
            $t->dropColumn('type');
            $t->dropColumn('invoice_number');
            $t->dropColumn('transaction_id');
            $t->dropColumn('avs_response');
            $t->dropColumn('cvv_response');
            $t->dropColumn('bank_info');
        });
	}

}
