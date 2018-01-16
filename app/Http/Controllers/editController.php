<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  DB;
use App\surveys;


class editController extends Controller
{
  public function busqueda($id)
  {
      $titulo = DB::table('surveys.Titulo_encuesta')->where('id', $id)->get();
      $descripcion= DB::table('surveys.Descripcion')->where('id', $id)->get();
      $nombre= DB::table('surveys.Image_path')->where('id', $id)->get();
      
      $informacion = [
        $titulo=>'titulo',
        $descripcion=>'descripcion',
        $nombre=>'nombre'
      ];

      return view("administrator.edit",compact("informacion"));
  }
}
