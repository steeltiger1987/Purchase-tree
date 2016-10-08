<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEscrowMessageTemplateTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('escrow_message_template', function($t) {
            $t->engine = 'InnoDB';
            $t->increments('id')->unsigned();
            $t->text('title', 50);
            $t->longText('content');
            $t->string('type', 10);
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
        Schema::drop('escrow_message_template');
	}

}
