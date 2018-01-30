<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use App\questionsTemplates;
use App\optionsMult;
use App\surveys;
use DB;
use File;
use Input;
use Response;
use App\Client;
use PDF;

class responderController extends Controller
{	
	public function presentacion($matricula){
		//$id es el la variable de la table encuestados donde se almacena la informacion
		$datos=DB::table('encuestados')
			->join('publicaciones','encuestados.publicaciones_id','=','publicaciones.id')
			->where('encuestados.matricula','=',$matricula)
			->where('encuestados.contestado','=',0)
			->get();
		$constestado=DB::table('encuestados')
			->join('publicaciones','encuestados.publicaciones_id','=','publicaciones.id')
			->where('encuestados.matricula','=',$matricula)
			->where('encuestados.contestado','=',1)
			->get();
		return view('surveyed.home',compact('datos','constestado'));
	}

	public function busqueda($id){
      $consulta = DB::table('templates')->select(['tituloEncuesta','descripcion','imagePath','creador'] )->where('id', $id)->get();
      $titulo = $consulta[0]->tituloEncuesta;
      $descripcion = $consulta[0]->descripcion;
      $imagePath = $consulta[0]->imagePath;
      $datos = questionsTemplates::where('templates_idTemplates',$id)->get();




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
      //echo $options;
/*      
      foreach ($datosOpt as $cada) {
        echo $cada["questions"];
        echo $cada["options"];
      }
*/
      $admor = $consulta[0]->creador;
      echo $admor;

      return view("administrator.preview",compact('titulo','descripcion','admor'));

 //     return view("administrator.preview",compact('titulo','descripcion','imagePath','eid','datos','options','admor'));
  }
}
