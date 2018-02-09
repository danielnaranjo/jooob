<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDublinjobsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('dublinjobs', function(Blueprint $table)
		{
			$table->integer('pID', true);
			$table->string('company');
			$table->text('info', 65535)->nullable();
			$table->string('website');
			$table->string('email');
			$table->char('startup', 1)->default(0);
			$table->text('logo', 65535);
			$table->string('jobtitle');
			$table->text('description', 65535);
			$table->string('contract', 100);
			$table->string('location');
			$table->string('city');
			$table->string('country');
			$table->date('validFrom');
			$table->date('validTo');
			$table->string('stack');
			$table->string('salary')->default('0');
			$table->string('equity');
			$table->text('instructions', 65535);
			$table->text('marketing', 65535);
			$table->string('ip');
			$table->string('paidoptions')->default('0');
			$table->char('status', 1)->default(0);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('dublinjobs');
	}

}
