<?php

namespace App\Http\Controllers;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;
use App\listas;
use App\publicaciones;
use DB;
class encuestadosController extends Controller
{

public function showList($id)
{
  $listas = listas::where("creador", $id)->get();
    return view("administrator.files", compact('listas'));
}


public function deletelist($id,$creador)
{
  $ltdelete =listas::where('idLista',$id)->first();
  $ltdelete->delete();
  return "1";
}

public function publicar(Request $request)
{

  

    $titulo = $request->titulo;
    $instrucciones = $request->instrucciones;
    $fechai=  $request->$fechai;
    $fechat= $request->$fechat;
    $destinatarios= $destinatarios->destinatarios;
    $creador = $request->creador;
    $imagen = $request->imagen;

    $pubicacion = new publicaciones;
  return response()->json(array('sms'=>'Guardado Correctamente'))
}

}
