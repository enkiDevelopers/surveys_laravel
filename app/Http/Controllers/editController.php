<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  DB;
use App\surveys;
use Response;

class editController extends Controller
{
  public function busqueda($id)
  {


      $consulta = DB::table('surveys')->select(['Titulo_encuesta','Descripcion','Image_path'] )->where('id', $id)->get();
      $titulo = $consulta[0]->Titulo_encuesta;
      $descripcion = $consulta[0]->Descripcion;
      $nombre = $consulta[0]->Image_path;
        return view("administrator.edit",compact('titulo','descripcion','nombre'));
  }
}
