<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  DB;
use App\surveys;


class editController extends Controller
{
  public function busqueda($id)
  {

      $informacion = DB::table('surveys')->where('id', $id)->get();

    return "viendo la info".$informacion;


  }
}
