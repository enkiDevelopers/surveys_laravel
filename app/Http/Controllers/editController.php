<?php

/* */
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
      $consulta = DB::table('templates')->select(['tituloEncuesta','descripcion','imagePath','creador'] )->where('id', $id)->get();
      $titulo = $consulta[0]->tituloEncuesta;
      $descripcion = $consulta[0]->descripcion;
      $nombre = $consulta[0]->imagePath;
      $eid = $id;
      $admor = $consulta[0]->creador;
      $datos = questionstemplates::where('templates_idTemplates',$eid)->orderby('order','asc')->get();
      
      $datosOpt;
      //echo $datos;
      foreach ($datos as $dato) {
        //echo $dato . ",";
        if($dato['type']==2){
          $idq=$dato['id'];
          $opt=optionsMult::where('idParent',$idq)->get();
          //echo $opt . ",";
        }else{
          $opt=null;
        }
        $datosOpt[] = [
        "questions" => $dato,
        "options" => $opt];


      }
      

      //log($datosOpt);
      $options=serialize($datosOpt);

      return view("administrator.edit",compact('titulo','descripcion','nombre','eid','datos','admor','options'));
  }
  public function delete(Request $request)
  {
    $id=$request->id;
    $idadmin=$request->idadmin;
    $post =templates::where('id',$id)->first();
    $post->delete();
  return response()->json(array('sms'=>'Eliminado Correctamente'));
  }
}
