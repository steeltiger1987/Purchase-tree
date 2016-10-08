<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEscrowEscrowTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('escrow_escrow', function($t) {
            $t->engine = 'InnoDB';
            $t->increments('id')->unsigned();
            $t->string('escrow_id',45);
            $t->integer('quote_id')->unsigned();
            $t->integer('seller_id')->unsigned();
            $t->integer('buyer_id')->unsigned();
            $t->longText('item');
            $t->string('price',250);
            $t->string('status',250);
            $t->string('date',250);
            $t->integer('confirm');
            $t->timestamps();
            $t->foreign('seller_id')->references('id')->on('escrow_users')->onUpdate('cascade')->onDelete('cascade');
            $t->foreign('buyer_id')->references('id')->on('escrow_users')->onUpdate('cascade')->onDelete('cascade');
            $t->foreign('quote_id')->references('id')->on('seller_quote')->onUpdate('cascade')->onDelete('cascade');
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
        Schema::drop('escrow_escrow');
	}

}
