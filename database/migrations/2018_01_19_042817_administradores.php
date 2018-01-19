<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;


class Administradores extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    public function up()
    {
      Schema::create('administradores', function(Blueprint $table)
      {
        $table->increments('id_admin');
        $table->string('Nombre');
        $table->string('correo');
        $table->string('campus');
        $table->softDeletes();
        $table->timestamps();
      } );






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
