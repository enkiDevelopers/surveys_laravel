<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  DB;
use App\questionstemplates;

class apiController extends Controller
{
  public function checkPlatform($platformName,$idUser){   // No de cuenta 

    $ip = $_SERVER['REMOTE_ADDR'];
    $idPlataforma = DB::table('ctlPlataformas')->where("nombre", $platformName)->first()->id;
    $fecha_actual = date("Y-m-d H:i:s");

    $checkPlatform = DB::table('ctlPlataformas')->where("nombre",$platformName)->count();
    
    if($checkPlatform == 0){
      return view("errors.404");
    }

    $api_token = date("YmdHis").str_random(6);

   DB::table('tokens')->insert([
      ['idPlataforma' => $idPlataforma, 'token' => $api_token, 'ip' => $ip, 'timestampPeticion' => $fecha_actual, 'log' => "Procesando"],
    ]);

    return ($api_token);
  }


  public function checkSurveys($token,$idUser){ //No de cuenta

    $checkToken = DB::table('tokens')->where('token',$token)->count();
    $checkUser = DB::table('encuestados')->where('noCuenta', $idUser)->count();
    $checkExpToken = DB::table('tokens')->where('token',$token)->where('timestampConsumo','!=',NULL)->count();
    $date = date("Y-m-d H:i:s");
    $mod_date = strtotime($date."+ 5 minutes");
    $fecha_vencimiento = date("Y-m-d H:i:s",$mod_date);
    $tokenExp = DB::table('tokens')->where('token',$token)->pluck('timestampConsumo')->first();
    $fecha_actual = strtotime($date);
    $fecha_entrada = strtotime($tokenExp);
    if($checkToken == 0){
      return response()->json("Token Invalido");
    }elseif ($checkUser == 0) {
      return response()->json("Usuario Invalido");
    }elseif ($fecha_actual > $fecha_entrada && $checkExpToken > 0) {
      return response()->json("Ha expirado el tiempo de uso válido del token ingresado");
    }    

    if ($checkExpToken == 0) {
      DB::table('tokens')->where('token', $token)->update(['log' => "Completado", 'idE' => $idUser, 'timestampConsumo' => $fecha_vencimiento]);
    }

    //checar número encuestas NO contestadas
    $surveys = DB::table('encuestados')->where("noCuenta",$idUser)->where("contestado",0)->where('idEncuesta','!=',NULL)->count();  

    //Obtener título y url de cada encuesta no contestada
    $datosSurveys = [];

    $urls = DB::table('encuestados')->where('noCuenta', $idUser)->where("contestado",0)->where('idEncuesta','!=',NULL)->get();

    foreach ($urls as $url) {

      $titulo = DB::table('publicaciones')->where('idTemplate', $url->idEncuesta)->first();

      $datosSurveys[] = [
      "titulo" => $titulo->titulo,
      "url" => "https://www.uvmmejoraporti.mx/surveyed/previewtem/".$url->idE];
    }

    $NumSurveys = array("encuestasNoContestadas" => $surveys);
    $resultado = array_merge($NumSurveys,$datosSurveys);

    return response()->json($resultado);
    }
}
