<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateQuestionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('questions', function(Blueprint $table)
		{
			$table->integer('idQuestions')->primary();
			$table->string('title', 65)->nullable();
			$table->integer('order')->nullable();
			$table->string('bifurcacion', 45)->nullable();
			$table->string('type', 45)->nullable();
			$table->integer('idParent')->nullable();
			$table->integer('tests_idTests')->index('fk_questions_tests1_idx');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('questions');
	}

}
