<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Surveys extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('surveys',function(Blueprint $table)
      {
          $table->Increments('id');
          $table->string('Titulo_encuesta');
          $table->string('Descripcion');
          $table->string('Image_path');
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
        //
    }
}
