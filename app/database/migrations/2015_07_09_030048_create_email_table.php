<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmailTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('email', function($t) {
            $t->engine = 'InnoDB';
            $t->increments('id')->unsigned();
            $t->integer('sender_id')->unsigned();
            $t->integer('receiver_id')->unsigned();
            $t->longText('subject');
            $t->longText('content');
            $t->integer('sender_red');
            $t->integer('receiver_red');
            $t->integer('parent')->nullable();
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
        Schema::drop('email');
	}

}
