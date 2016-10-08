<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompanyprofilesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('companyprofiles', function($t) {
            $t->engine ='InnoDB';
            $t->increments('id')->unsigned();
            $t->integer('user_id')->unsigned();
            $t->string('companyname', 100);
            $t->string('companyaddress', 150);
            $t->string('companyphonenumber', 45)->nullable();
            $t->string('companyfax', 45)->nullable();
            $t->string('companylogo', 45)->nullable();
            $t->integer('busineestype');
            $t->string('categories', 100);
            $t->integer('mainforcus');
            $t->string('companyyoutube', 150);
            $t->longText('companydescription');
            $t->integer('companyyear');
            $t->string('ceoownername', 100);
            $t->integer('factorysize');
            $t->string('factorylocation', 100);
            $t->string('qa_qc',  100);
            $t->integer('employees');
            $t->string('marketingpicture', 150);
            $t->string('marketingvideo', 150);
            $t->foreign('user_id')->references('id')->on('member')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::drop('companyprofiles');
	}

}
