<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmailTableTemplate extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('emailtemplate', function($t) {
            $t->engine ='InnoDB';
            $t->increments('id')->unsigned();
            $t->longtext('title', 100);
            $t->longtext('content', 100);
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
        Schema::drop('emailtemplate');
	}

}
