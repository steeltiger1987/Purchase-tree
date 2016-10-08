<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEscrowDisputeTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('escrow_dispute', function($t) {
            $t->engine = 'InnoDB';
            $t->increments('id')->unsigned();
            $t->integer('escrow_table_id')->unsigned();
            $t->string('escrow_id',50);
            $t->string('title');
            $t->longText('content');
            $t->integer('escrow_user_id');
            $t->timestamps();
            $t->foreign('escrow_table_id')->references('id')->on('escrow_escrow')->onUpdate('cascade')->onDelete('cascade');
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
        Schema::drop('escrow_dispute');
	}

}
