<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\templates;
use App\questionstemplates;
use DB;
use File;
use Input;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\administradores;
use App\publicaciones;
use App\listaEncuestados;
use App\ctlTipoEncuesta as tipos;
use App\optionsMult;
class surveyController extends Controller
{

  public function save(Request $request)
  {
    $creador=$request['creador'];
    $titulo = $request['titulo'];
    $descripcion = $request['descripcion'];

    $icono=$request->file('icono');
    if (empty($icono)) {
        $nombre="default.png";
    }else {
      $nombre=date("his").".png";
      $icono->move('img/iconos',$nombre);

    }
      $surv = new templates;
      $surv->tituloEncuesta = $titulo;
      $surv->descripcion= $descripcion;
      $surv->imagePath= $nombre;
      $surv->creador= $creador;
      $surv->save();
      $eid =$surv->id;
      $datos = questionstemplates::where('templates_idTemplates',$eid)->get();
//      return view('administrator.edit',compact('titulo','descripcion','nombre', 'eid','datos'));
      return redirect()->route('editar',array("section" => "$eid"));

  }

  public function show_cards($id)
  {
    $eAdmin =  administradores::where('id_admin', $id)->count();
    if($eAdmin == 0)
    {
      return view('errors.404');
    }
    else {
    $propias = templates::join('administradores', 'templates.creador', '=', 'administradores.id_admin')->where('administradores.id_admin', $id)->orderby('id', 'desc')->get();
    $agenas = templates::join('administradores', 'templates.creador', '=', 'administradores.id_admin')->where('administradores.id_admin','!=',$id)->orderby('id', 'desc')->get();
      $tipos = tipos::all();
      $publicaciones = publicaciones::all();
      $listas= listaEncuestados::where('creador', $id)->get();
      return view('administrator.surveys', compact('propias','agenas','listas','tipos','publicaciones','id'));
    }

  }

  public function updateDataTemplate(Request $request)
  {
    $idTemplate = $request['idTemplate'];
    $titulo = $request['titleInput'];
    $descripcion = $request['descInput'];
    //$nombre =$request['nombre'];
     $surv::where('id', $idTemplate)->update(array('tituloEncuesta' => $titulo, 'descripcion' => $descripcion));

     return $surv;
  }

  public function duplicar(Request $request){
  $nNombre = $request->nNombre;
  $id=$request->id;
  $creador=$request->creador;
  $cPlantilla=templates::where('id', $id)->get();
  $Plantilla = templates::create([
          'tituloEncuesta' => $nNombre,
          'descripcion' => $cPlantilla[0]->descripcion,
          'imagePath' => $cPlantilla[0]->imagePath,
          'creador' => $creador
      ]);
      $idDupi = $Plantilla->id;
/*
  $dupi = new templates;
  $dupi->tituloEncuesta = $nNombre;
  $dupi->descripcion= $cPlantilla[0]->descripcion;
  $dupi->imagePath= $cPlantilla[0]->imagePath;
  $dupi->creador= $creador;*/

//va bien;
$preguntasA=questionstemplates::where('id',$id)->where('type', "1")->get();
//$cA=questionstemplates::where('templates_idTemplates','=',$id)->where('type', '1')->count();
$cpreguntas = new questionstemplates;
  foreach ($preguntasA as $pregunta) {
      $cpreguntas->title = $pregunta->title;
      $cpreguntas->type = $pregunta->type;
      $cpreguntas->order=$pregunta->order;
      $cpreguntas->templates_idTemplates=$idDupi;
      $cpreguntas->save();
    }
/*

$preguntasB=questionstemplates::where('templates_idTemplates',$id)->where('type', '2')->get();
$cant=questionstemplates::where('templates_idTemplates',$id)->where('type', '2')->count();
$copreguntas = new questionstemplates;
  foreach ($preguntasB as $pregunta) {
      $copreguntas->title = $pregunta->title;
      $copreguntas->type = $pregunta->type;
      $copreguntas->order=$pregunta->order;
      $copreguntas->salto=$pregunta->salto;
      $copreguntas->templates_idTemplates=$idDupi;
      $copreguntas->save();
      $idCopreguntas=$copreguntas->idQuestionsTemplates;;
//todo bien
    $opciones = optionsMult::where('idParent',$pregunta->idQuestionsTemplates)->get();
    $opcout = optionsMult::where('idParent',$pregunta->idQuestionsTemplates)->count();
foreach ($opciones as $opcion) {
      $inser = new optionsMult ;
      $inser->name = $opcion->name;
      $inser->idparent= $idCopreguntas;
      $inser->salto=$opcion->salto;
      $inser->save();
      }

  }*/
    return response()->json(array('sms'=>'Guardado Correctamente'));

}

public function ajaxshowcards(Request $request)
{
  $id=$request->value;

  $eAdmin =  administradores::where('id_admin', $id)->count();
  if($eAdmin == 0)
  {
    return view('errors.404');
  }
  else {
  $propias = templates::join('administradores', 'templates.creador', '=', 'administradores.id_admin')->where('administradores.id_admin', $id)->orderby('id', 'desc')->get();
  $agenas = templates::join('administradores', 'templates.creador', '=', 'administradores.id_admin')->where('administradores.id_admin','!=',$id)->orderby('id', 'desc')->get();
    $tipos = tipos::all();
    $publicaciones = publicaciones::all();
    $listas= listaEncuestados::where('creador', $id)->get();
  return view("administrator.showcards",compact('propias','agenas','listas','tipos','publicaciones','id'));
  }

}
}
