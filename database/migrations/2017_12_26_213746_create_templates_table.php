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
			$table->Increments('idQuestionsTemplates');	  
			$table->string('title', 45)->nullable();
			$table->string('type', 45)->nullable();
			$table->integer('order')->nullable();
			$table->integer('idParent')->nullable();
			$table->string('bifurcacion', 45)->nullable();
			$table->integer('templates_idTemplates')->index('fk_questionsTemplates_templates1_idx'); 	
			$table->timestamps();


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