<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRfqEmailTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('rfq_email', function($t) {
            $t->engine = 'InnoDB';
            $t->increments('id')->unsigned();
            $t->integer('rfq_id')->unsigned();
            $t->integer('quote_id')->unsigned();
            $t->integer('sender_id')->unsigned();
            $t->integer('receiver_id')->unsigned();
            $t->longText('subject');
            $t->longText('message');
            $t->integer('sender_red');
            $t->integer('receiver_red');
            $t->foreign('rfq_id')->references('id')->on('rfq')->onUpdate('cascade')->onDelete('cascade');
            $t->foreign('quote_id')->references('id')->on('seller_quote')->onUpdate('cascade')->onDelete('cascade');
            $t->foreign('sender_id')->references('id')->on('member')->onUpdate('cascade')->onDelete('cascade');
            $t->foreign('receiver_id')->references('id')->on('member')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::drop('rfq_email');
	}

}
