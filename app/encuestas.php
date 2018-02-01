<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class encuestas extends Model
{
    protected $fillable = ['tituloEncuesta','descripcion','imagePath', 'creador','fechai','fechat'];
}
