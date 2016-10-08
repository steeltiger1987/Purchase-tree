<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsercategoryTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('usercategory', function($t) {
            $t->engine = 'InnoDB';
            $t->increments('id')->unsigned();
            $t->integer('user_id')->unsigned();
            $t->integer('category_id')->unsigned();
            $t->integer('subcategory_id')->unsigned();
            $t->foreign('user_id')->references('id')->on('member')->onUpdate('cascade')->onDelete('cascade');
            $t->foreign('category_id')->references('id')->on('categories')->onUpdate('cascade')->onDelete('cascade');
            $t->foreign('subcategory_id')->references('id')->on('subcategory')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::drop('usercategory');
	}

}
