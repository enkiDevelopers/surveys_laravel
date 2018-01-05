<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\surveys;

class surveyController extends Controller
{


  public function save(Request $request)
  {

    $titulo = $request['titulo'];
    $descripcion = $request['descripcion'];

      $surv = new surveys;
      $surv->Titulo_ecuesta = $titulo;
      $surv->Descripcion = $descripcion;
      $surv->save();
      return view('administrator.new-survey';
  }
}
