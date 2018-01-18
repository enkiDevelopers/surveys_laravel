<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRegionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('regions', function(Blueprint $table)
            {
                $table->increments('regions_id');
                $table->string('regions_name',300);
                $table->string('regions_key',200);
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
            Schema::drop('regions');
    }
}
