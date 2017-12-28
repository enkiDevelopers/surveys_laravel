<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAdministratorsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('administrators', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('email', 45)->nullable();
			$table->string('name', 45)->nullable();
			$table->string('apPaterno', 45)->nullable();
			$table->string('apMaterno', 45)->nullable();
			$table->string('password', 45)->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('administrators');
	}

}
