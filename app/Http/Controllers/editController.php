<?php

namespace App\Http\Controllers;

use App\templates;
use App\questionstemplates;
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

      $datos = questionstemplates::where('templates_idTemplates',$eid)->get();
      $admor = $consulta[0]->creador;


      return view("administrator.edit",compact('titulo','descripcion','nombre','eid','datos','admor'));
  }

  public function delete($id,$idadmin)
  {


    $post =templates::where('id',$id)->first();
      $post->delete();


    return Redirect("administrator/surveys/".$idadmin);

  }
}
