<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class preguntasEncuestas extends Model
{
  protected $table = 'preguntasEncuestas';
      protected $fillable = ['title','type','orden', 'idEncuestas','fechai','fechat'];
}
