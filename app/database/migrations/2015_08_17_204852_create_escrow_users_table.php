<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEscrowUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('escrow_users', function($t) {
            $t->engine = 'InnoDB';
            $t->increments('id')->unsigned();
            $t->integer('purchasetree_id')->unsigned();
            $t->string('username',255);
            $t->string('userpass',255);
            $t->string('userfullname',255)->nullable();
            $t->string('useremail',255);
            $t->string('userbusiness',255)->nullable();
            $t->string('useraddress1',255);
            $t->string('useraddress2',255);
            $t->string('usercity',255);
            $t->string('userstate',255);
            $t->string('userzip',255);
            $t->integer('usercountry');
            $t->string('paymentaccepttype',255)->nullable();
            $t->string('registrationdate',255);
            $t->foreign('purchasetree_id')->references('id')->on('member')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::drop('escrow_users');
	}

}
