<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRfqPictureTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('rfq_picture', function($t) {
            $t->engine ='InnoDB';
            $t->increments('id')->unsigned();
            $t->integer('rfq_id')->unsigned();
            $t->integer('buyer_id')->unsigned();
            $t->string('picture_url', 100);
            $t->foreign('rfq_id')->references('id')->on('rfq')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::drop('rfq_picture');
    }

}
