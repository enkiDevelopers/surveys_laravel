<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\templates;
use App\questionstemplates;
use App\optionsMult;
use  DB;
use App\templateSurvey;
use Response;


class previewtemController extends Controller
{
    //
  public function busqueda($id)
  {
      $consulta = DB::table('templates')->select(['tituloEncuesta','descripcion','imagePath','creador'] )->where('id', $id)->get();
      $titulo = $consulta[0]->tituloEncuesta;
      $descripcion = $consulta[0]->descripcion;
      $imagePath = $consulta[0]->imagePath;
      $eid = $id;
      $datos = questionstemplates::where('templates_idTemplates',$eid)->get();

      $opt = "";
      /*foreach ($datos as $dato) {
        if($dato['type']==2){
          $idq=$dato['idQuestionsTemplates'];
          //$opt = $opt . $idq . ",";
          //$option=optionsMult::where('idParent',$idq)->get();
          $option=optionsMult->get();
          //$opt = (object) array_merge((array) $opt, (array) $option);
          $optionstr = (string) $option;
          $opt = $opt . $optionstr;
        }
      }*/
      $options=$opt;

      $admor = $consulta[0]->creador;
      return view("administrator.preview",compact('titulo','descripcion','imagePath','eid','datos','options','admor'));
  }

}
