<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubcategoryTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('subcategory', function($t) {
            $t->engine ='InnoDB';
            $t->increments('id')->unsigned();
            $t->integer('category_id')->unsigned();
            $t->string('subcategoryname', 100);
            $t->timestamps();
            $t->foreign('category_id')->references('id')->on('categories')->onUpdate('cascade')->onDelete('cascade');
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
        Schema::drop('subcategory');
	}

}
