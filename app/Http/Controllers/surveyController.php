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
use App\listas;
use App\tipos;
class surveyController extends Controller
{

  public function save(Request $request)
  {

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
      $surv->creador= 1;
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

      $listas=listas::where('creador', $id)->get();
      return view('administrator.surveys', compact('propias','agenas','listas','tipos'));
    }

  }

  public function updateDataTemplate(Request $request)
  {
    $idTemplate = $request['idTemplate'];
    $titulo = $request['titleInput'];
    $descripcion = $request['descInput'];
    $nombre =$request['nombre'];

     $surv = new templates;
     $surv::where('id', $idTemplate)->update(array('tituloEncuesta' => $titulo, 'descripcion' => $descripcion, 'imagePath' => $nombre));

     return $surv;
  }

}
