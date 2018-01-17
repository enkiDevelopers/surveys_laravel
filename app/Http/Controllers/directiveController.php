<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\surveys;
use DB;
use File;
use Input;
use Response;

class directiveController extends Controller
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
      return view('administrator.edit',compact('titulo','descripcion','nombre'));
  }

  public function show_cards()
  {

      $encuestas = DB::table('surveys')->get();

      return view('directive.home', compact('encuestas'));

  }
  public function buscar(Request $request){

  $data = DB::table('surveys')
                ->where("id", $request->id)
                ->get();

    return response()->json($data);
    


  }


}
