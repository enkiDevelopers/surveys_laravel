<?php
 
 use Illuminate\Database\Migrations\Migration;
 use Illuminate\Database\Schema\Blueprint;
 
 class CreateTemplatesTable extends Migration {
 
 	/**
 	 * Run the migrations.
 	 *
 	 * @return void
 	 */
 	public function up()
 	{
 		Schema::create('templates', function(Blueprint $table)
 		{
 			$table->integer('idTemplates')->primary();
 			$table->string('name', 45)->nullable();
 			$table->string('description', 45)->nullable();
 			$table->date('dateIni')->nullable();
 			$table->date('dateEnd')->nullable();
 			$table->integer('administrators_idAdministrators')->index('fk_templates_administrators1_idx');
 		});
 	}
 
 
 	/**
 	 * Reverse the migrations.
 	 *
 	 * @return void
 	 */
 	public function down()
 	{
 		Schema::drop('templates');
 	}
 
 }