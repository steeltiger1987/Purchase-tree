<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCurrencyTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('currency', function($t) {
            $t->engine ='InnoDB';
            $t->increments('id')->unsigned();
            $t->string('currency_symbol', 100);
            $t->string('currency_name', 100);
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
        Schema::drop('currency');
	}

}
