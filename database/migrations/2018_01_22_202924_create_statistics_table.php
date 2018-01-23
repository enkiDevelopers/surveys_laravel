<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStatisticsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('statistics', function(Blueprint $table)
        {
            $table->increments('id_estadisticas');

            $table->string('total_encuestados');
            $table->string('total_alumnos');
            $table->string('total_empleados');
            $table->string('total_incidentes');
            $table->string('total_incidentes_alumnos');
            $table->string('total_incidentes_empleados');
            $table->string('total_contestados');
            $table->string('total_contestados_alumnos');
            $table->string('total_contestados_empleados');
            $table->timestamps();   
            $table->integer('campus_campus_id')->index('fk_estadisticas_campus1_idx');
            $table->integer('directives_idDirectives')->index('fk_estadisticas_directives1_idx');
            $table->integer('surveys_id')->index('fk_surveys_id1_idx');



        } );
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('statistics');    
    }
}
