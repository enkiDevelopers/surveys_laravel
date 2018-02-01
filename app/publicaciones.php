<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class publicaciones extends Model
{
    protected $fillable = ['titulo','instrucciones','destinatarios','creador','asunto','idEncuestas'];
}
