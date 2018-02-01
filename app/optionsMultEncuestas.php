<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class optionsMultEncuestas extends Model
{
  protected $table = 'optionsMultEncuestas';
      protected $fillable = ['name','idParent','salto'];
}
