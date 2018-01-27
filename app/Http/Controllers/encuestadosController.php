<?php
namespace App\Http\Controllers;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;
use App\listaEncuestados;
use App\publicaciones;
use App\templates;
use DB;
class encuestadosController extends Controller
{

public function showList($id)
{
  $listas = listaEncuestados::where("creador", $id)->get();
    return view("administrator.files", compact('listas'));
}


public function deletelist($id,$creador)
{
  $ltdelete =listaEncuestados::where('idLista',$id)->first();
  $ltdelete->delete();
  return "1";
}

public function publicar(Request $request)
{
        $id=$request->id;
        $fechai=$request->fechai;
        $fechat=$request->fechat;
        $instrucciones=$request->instrucciones;
        $destinatarios=$request->destinatarios;
        $tipo=$request->tipo;

if($fechat=="" or $instrucciones=="")
{
return false;
}
        $timage = templates::where('id',$id)->get();


        $insertar = new publicaciones;
        $insertar->titulo= $timage[0]->tituloEncuesta;
        $insertar->instrucciones=$instrucciones;
        $insertar->fechai=$fechai;
        $insertar->fechat=$fechat;
        $insertar->destinatarios=$destinatarios;
        $insertar->creador= $timage[0]->creador;
        $insertar->imagen= $timage[0]->imagePath;
        $insertar->save();

  return response()->json(array('sms'=>'Guardado Correctamente'));
}


public function consultar()
{
  $publicaciones = publicaciones::all();
  return $publicaciones;
}

}
