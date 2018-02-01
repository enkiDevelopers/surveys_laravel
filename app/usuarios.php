<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class usuarios extends Model
{
  use SoftDeletes;

protected $dates = ['deleted_at'];

}
