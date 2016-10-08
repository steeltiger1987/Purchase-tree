<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdminUserTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('admin', function($t) {
            $t->engine ='InnoDB';
            $t->increments('id')->unsigned();
            $t->string('AdminUserName', 100);
            $t->string('AdminUserPassword', 100);
            $t->boolean('is_active')->default(1);
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
        Schema::drop('admin');
	}

}
