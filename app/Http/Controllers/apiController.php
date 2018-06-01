<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  DB;

class apiController extends Controller
{
  public function checkPlatform($platformName,$idUser){

    $ip = $_SERVER['REMOTE_ADDR'];
    $fecha_actual = date("Y-m-d H:i:s");

    $checkPlatform = DB::table('ctlPlataformas')->where("nombre",$platformName)->count();
    
    if($checkPlatform == 0){
      return response()->json("Plataforma Invalida");
    }

    $api_token = date("YmdHis").str_random(6);
    $idPlataforma = DB::table('ctlPlataformas')->where("nombre", $platformName)->first()->id;

    DB::table('tokens')->insert([
      ['idPlataforma' => $idPlataforma, 'token' => $api_token, 'ip' => $ip, 'idE' => $idUser,'timestampPeticion' => $fecha_actual],
    ]);

    DB::table('logs')->insert([
      ['token'=> $api_token, 'log' => 'Generacion del token', 'timestamp' => $fecha_actual],
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

    $tokenExp = DB::table('tokens')->where('token',$token)->pluck('timestampConsumo')->first();


    if($checkToken == 0){
      DB::table('logs')->insert([
        ['token'=> $token, 'log' => 'Encuestas No contestadas - Token Inválido', 'timestamp' => $date],
      ]);

      return response()->json("Token Invalido");
    }elseif ($checkUser == 0) {
      DB::table('logs')->insert([
        ['token'=> $token, 'log' => 'Encuestas No contestadas - Usuario Inválido', 'timestamp' => $date],
      ]);

      return response()->json("Usuario Invalido");
    }elseif ($fecha_actual > $fecha_entrada && $checkExpToken > 0) {
      DB::table('logs')->insert([
        ['token'=> $token, 'log' => 'Encuestas No contestadas - El token ha expirado', 'timestamp' => $date],
      ]);

      return response()->json("Ha expirado el tiempo de uso válido del token ingresado");
    }    

    if ($checkExpToken == 0) {
      DB::table('tokens')->where('token', $token)->update(['timestampConsumo' => $fecha_vencimiento]);
    }

    //Obtener título y url de cada encuesta no contestada
    $datosSurveys = [];

    $urls = DB::table('encuestados')->where('noCuenta', $idUser)->where("contestado",0)->where('idEncuesta','!=',NULL)->get();

    foreach ($urls as $url) {

      $titulo = DB::table('publicaciones')->where('idTemplate', $url->idEncuesta)->first();
      $surveyExp = strtotime(($titulo->fechat)." 23:59:59");
      if ($fecha_actual < $surveyExp) {
        $datosSurveys[] = [
        "titulo" => $titulo->titulo,
        "url" => "https://www.uvmmejoraporti.mx/surveyed/previewtem/".$url->idE];
      }

    }

    $NumSurveys = array("encuestasNoContestadas" => count($datosSurveys));
    $resultado = array_merge($NumSurveys,$datosSurveys);

     DB::table('logs')->insert([
      ['token'=> $token, 'log' => 'Encuestas No contestadas - satisfactorio', 'timestamp' => $date],
     ]);

    return response()->json($resultado);
    }
}
