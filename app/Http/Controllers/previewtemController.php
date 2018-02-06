<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\templates;
use App\questionsTemplates;
use App\optionsMult;
use  DB;
use App\templateSurvey;
use Response;

 
class previewtemController extends Controller
{
    //
  public function busqueda($id)
  {
    $idencuesta1=NULL;

      $consulta = DB::table('templates')->select(['tituloEncuesta','descripcion','imagePath','creador'] )->where('id','=', $id)->get();
      $titulo = $consulta[0]->tituloEncuesta;
      $descripcion = $consulta[0]->descripcion;
      $imagePath = $consulta[0]->imagePath;
      $eid = $id;
      $datos = questionsTemplates::where('templates_idTemplates',$eid)->orderByRaw('orden')->get();

      $datosOpt=[];
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
      //echo $options;
/*      
      foreach ($datosOpt as $cada) {
        echo $cada["questions"];
        echo $cada["options"];
      }
*/
      $admor = $consulta[0]->creador;




      return view("administrator.preview",compact('titulo','descripcion','imagePath','eid','options','admor','idencuesta1'));

 //     return view("administrator.preview",compact('titulo','descripcion','imagePath','eid','datos','options','admor'));
  }

}
