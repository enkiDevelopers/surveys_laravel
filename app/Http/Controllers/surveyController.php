<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\surveys;
use DB;
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
      return view('administrator.new-survey',compact('titulo','descripcion'));
  }

  public function show_cards()
  {

      $plantillas = DB::table('surveys')->get();

      return view('administrator.surveys', compact('plantillas'));

  }


}
