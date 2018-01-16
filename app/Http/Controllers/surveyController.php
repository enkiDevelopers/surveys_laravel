<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\surveys;
use DB;
use File;
use Input;
class surveyController extends Controller
{


  public function save(Request $request)
  {

    $titulo = $request['titulo'];
    $descripcion = $request['descripcion'];
    $icono=$request->file('icono');
    $nombre=date("his").".png";

    $icono->move('img/iconos',$nombre);
      $surv = new surveys;
      $surv->Titulo_encuesta = $titulo;
      $surv->Descripcion = $descripcion;
      $surv->Image_path	= $nombre;
      $surv->save();

      $informacion = [
        $titulo=>'titulo',
        $descripcion=>'descripcion',
        $nombre=>'nombre'
      ];
        return view('administrator.edit',compact('informacion'));
  }

  public function show_cards()
  {

      $plantillas = DB::table('surveys')->get();

      return view('administrator.surveys', compact('plantillas'));

  }


}
