<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostproductTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('product', function($t) {
            $t->engine = 'InnoDB';
            $t->increments('id')->unsigned();
            $t->integer('user_id')->unsigned();
            $t->integer('category_id')->unsigned();
            $t->integer('subcategory_id')->unsigned();
            $t->string('product_name', 255);
            $t->longText('product_description');
            $t->string('meta', 255);
            $t->string('product_price1', 100);
            $t->integer('price1_currency');
            $t->string('product_price2', 100);
            $t->integer('price2_currency');
            $t->string('product_price3', 100);
            $t->integer('price3_currency');
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
        Schema::drop('product');
	}

}
