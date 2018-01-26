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

  public function show_cards($id)
  {
      $campus=0;
      $encuestas = DB::table('surveys')->get();
      $datosdirective =DB::table('directives')->where('idDirectives','=',$id)->get();
      switch ($datosdirective["0"]->type) {
        case '1':
              $datosdirective=DB::table('directives')->where('idDirectives','=',$id)->get();   
              $campus=DB::table('campus')->select(['campus_name','campus_id'])->get();
    
          break;
        case '2':
              $datosdirective = DB::table('directives')
            ->join('regions', 'directives.idDirectives', '=', 'regions.directives_idDirectives')
            ->select('directives.*','regions.regions_id')
            ->where('idDirectives','=',$id)
            ->get();
              $campus=DB::table('campus')->select(['campus_name','campus_id'])->where('regions_regions_id','=',$datosdirective["0"]->regions_id)->get();
            break;
        case '3':
              $datosdirective = DB::table('directives')
            ->join('campus', 'directives.idDirectives', '=', 'campus.directives_idDirectives')
            ->select('directives.*','campus.campus_id')
            ->where('idDirectives','=',$id)
            ->get();
             $campus=DB::table('campus')->select(['campus_name','campus_id'])->where('directives_idDirectives','=',$id)->get();

             break;
        default:
          
          break;
      }

      $regionestotal=DB::table('regions')->get();
      $regiones=DB::table('regions')->select(['regions_name','regions_id'])->where('directives_idDirectives','=',$id)->get();

      return view('directive.home', compact('encuestas','datosdirective','regionestotal','regiones','campus'));

  }
  public function buscar(Request $request){
    $data = DB::table('surveys')->where("id", $request->id)->get();
    return response()->json($data);
  }
  public function busquedacampus(Request $request){
    $data = DB::table('campus')->where('regions_regions_id',$request->id)->get();
    return response()->json($data);
  }
  public function estadisticaCampus($id,$idcampus){
      $stadisticas= DB::table('statistics')->where([['surveys_id','=',$id],
                                                   ['campus_campus_id','=',$idcampus],])->count();
      if ($stadisticas==0){
      $idstatica = DB::table('statistics')->insertGetId([
                                                  'total_encuestados' => '0', 
                                                  'total_alumnos' =>'0',
                                                  'total_empleados' =>'0',
                                                  'total_incidentes' =>'0',
                                                  'total_incidentes_alumnos' =>'0',
                                                  'total_incidentes_empleados' =>'0',
                                                  'total_contestados' =>'0',
                                                  'total_contestados_alumnos'=>'0',
                                                  'total_contestados_empleados'=>'0',
                                                  'campus_campus_id'=>$idcampus,
                                                  'directives_idDirectives'=>1,
                                                  'surveys_id'=> $id]);
      }
      $info= DB::table('statistics')->where([  ['surveys_id','=',$id],
                                               ['campus_campus_id','=',$idcampus],])->get();

      $datoencuesta=DB::table('surveys')->where('id','=',$id)->get();

      return view('directive.report',compact('datoencuesta','info'));
  }
  public function estadisticasRegion($id,$idregion){
    $campus = DB::table('campus')->where('regions_regions_id','=',$idregion)->get();

    foreach ($campus as $campusdatos) {
       $stadisticas= DB::table('statistics')->where([['surveys_id','=',$id],
                                                    ['campus_campus_id','=',$campusdatos->campus_id],])->count();
      if ($stadisticas==0){
      $idstatica = DB::table('statistics')->insertGetId([
                                                  'total_encuestados' => '0', 
                                                  'total_alumnos' =>'0',
                                                  'total_empleados' =>'0',
                                                  'total_incidentes' =>'0',
                                                  'total_incidentes_alumnos' =>'0',
                                                  'total_incidentes_empleados' =>'0',
                                                  'total_contestados' =>'0',
                                                  'total_contestados_alumnos'=>'0',
                                                  'total_contestados_empleados'=>'0',
                                                  'campus_campus_id'=>$campusdatos->campus_id,
                                                  'directives_idDirectives'=>1,
                                                  'surveys_id'=> $id]);
      }
    }

    $estadisticas = DB::table('statistics')
                  ->join('campus', 'statistics.campus_campus_id', '=', 'campus.campus_id')
                  ->select('statistics.*','campus.*')
                  ->where('statistics.surveys_id','=',$id)
                  ->where('campus.regions_regions_id','=',$idregion)
                  ->get();

    $datoencuesta=DB::table('surveys')->where('id','=',$id)->get();

    return view('directive.report1',compact('datoencuesta','estadisticas'));


  }
  private function datos(){

  }




}
