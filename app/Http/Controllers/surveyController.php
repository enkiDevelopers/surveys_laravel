<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\templates;
use App\questionsTemplates;
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
      $datos = questionsTemplates::where('id',$eid)->get();
//      return view('administrator.edit',compact('titulo','descripcion','nombre', 'eid','datos'));
      return redirect()->route('editar',array("id" => "$eid"));

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
$preguntasA=questionsTemplates::where('templates_idTemplates',$id)->where('type', "1")->get();
foreach ($preguntasA as $pregunta) {
    $Plantilla = questionsTemplates::create([
            'title' => $pregunta->title,
            'type' => $pregunta->type,
            'orden' => $pregunta->orden,
            'templates_idTemplates' => $idDupi
        ]);

          }

$preguntasB=questionstemplates::where('templates_idTemplates',$id)->where('type', '2')->get();

  foreach ($preguntasB as $pregunta) {
    $Pregunta = questionsTemplates::create([
            'title' => $pregunta->title,
            'type' => $pregunta->type,
            'orden' => $pregunta->orden,
            'salto'=>$pregunta->salto,
            'templates_idTemplates' => $idDupi
        ]);
  $pId=$Pregunta->id;
$opciones = optionsMult::where('idParent',$pregunta->id)->get();
foreach ($opciones as $opcion) {
  $Plantilla = optionsMult::create([
          'name' => $opcion->name,
          'idParent' => $pId,
          'salto' => $opcion->salto,
      ]);
      }
  }

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
