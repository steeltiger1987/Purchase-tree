<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHelpcreateTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('help', function($t) {
            $t->engine = 'InnoDB';
            $t->increments('id')->unsigned();
            $t->integer('category_id')->unsigned();
            $t->integer('subcategory_id')->unsigned();
            $t->text('title');
            $t->longText('content');
            $t->foreign('category_id')->references('id')->on('helpcategory')->onUpdate('cascade')->onDelete('cascade');
            $t->foreign('subcategory_id')->references('id')->on('helpsubcategory')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::drop('help');
	}

}
