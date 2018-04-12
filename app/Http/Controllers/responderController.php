<?php

namespace App\Http\Controllers;
use Auth;
use Session;

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
    if($matricula==0){//NO hay entra de matricula si no mandar mensaje de error
          echo $matricula;
          return view("administrator.encuestacontestada");
    }else{//hay entrada de matricula
    $info=DB::table('encuestados')->where('noCuenta','=',$matricula)->get();

		$datos=DB::table('encuestados') //encuestas no contestadas
			->join('templates','encuestados.idEncuesta','=','templates.id')
      ->join('publicaciones','encuestados.idEncuesta','=','publicaciones.idTemplate')
			->where('encuestados.noCuenta','=',$matricula)
			->where('encuestados.contestado','=',0)
			->get();

      $contestado=DB::table('encuestados')//enuuestas  contestadas
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
      $idencuestado2=DB::table('encuestados')->select(['idEncuesta'])->where('idE','=',$id)
                                                                    ->where('contestado','=',1)
                                                                    ->count();
      if($idencuestado!=0 or $idencuestado2 ==1){
      $idencuestados=DB::table('encuestados')->select(['idEncuesta'])->where('idE','=',$id)
                                                                    ->get();

      $fecha=DB::table('publicaciones')->select(['fechat'])->where('idTemplate','=',$idencuestados[0]->idEncuesta)->get();
      $factual=date('Y-m-d H:m:s');
      $factual=str_replace("T"," ",$factual);

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
                }
                if($dato['type']==1){
                  $opt=null;
                }
                if($dato['type']==3){
                  $idq=$dato['id'];
                  $opt=optionsMult::where('idParent',$idq)->get();
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
     }else{
            abort(404);
     }
}
  public function encuestacontestada(){
        return back();//

  }
  public function guardarencuesta(Request $request){   
      $idEncuesta=$request->Input('idencuesta');
      $idencuestado=$request->Input('idencuestado');
      $canal =$request->session()->get('canal');
      $factual=date('Y-m-d H:m:s');
      if($canal==null){
        $canal="mail";
      }

      $yacontestado = DB::table('encuestados')
                  ->where('idencuesta','=',$idEncuesta)->where('idE','=',$idencuestado)->where('contestado','=',1)->count();
      //echo $yacontestado;
      if($yacontestado==0){
        $preguntas=DB::table('questionsTemplates')
                    ->select('id','type')
                    ->where('templates_idTemplates','=',$idEncuesta)
                    ->get();

        foreach ($preguntas as $pregunta) {
          $type=$pregunta->type;
          if($type==3){
           $nombrepregunta="datos".$pregunta->id;
           if($request->Input($nombrepregunta)==""){

           }else{
            foreach ($request->Input($nombrepregunta) as $value){ 
                DB::table('respuestas')->insert(['respuesta' => $value,
                          'type'=>$type, 
                          'idEncuesta' => $idEncuesta, 
                          'idEncuestado'=>$idencuestado,
                          'idPreguntasEncuestas' => $pregunta->id]);
              }
            } 
          }else{
            $respuesta=$request->Input($pregunta->id);
            if($respuesta==""){

            }else{
            DB::table('respuestas')->insert(['respuesta' => $respuesta,
                      'type'=>$type, 
                      'idEncuesta' => $idEncuesta, 
                      'idEncuestado'=>$idencuestado,
                      'idPreguntasEncuestas' => $pregunta->id]);
          }
    }
        }
        DB::table('encuestados')->where('idE',$idencuestado)->update([
          'canal'=>$canal,
          'contestado_fecha' => $factual,
          'contestado'=>1]);
        //$idmatricula=DB::table('encuestados')->select('noCuenta')->where('idE','=',$idencuestado)->get();
        //return view("administrator.encuestacontestada");
        //return redirect()->action('responderController@completo',$idmatricula[0]->matricula);
    }else{
      //echo "Ya habías contestado";
    }

        Auth::logout();
        Session::flush();
      return view("administrator.encuestacontestada2");

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
