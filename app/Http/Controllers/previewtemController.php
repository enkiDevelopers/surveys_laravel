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
      $dato=DB::table('templates')->where('id','=', $id)->count();
      if($dato==0){
        return view("errors.404");
      }else{
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
          $opt=optionsMult::where('idParent',$idq)->orderby('id','asc')->get();

          //echo $opt . ",";
        }
        if($dato['type']==1){
          $opt=null;
        }
        if($dato['type']==3){
          $idq=$dato['id'];
          $opt=optionsMult::where('idParent',$idq)->orderby('id','asc')->get();

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
}
 //     return view("administrator.preview",compact('titulo','descripcion','imagePath','eid','datos','options','admor'));
    }
  

}
