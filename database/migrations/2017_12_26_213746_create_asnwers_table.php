<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAsnwersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('asnwers', function(Blueprint $table)
		{
			$table->integer('idAsnwers')->primary();
			$table->string('body', 85)->nullable();
			$table->integer('questions_idQuestions')->index('fk_asnwers_questions1_idx');
			$table->integer('administrators_idAdministrators')->index('fk_asnwers_administrators1_idx');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('asnwers');
	}

}
