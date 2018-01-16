<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  DB;
use App\surveys;


class editController extends Controller
{
  public function busqueda($id)
  {
      $titulo = DB::table('surveys')->select(['Titulo_encuesta'])->where('id', $id)->get();
      $descripcion = DB::table('surveys')->select(['Descripcion'])->where('id', $id)->get();
      $nombre = DB::table('surveys')->select(['Image_path'])->where('id', $id)->get();

      return $titulo. $descripcion. $nombre;
      return view("administrator.edit",compact('titulo','descripcion','nombre'));
  }
}
