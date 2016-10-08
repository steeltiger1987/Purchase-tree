<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateModifyEmailTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::table('email', function($t) {
            $t->integer('sender_delete')->nullable()->default(0);
            $t->integer('receiver_delete')->nullable()->default(0);
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
        Schema::table('email', function($t) {
            $t->dropColumn('sender_delete');
            $t->dropColumn('receiver_delete');
        });
	}

}
