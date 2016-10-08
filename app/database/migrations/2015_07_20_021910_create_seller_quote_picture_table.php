<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSellerQuotePictureTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('seller_quote_picture', function($t) {
            $t->engine = 'InnoDB';
            $t->increments('id')->unsigned();
            $t->integer('quote_id')->unsigned();
            $t->integer('rfq_id')->unsigned();
            $t->integer('buyer_id')->unsigned();
            $t->integer('seller_id')->unsigned();
            $t->string('picture_url',128);
            $t->foreign('quote_id')->references('id')->on('seller_quote')->onUpdate('cascade')->onDelete('cascade');
            $t->foreign('rfq_id')->references('id')->on('rfq')->onUpdate('cascade')->onDelete('cascade');
            $t->foreign('buyer_id')->references('id')->on('member')->onUpdate('cascade')->onDelete('cascade');
            $t->foreign('seller_id')->references('id')->on('member')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::drop('seller_quote_picture');
	}

}
