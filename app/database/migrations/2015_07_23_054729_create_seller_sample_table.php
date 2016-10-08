<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSellerSampleTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('seller_sample', function($t) {
            $t->engine = 'InnoDB';
            $t->increments('id')->unsigned();
            $t->integer('rfq_id')->unsigned();
            $t->integer('quote_id')->unsigned();
            $t->integer('seller_id')->unsigned();
            $t->integer('buyer_id')->unsigned();
            $t->string('shippingprice',100)->nullable();
            $t->string('shippingcurrency',100)->nullable();
            $t->string('invoicenumber',100)->nullable();
            $t->string('createInvoiceDate',100)->nullable();
            $t->string('totalprice',100)->nullable();
            $t->string('shippingwidth',100)->nullable();
            $t->string('shippingheight',100)->nullable();
            $t->string('shippinglength',100)->nullable();
            $t->string('packagecount',100)->nullable();
            $t->string('shippingname',100)->nullable();
            $t->string('shippingaddress',100)->nullable();
            $t->string('shippingcity',100)->nullable();
            $t->string('shippingstate',100)->nullable();
            $t->string('shippingpostalcode',100)->nullable();
            $t->string('shippingcountry',100)->nullable();
            $t->string('shippingweight',100)->nullable();
            $t->string('shippingweightunit',100)->nullable();
            $t->string('shippingservicetype',100)->nullable();
            $t->string('shippingphonenumber',100)->nullable();
            $t->string('shippinglabel',100)->nullable();
            $t->string('trackingnumber1',100)->nullable();
            $t->string('trackingnumber2',100)->nullable();
            $t->string('tracking_date',255)->nullable();
            $t->integer('paidcheck')->nullable();
            $t->string('invoicepaid',100)->nullable();
            $t->string('sampleamount',45)->nullable();
            $t->foreign('rfq_id')->references('id')->on('rfq')->onUpdate('cascade')->onDelete('cascade');
            $t->foreign('quote_id')->references('id')->on('seller_quote')->onUpdate('cascade')->onDelete('cascade');
            $t->foreign('seller_id')->references('id')->on('member')->onUpdate('cascade')->onDelete('cascade');
            $t->foreign('buyer_id')->references('id')->on('member')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::drop('seller_sample');
	}

}
