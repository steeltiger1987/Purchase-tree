<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateModifyCompanyprofileTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::table('companyprofiles', function($t) {
            $t->string('companycity', 100);
            $t->string('companystate', 100)->nullable();
            $t->integer('companycountry')->nullable()->default(0);
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
        Schema::table('companyprofiles', function($t) {
            $t->dropColumn('companycity');
            $t->dropColumn('companystate');
            $t->dropColumn('companycountry');
        });
	}

}
