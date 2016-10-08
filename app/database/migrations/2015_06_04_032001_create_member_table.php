<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMemberTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('member', function($t) {
            $t->engine ='InnoDB';
            $t->increments('id')->unsigned();
            $t->string('username', 100);
            $t->string('userpassword', 100);
            $t->string('firstname', 100);
            $t->string('lastname', 100);
            $t->string('email', 100);
            $t->string('street', 100);
            $t->string('city', 100);
            $t->string('state', 100)->nullable();
            $t->string('zipcode', 10);
            $t->string('phonenumber', 50);
            $t->string('workingnumber',  50)->nullable();
            $t->string('companyname', 100);
            $t->integer('usertype');
            $t->integer('suspend')->default(0);
            $t->integer('sellrequest')->default(0);
            $t->integer('sellconfirm')->default(0);
            $t->integer('previostype')->default(0);
            $t->string('changeDate', 50);
            $t->integer('country_id')->unsigned();
            $t->foreign('country_id')->references('id')->on('country');
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
        Schema::drop('member');
	}

}
