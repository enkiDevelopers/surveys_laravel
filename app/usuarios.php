<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class usuarios extends Model
{
  use SoftDeletes;
  protected $primaryKey = 'idUsuario';
protected $dates = ['deleted_at'];

}
