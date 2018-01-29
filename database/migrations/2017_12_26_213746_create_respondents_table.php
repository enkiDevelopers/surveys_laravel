<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRespondentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('respondents', function(Blueprint $table)
		{
			$table->integer('idRespondents')->primary();
			$table->string('email', 45)->nullable();
			$table->string('nombre', 45)->nullable();
			$table->string('apPaterno', 45)->nullable();
			$table->string('apMaterno', 45)->nullable();
			//clave de empleado
			//matricula de alumno
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('respondents');
	}

}
