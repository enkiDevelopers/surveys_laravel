<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\surveys;
use DB;
use File;
use Input;
use Response;

class directiveController extends Controller
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

  public function show_cards(Request $request)
  {
      $id = $request->id;
      $encuestas = DB::table('surveys')->get();
      $datosdirective=DB::table('directives')->select(['idDirectives','nombre','apPaterno','apMaterno','type'] )->where('idDirectives','=',$id)->get();
      
      $regionestotal=DB::table('regions')->get();
      $regiones=DB::table('regions')->select(['regions_name','regions_id'])->where('directives_idDirectives','=',$id)->get();
      foreach ($regiones as $region) 
            $regionid=$region->regions_id;

      $campusregion=DB::table('campus')->select(['campus_name','campus_id'])->where('regions_regions_id','=',$regionid)->get();
    
      $campus=DB::table('campus')->select(['campus_name','campus_id'])->where('directives_idDirectives','=',$id)->get();
      return view('directive.home', compact('encuestas','datosdirective','regionestotal','regiones','campus','campusregion'));

  }
  public function buscar(Request $request){
    $data = DB::table('surveys')->where("id", $request->id)->get();
    return response()->json($data);
  }
  public function busquedacampus(Request $request){
    $data = DB::table('campus')->where('regions_regions_id',$request->id)->get();
    return response()->json($data);

  }



}
