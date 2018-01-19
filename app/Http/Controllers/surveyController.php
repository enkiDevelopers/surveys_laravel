<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\templates2s;
use DB;
use File;
use Input;
use Illuminate\Database\Eloquent\SoftDeletes;


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
      $surv = new templates2s;
      $surv->tituloEncuesta = $titulo;
      $surv->descripcion= $descripcion;
      $surv->imagePath= $nombre;
      $surv->creador= 1;
      $surv->save();

      $eid =$surv->id;
      return view('administrator.edit',compact('titulo','descripcion','nombre', 'eid'));
  }

  public function show_cards()
  {

    //$propias = DB::table('templates2s')->join('administradores', 'templates2s.creador', '=', 'administradores.id_admin')->where('administradores.id_admin', '1')->orderby('id_admin', 'asc')->get();
    $agenas = DB::table('templates2s')->join('administradores', 'templates2s.creador', '=', 'administradores.id_admin')->where('administradores.id_admin','!=','1')->orderby('id_admin', 'asc')->get();

    $propias = templates2s::join('administradores', 'templates2s.creador', '=', 'administradores.id_admin')->where('administradores.id_admin', '1')->orderby('id', 'desc')->get();
    $agenas = templates2s::join('administradores', 'templates2s.creador', '=', 'administradores.id_admin')->where('administradores.id_admin','!=','1')->orderby('id', 'desc')->get();




      return view('administrator.surveys', compact('propias','agenas'));

  }


}
