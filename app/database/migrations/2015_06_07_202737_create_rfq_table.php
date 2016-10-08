<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRfqTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('rfq', function($t) {
            $t->engine ='InnoDB';
            $t->increments('id')->unsigned();
            $t->integer('buyer_id')->unsigned();
            $t->integer('rfq_unit')->unsigned();
            $t->string('rfq_title', 255);
            $t->longText('rfq_description');
            $t->integer('rfq_quantity');
            $t->string('rfq_unitprice', 45);
            $t->integer('rfq_itemunit');
            $t->string('rfq_type', 45);
            $t->integer('rfq_approve')->default(0);
            $t->foreign('rfq_unit')->references('id')->on('unit');
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
        Schema::drop('rfq');
	}

}
