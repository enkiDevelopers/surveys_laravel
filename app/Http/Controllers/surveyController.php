<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\templates2s;
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

      $surv = new templates2s;
      $surv->tituloEncuesta = $titulo;
      $surv->descripcion= $descripcion;
      $surv->imagePath= $nombre;
      $surv->creador= 1;
      $surv->save();

      $eid =$surv->id;
      return view('administrator.edit',compact('titulo','descripcion','nombre', '$eid'));
  }

  public function show_cards()
  {
      $plantillas = templates2s::all();
      return view('administrator.surveys', compact('plantillas'));

  }


}
