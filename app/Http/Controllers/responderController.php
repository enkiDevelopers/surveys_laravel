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
	public function presentacion(Request $request){
    $matricula=$request->session()->get('id');
		//$id es el la variable de la table encuestados donde se almacena la informacion
    if($matricula==0){
          echo $matricula;
          return view("administrator.encuestacontestada");
    }else{
    $info=DB::table('encuestados')->where('noCuenta','=',$matricula)->get();

		$datos=DB::table('encuestados') 
			->join('templates','encuestados.idEncuesta','=','templates.id')
      ->join('publicaciones','encuestados.idEncuesta','=','publicaciones.idTemplate')
			->where('encuestados.noCuenta','=',$matricula)
			->where('encuestados.contestado','=',0)
			->get();

      $contestado=DB::table('encuestados')
      ->join('templates','encuestados.idEncuesta','=','templates.id')      
      ->join('publicaciones','encuestados.idEncuesta','=','publicaciones.idTemplate')
      ->where('encuestados.noCuenta','=',$matricula)
      ->where('encuestados.contestado','=',1)
      ->get();

		return view('surveyed.home',compact('info','datos','contestado'));
  }
	}
	public function busqueda($id){
		return $this->buscar($id);

  }
  protected function regresar($id){
        //$id es el la variable de la table encuestados donde se almacena la informacion
    $info=DB::table('encuestados')->where('idE','=',$id)->get();

    $datos=DB::table('encuestados')
      ->join('templates','encuestados.idEncuesta','=','templates.id')
      ->where('encuestados.idE','=',$id)
      ->where('encuestados.contestado','=',0)
      ->get();
      $contestado=DB::table('encuestados')
      ->join('templates','encuestados.idEncuesta','=','templates.id')
      ->where('encuestados.idE','=',$id)
      ->where('encuestados.contestado','=',1)
      ->get();

    return view('surveyed.home',compact('info','datos','contestado'));

  } 
	protected function buscar($id){
      $idencuesta1=NULL;
      $idencuestado=DB::table('encuestados')->select(['idEncuesta'])->where('idE','=',$id)
                                                                    ->where('contestado','=',0)
                                                                    ->count();

      $idencuestados=DB::table('encuestados')->select(['idEncuesta'])->where('idE','=',$id)
                                                                    ->get();

      $fecha=DB::table('publicaciones')->select(['fechat'])->where('idTemplate','=',$idencuestados[0]->idEncuesta)->get();
      $factual=date('Y-m-d H:m');
        if($factual <= $fecha[0]->fechat){

            if($idencuestado==0){
              return view("administrator.encuestacontestada");
            }else{
            	   $idencuestado=DB::table('encuestados')->select(['idEncuesta'])->where('idE','=',$id)
                                                                          ->where('contestado','=',0)
                                                                          ->get();
      	      $idencuesta1=$idencuestado[0]->idEncuesta;
      		    $consulta = DB::table('templates')->select(['tituloEncuesta','descripcion','imagePath','creador'] )->where('id', $idencuesta1)->get();
      	      $titulo = $consulta[0]->tituloEncuesta;
      	      $descripcion = $consulta[0]->descripcion;
      	      $imagePath = $consulta[0]->imagePath;

      	      $eid = $id;
      	      $datos = questionsTemplates::where('templates_idTemplates',$idencuesta1)->orderByRaw('orden')->get();

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

      	*/     $admor = $consulta[0]->creador;

      	       return view("administrator.preview",compact('titulo','descripcion','imagePath','eid','options','admor','idencuesta1'));
          }
       }else{
              return view("administrator.plazo");
       }
}
  public function encuestacontestada(){
        return view("administrator.encuestacontestada");
//

  }
  public function guardarencuesta(Request $request){
    $idEncuesta=$request->Input('idencuesta');
    $idencuestado=$request->Input('idencuestado');
    $canal =$request->session()->get('canal');

    $preguntas=DB::table('questionsTemplates')
                ->select('id')
                ->where('templates_idTemplates','=',$idEncuesta)
                ->get();

    foreach ($preguntas as $pregunta) {
        $respuesta=$request->Input($pregunta->id);
        DB::table('respuestas')
        ->insert(['respuesta' => $respuesta, 
                  'idEncuesta' => $idEncuesta, 
                  'idEncuestado'=>$idencuestado,
                  'idPreguntasEncuestas' => $pregunta->id]);
    }
    DB::table('encuestados')->where('idE',$idencuestado)->update([
      'canal'=>$canal,
      'contestado'=>1]);
    $idmatricula=DB::table('encuestados')->select('noCuenta')->where('idE','=',$idencuestado)->get();
    //return view("administrator.encuestacontestada");
    //return redirect()->action('responderController@completo',$idmatricula[0]->matricula);
    return view("administrator.encuestacontestada2");

    //return previous();
    //return redirect()->back();
    //return $this->regresar($idencuestado);

  }
  public function completo($matricula){
//poner un 1 cuando venga del correo y un 0 cuando venga de la cuenta
    if($matricula==0){
          return view("administrator.encuestacontestada");
    }else{
    $info=DB::table('encuestados')->where('noCuenta','=',$matricula)->get();

    $datos=DB::table('encuestados')
      ->join('templates','encuestados.idEncuesta','=','templates.id')
      ->where('encuestados.noCuenta','=',$matricula)
      ->where('encuestados.contestado','=',0)
      ->get();
      $contestado=DB::table('encuestados')
      ->join('templates','encuestados.idEncuesta','=','templates.id')
      ->where('encuestados.noCuenta','=',$matricula)
      ->where('encuestados.contestado','=',1)
      ->get();
    return view('administrator.encuestacontestada',compact('info','datos','contestado'));
  }

  }


}
