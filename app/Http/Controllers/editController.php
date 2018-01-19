<?php

namespace App\Http\Controllers;

use App\templates2s;
use App\questionstemplates;
use Illuminate\Http\Request;
use  DB;
use App\templateSurvey;
use Response;

class editController extends Controller
{
  public function busqueda($id)
  {
      $consulta = DB::table('templates2s')->select(['tituloEncuesta','descripcion','imagePath'] )->where('id', $id)->get();

      $titulo = $consulta[0]->tituloEncuesta;

      $descripcion = $consulta[0]->descripcion;

      $nombre = $consulta[0]->imagePath;

      $eid = $id;

      $datos = questionstemplates::where('templates_idTemplates',$eid)->get();


      return view("administrator.edit",compact('titulo','descripcion','nombre','eid','datos'));
  }
  
  public function delete($id)
  {

    $post =templates2s::where('id',$id)->first();
      $post->delete();


    return Redirect("administrator/surveys");

  }
}
