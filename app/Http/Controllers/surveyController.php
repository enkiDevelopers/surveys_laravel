<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\surveys;
use App\questionstemplates;
use DB;
use File;
use Input;
class surveyController extends Controller
{


  public function save(Request $request)
  {

    $titulo = $request['titulo'];
    $descripcion = $request['descripcion'];
    $icono=$request->file('icono');
    $nombre=date("his").".png";
    $icono->move('img/iconos',$nombre);
      $surv = new surveys;
      $surv->Titulo_encuesta = $titulo;
      $surv->Descripcion = $descripcion;
      $surv->Image_path	= $nombre;
      $surv->save();
      return view('administrator.edit',compact('titulo','descripcion','nombre'));
  }

  public function show_cards()
  {

      $plantillas = DB::table('surveys')->get();

      return view('administrator.surveys', compact('plantillas'));

  }

  public function saveQuestionsTemplate(Request $request){

    $questionInput = $request['questionInput'];
    $questionType = $request['questionType'];
      $surv = new questionstemplates;
      $surv->templates_idTemplates = 2;
      $surv->title = $questionInput;
      $surv->type = $questionType;
      $surv->save();
      return "1";
  }



}
