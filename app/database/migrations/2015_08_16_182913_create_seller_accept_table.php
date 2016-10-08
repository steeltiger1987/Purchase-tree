<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSellerAcceptTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{

        Schema::create('seller_accept', function($t) {
            $t->engine = 'InnoDB';
            $t->increments('id')->unsigned();
            $t->integer('rfq_id')->unsigned();
            $t->integer('quote_id')->unsigned();
            $t->integer('seller_id')->unsigned();
            $t->integer('buyer_id')->unsigned();
            $t->string('buyer_address',255);
            $t->string('buyer_city',255);
            $t->string('buyer_state',100)->nullable();
            $t->string('buyer_zip',45);
            $t->string('buyer_country',45);
            $t->string('invoice_number',45);
            $t->string('invoice_date',45);
            $t->string('escrow_no',45)->nullable();
            $t->string('trackingnumber1',100)->nullable();
            $t->string('trackingnumber2',100)->nullable();
            $t->string('tracking_date',255)->nullable();
            $t->foreign('rfq_id')->references('id')->on('rfq')->onUpdate('cascade')->onDelete('cascade');
            $t->foreign('quote_id')->references('id')->on('seller_quote')->onUpdate('cascade')->onDelete('cascade');
            $t->foreign('seller_id')->references('id')->on('member')->onUpdate('cascade')->onDelete('cascade');
            $t->foreign('buyer_id')->references('id')->on('member')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::drop('seller_accept');
	}

}
