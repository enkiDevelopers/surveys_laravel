<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCampusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('campus', function(Blueprint $table)
            {
                $table->increments('campus_id');
                $table->string('campus_name',300);
                $table->string('campus_key',200);
                $table->integer('regions_regions_id')->index('fk_campus_regiones1_idx');
                $table->integer('directives_idDirectives')->index('fk_regiones_directives1_idx');

            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
    }
}
