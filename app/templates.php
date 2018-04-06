<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class templates extends Model
{
  use SoftDeletes;
 protected $primaryKey = 'id';
  protected $dates = ['deleted_at'];

  protected $fillable = ['tituloEncuesta','descripcion','imagePath', 'creador','encuesta'];

}
