<?php

namespace App\Http\Controllers;

use App\templates;
use App\questionstemplates;
use App\optionsMult;
use Illuminate\Http\Request;
use  DB;
use App\templateSurvey;
use Response;
class editController extends Controller
{
  public function busqueda($id)
  {
    $checkId = templates::where("id",$id)->count();
    if($checkId==0){
      return view("errors.404");
    }
    $consulta = templates::select(['tituloEncuesta','descripcion','imagePath','creador'] )->where('id', $id)->get();
    $titulo = $consulta[0]->tituloEncuesta;
    $descripcion = $consulta[0]->descripcion;
    $nombre = $consulta[0]->imagePath;
    $eid = $id;
    $admor = $consulta[0]->creador;
    $datos = questionstemplates::where('templates_idTemplates',$eid)->orderby('orden','asc')->get();

    $datosOpt =[];
    foreach ($datos as $dato) {
      if($dato['type']==2 || $dato['type'] == 3){
        $idq=$dato['id'];
        $opt=optionsMult::where('idParent',$idq)->orderby('id','asc')->get();
      }else{
        $opt=0;
      }
      $datosOpt[] = [
      "questions" => $dato,
      "options" => $opt];
    }

    $options=serialize($datosOpt);

    return view("administrator.edit",compact('titulo','descripcion','nombre','eid','admor','options'));

  }

  public function delete(Request $request){
    $id=$request->id;
    $idadmin=$request->idadmin;
    $post =templates::where('id',$id)->first();
    $post->delete();

    return response()->json(array('sms'=>'Eliminado Correctamente'));
  }
}
