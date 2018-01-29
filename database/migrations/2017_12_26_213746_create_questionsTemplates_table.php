<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateQuestionsTemplatesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('questionsTemplates', function(Blueprint $table)
		{
			$table->integer('id')->primary();
			$table->string('title', 45)->nullable();
			$table->integer('type')->nullable();
			$table->integer('order')->nullable();
			$table->integer('templates_idTemplates')->index('fk_questionsTemplates_templates1_idx');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('questionsTemplates');
	}

}
