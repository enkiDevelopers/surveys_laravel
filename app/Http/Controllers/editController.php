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
        $cTitulo = DB::table('surveys')->select(['Titulo_encuesta'])->where('id', $id)->get();
      $cDescripcion = DB::table('surveys')->select(['Descripcion'])->where('id', $id)->get();
      $cNombre = DB::table('surveys')->select(['Image_path'])->where('id', $id)->get();

        $titulo = $cTitulo[0]->Titulo_encuesta;
        $descripcion = $cDescripcion[0]->Descripcion;
        $nombre = $cNombre[0]->Image_path;

    return view("administrator.edit",compact('titulo','descripcion','nombre'));
  }
}
