<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\surveys;
use DB;
use File;
use App\usuarios;
use Input;
use Response;
use App\Client;
use PDF;
use Illuminate\Support\Facades\Crypt;
use App\jobs\crearExcel;
use Excel;



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
     $id= $request->session()->get('id');
      $campus=0;
      $encuestas = DB::table('templates')->join('publicaciones','templates.id','=','publicaciones.idTemplate')->get();
      $datosdirective =DB::table('usuarios')->where('idUsuario','=',$id)->get();

      switch ($datosdirective["0"]->type) {
        case '1': //directivo corporativo
              $datosdirective = DB::table('usuarios')->where('idUsuario','=',$id)->get();
              $campus=DB::table('ctlCampus')->select(['campus_name','campus_id'])->get();
              $regionestotal=DB::table('ctlRegions')->get();
              $regiones=DB::table('ctlRegions')->select(['regions_name','regions_id'])->get();
          break;
        case '2':   //directivo regional
              $datosdirective = DB::table('usuarios')
            ->join('ctlRegions', 'usuarios.idRegion', '=', 'ctlRegions.regions_id')
            ->select('usuarios.*','ctlRegions.regions_id','ctlRegions.regions_name')
            ->where('idUsuario','=',$id)
            ->get();
              $campus=DB::table('ctlCampus')->select(['campus_name','campus_id'])->where('regions_regions_id','=',$datosdirective["0"]->idRegion)->get();
              $regiones=DB::table('ctlRegions')->select(['regions_name','regions_id'])->where('regions_id','=',$datosdirective["0"]->idRegion)->get();

            break;
        case '3':   //directivo campus
              $datosdirective = DB::table('usuarios')
            ->join('ctlCampus', 'usuarios.idCampus', '=', 'ctlCampus.campus_id')
            ->select('usuarios.*','ctlCampus.campus_id')
            ->where('idUsuario','=',$id)
            ->get();
             $campus=DB::table('ctlCampus')->select(['campus_name','campus_id'])->where('campus_id','=',$datosdirective["0"]->campus_id)->get();
             $regiones=DB::table('ctlRegions')->select(['regions_name','regions_id'])->get();

             break;
        default:
      }
      $regionestotal=DB::table('ctlRegions')->get();
      $info = usuarios::find($id);
      return view('directive.home', compact('encuestas','datosdirective','regionestotal','regiones','campus','info'));

  }
  public function buscar(Request $request){//Busqueda de todas las encuestas
    $data = DB::table('templates')->where("id", $request->id)->get();
    return response()->json($data);
  }
  public function busquedacampus(Request $request){//busqueda por campus
    $data = DB::table('ctlCampus')->where('regions_regions_id',$request->id)->get();
    return response()->json($data);
  }
  public function estadisticaCampus($id,$idcampus){//
      $stadisticas= DB::table('estadisticas')->where('surveys_id','=',$id)
                                             ->where('campus_campus_id','=',$idcampus)->count();

      $campusid=DB::table('ctlCampus')->select('campus_name')->where('campus_id','=',$idcampus)->get();


      /*SELECCION DE LOS CANALES DE LA TABLA ENCUESTADOS*/
      $mail= DB::table('encuestados')->where([['idEncuesta','=',$id],
                                               ['campus','=',$campusid[0]->campus_name],
                                               ['canal','=','mail'],])->count();
      $conexion= DB::table('encuestados')->where([['idEncuesta','=',$id],
                                               ['campus','=',$campusid[0]->campus_name],
                                               ['canal','=','conexion'],])->count();
      $hp12c= DB::table('encuestados')->where([['idEncuesta','=',$id],
                                               ['campus','=',$campusid[0]->campus_name],
                                               ['canal','=','hp12c'],])->count();
      $facebook= DB::table('encuestados')->where([['idEncuesta','=',$id],
                                               ['campus','=',$campusid[0]->campus_name],
                                               ['canal','=','facebook'],])->count();
      $online= DB::table('encuestados')->where([['idEncuesta','=',$id],
                                               ['campus','=',$campusid[0]->campus_name],
                                               ['canal','=','online'],])->count();
      $sistema= DB::table('encuestados')->where([['idEncuesta','=',$id],
                                               ['campus','=',$campusid[0]->campus_name],
                                               ['canal','=','sistema'],])->count();
      $totalEncuestados=DB::table('encuestados')->where([['idEncuesta','=',$id],
                                                        ['campus','=',$campusid[0]->campus_name],])->count();

      /*Obtiene la linea de negocios de los encuestados disponibles*/
      $lineanegocios=DB::table('encuestados')->select('lineaNegocio')->where([['idEncuesta','=',$id],
                                                                              ['campus','=',$campusid[0]->campus_name],])->distinct()->get();


      /*Obtiene las modalidades diponibles en linea de negocios*/
      $modalidad=DB::table('encuestados')->select('modalidad')->where([['idEncuesta','=',$id],
                                                                              ['campus','=',$campusid[0]->campus_name],])->distinct()->get();
      /*END SELECCION DE LOS CANALES DE LA TABLA ENCUESTADOS*/

      $info=DB::table('encuestados')->where([['idEncuesta','=',$id],
                                            ['campus','=',$campusid[0]->campus_name],
                                            ['contestado','=',1],])->count();

      $campusname=DB::table('ctlCampus')->where('campus_id','=',$idcampus)->get();

      $datoencuesta=DB::table('templates')->where('id','=',$id)->get();
      return view('directive.report',compact('datoencuesta','info','campusname','totalEncuestados','mail','conexion','hp12c','facebook','online','sistema','lineanegocios','modalidad'));

  }

  public function estadisticasRegion($id,$idregion){
    $campus = DB::table('ctlCampus')->where('regions_regions_id','=',$idregion)->get();
    $regionname=DB::table('ctlRegions')->select('regions_name')->where('regions_id','=',$idregion)->get();


      /*SELECCION DE LOS CANALES DE LA TABLA ENCUESTADOS*/
      $mail= DB::table('encuestados')->where([['idEncuesta','=',$id],
                                               ['region','=',$regionname[0]->regions_name],
                                               ['canal','=','mail'],])->count();
      $conexion= DB::table('encuestados')->where([['idEncuesta','=',$id],
                                               ['region','=',$regionname[0]->regions_name],
                                               ['canal','=','conexion'],])->count();
      $hp12c= DB::table('encuestados')->where([['idEncuesta','=',$id],
                                               ['region','=',$regionname[0]->regions_name],
                                               ['canal','=','hp12c'],])->count();
      $facebook= DB::table('encuestados')->where([['idEncuesta','=',$id],
                                               ['region','=',$regionname[0]->regions_name],
                                               ['canal','=','facebook'],])->count();
      $online= DB::table('encuestados')->where([['idEncuesta','=',$id],
                                               ['region','=',$regionname[0]->regions_name],
                                               ['canal','=','online'],])->count();
      $sistema= DB::table('encuestados')->where([['idEncuesta','=',$id],
                                               ['region','=',$regionname[0]->regions_name],
                                               ['canal','=','sistema'],])->count();
      $totalEncuestados=DB::table('encuestados')->where([['idEncuesta','=',$id],
                                                         ['region','=',$regionname[0]->regions_name],])->count();

      /*Obtiene la linea de negocios de los encuestados disponibles*/
      $info=DB::table('encuestados')->where([['idEncuesta','=',$id],
                                            ['region','=',$regionname[0]->regions_name],
                                            ['contestado','=',1],])->count();
      /*Obtiene la linea de negocios de los encuestados disponibles*/
      $lineanegocios=DB::table('encuestados')->select('lineaNegocio')->where([['idEncuesta','=',$id],
                                                                              ['region','=',$regionname[0]->regions_name],])->distinct()->get();


      /*Obtiene las modalidades diponibles en linea de negocios*/
      $modalidad=DB::table('encuestados')->select('modalidad')->where([['idEncuesta','=',$id],
                                                                      ['region','=',$regionname[0]->regions_name],])->distinct()->get();

    $estadisticas = DB::table('encuestados')
                  ->select('campus')
                  ->where('idEncuesta','=',$id)
                  ->where('region','=',$regionname[0]->regions_name)
                  ->distinct()
                  ->get();

    $regioname= DB::table('ctlRegions')->where('regions_id','=',$idregion)->get();
    $datoencuesta=DB::table('templates')->where('id','=',$id)->get();
    return view('directive.report1',compact('datoencuesta','estadisticas','info','totalEncuestados','regioname','mail','conexion','hp12c','facebook','online','sistema','lineanegocios','modalidad'));

  }
  public function estadisticasGeneral($id){
          $totalEncuestados=DB::table('encuestados')->where([['idEncuesta','=',$id],])->count();
          $regiones=DB:: table('ctlRegions')->get();

    $estadisticas = DB::table('encuestados')
                  ->select('region')
                  ->where('idEncuesta','=',$id)
                  ->distinct()
                  ->get();
        $info=DB::table('encuestados')->where([['idEncuesta','=',$id],
                                            ['contestado','=',1],])->count();

      $mail= DB::table('encuestados')->where([['idEncuesta','=',$id],
                                               ['canal','=','mail'],])->count();
      $conexion= DB::table('encuestados')->where([['idEncuesta','=',$id],
                                               ['canal','=','conexion'],])->count();
      $hp12c= DB::table('encuestados')->where([['idEncuesta','=',$id],
                                               ['canal','=','hp12c'],])->count();
      $facebook= DB::table('encuestados')->where([['idEncuesta','=',$id],
                                               ['canal','=','facebook'],])->count();
      $online= DB::table('encuestados')->where([['idEncuesta','=',$id],
                                               ['canal','=','online'],])->count();
      $sistema= DB::table('encuestados')->where([['idEncuesta','=',$id],
                                               ['canal','=','sistema'],])->count();

      /*Obtiene la linea de negocios de los encuestados disponibles*/
      $lineanegocios=DB::table('encuestados')->select('lineaNegocio')->where([['idEncuesta','=',$id],])->distinct()->get();


      /*Obtiene las modalidades diponibles en linea de negocios*/
      $modalidad=DB::table('encuestados')->select('modalidad')->where([['idEncuesta','=',$id],])->distinct()->get();

        $datoencuesta=DB::table('templates')->where('id','=',$id)->get();

        return view('directive.reporteGeneral',compact('mail','conexion','hp12c','facebook','online','sistema','modalidad','lineanegocios','totalEncuestados','info','datoencuesta','estadisticas','regiones'));
  }
  public function generarPdf(){
    $clients =Client::all();
    $pdf=PDF::loadView('directive.reporteGeneral',['clients'=>$clients]);
    return $pdf->download('reporte.pdf');
  }
  /*funciones para directivo campus*/
  public function busquedalinea(Request $request){
      $idlinea=$request->Input('id');
      $idencuesta=$request->input('idencuesta');
      $campusname=$request->input('campus');

      $info=DB::table('encuestados')->where('campus','=',$campusname)
                                    ->where('lineaNegocio','=',$idlinea)
                                    ->where('idEncuesta','=',$idencuesta)
                                    ->get();

      $infot=DB::table('encuestados')->select('lineaNegocio','modalidad')
                                     ->where('campus','=',$campusname)
                                     ->where('lineaNegocio','=',$idlinea)
                                     ->where('idEncuesta','=',$idencuesta)
                                     ->distinct()
                                     ->get();

                                     //echo $infot;
      return response()->json(array('info'=>$info,'infot'=>$infot));

  }
  public function busquedamodalidad(Request $request){
      $idmodalidad=$request->Input('id');
      $idencuesta=$request->input('idencuesta');
      $campusname=$request->input('campus');

      $info=DB::table('encuestados')->where('campus','=',$campusname)
                                    ->where('modalidad','=',$idmodalidad)
                                    ->where('idEncuesta','=',$idencuesta)
                                    ->get();

      $infot=DB::table('encuestados')->select('lineaNegocio','modalidad')
                                     ->where('campus','=',$campusname)
                                     ->where('modalidad','=',$idmodalidad)
                                     ->where('idEncuesta','=',$idencuesta)
                                     ->distinct()
                                     ->get();

      return response()->json(array('info'=>$info,'infot'=>$infot));

  }
  public function busquedageneral(Request $request){
      //$idmodalidad=$request->Input('id');
      $idencuesta=$request->input('idencuesta');
      $campusname=$request->input('campus');

      $info=DB::table('encuestados')->where('campus','=',$campusname)
                                    ->where('idEncuesta','=',$idencuesta)
                                    ->get();

      $infot=DB::table('encuestados')->select('lineaNegocio','modalidad')
                                     ->where('campus','=',$campusname)
                                     ->where('idEncuesta','=',$idencuesta)
                                     ->distinct()
                                     ->get();

      return response()->json(array('info'=>$info,'infot'=>$infot));

  }

  /* Fin funciones directivos campus*/


  /*Funciones para directivo regional*/
    public function busquedageneralr(Request $request){
      //$idmodalidad=$request->Input('id');
      $idencuesta=$request->input('idencuesta');
      $regionname=$request->input('region');

      $info=DB::table('encuestados')->where('region','=',$regionname)
                                    ->where('idEncuesta','=',$idencuesta)
                                    ->get();

      $infot=DB::table('encuestados')->select('lineaNegocio','modalidad')
                                     ->where('region','=',$regionname)
                                     ->where('idEncuesta','=',$idencuesta)
                                     ->distinct()
                                     ->get();

      return response()->json(array('info'=>$info,'infot'=>$infot));

  }
    public function busquedalinear(Request $request){
      $idlinea=$request->Input('id');
      $idencuesta=$request->input('idencuesta');
      $regionsname=$request->input('region');

      $info=DB::table('encuestados')->where('region','=',$regionsname)
                                    ->where('lineaNegocio','=',$idlinea)
                                    ->where('idEncuesta','=',$idencuesta)
                                    ->get();

      $infot=DB::table('encuestados')->select('lineaNegocio','modalidad')
                                     ->where('region','=',$regionsname)
                                     ->where('lineaNegocio','=',$idlinea)
                                     ->where('idEncuesta','=',$idencuesta)
                                     ->distinct()
                                     ->get();

      return response()->json(array('info'=>$info,'infot'=>$infot));

  }
  public function busquedamodalidadr(Request $request){
      $idmodalidad=$request->Input('id');
      $idencuesta=$request->input('idencuesta');
      $regionsname=$request->input('region');

      $info=DB::table('encuestados')->where('region','=',$regionsname)
                                    ->where('modalidad','=',$idmodalidad)
                                    ->where('idEncuesta','=',$idencuesta)
                                    ->get();

      $infot=DB::table('encuestados')->select('lineaNegocio','modalidad')
                                     ->where('region','=',$regionsname)
                                     ->where('modalidad','=',$idmodalidad)
                                     ->where('idEncuesta','=',$idencuesta)
                                     ->distinct()
                                     ->get();

      return response()->json(array('info'=>$info,'infot'=>$infot));

  }
  /*Fin funciones directivo regional*/

  /*funciones directivo general */

    public function busquedageneralrg(Request $request){
      //$idmodalidad=$request->Input('id');
      $idencuesta=$request->input('idencuesta');
      $regionname=$request->input('region');

      $info=DB::table('encuestados')->where('idEncuesta','=',$idencuesta)
                                    ->get();

      $infot=DB::table('encuestados')->select('lineaNegocio','modalidad')
                                     ->where('idEncuesta','=',$idencuesta)
                                     ->distinct()
                                     ->get();

      return response()->json(array('info'=>$info,'infot'=>$infot));

  }

 public function busquedalinearg(Request $request){
      $idlinea=$request->Input('id');
      $idencuesta=$request->input('idencuesta');
      //$regionsname=$request->input('region');

      $info=DB::table('encuestados')->where('lineaNegocio','=',$idlinea)
                                    ->where('idEncuesta','=',$idencuesta)
                                    ->get();

      $infot=DB::table('encuestados')->select('lineaNegocio','modalidad')
                                     ->where('lineaNegocio','=',$idlinea)
                                     ->where('idEncuesta','=',$idencuesta)
                                     ->distinct()
                                     ->get();

      return response()->json(array('info'=>$info,'infot'=>$infot));

  }
  public function busquedamodalidadrg(Request $request){
      $idmodalidad=$request->Input('id');
      $idencuesta=$request->input('idencuesta');
      //$regionsname=$request->input('region');

      $info=DB::table('encuestados')->where('modalidad','=',$idmodalidad)
                                    ->where('idEncuesta','=',$idencuesta)
                                    ->get();

      $infot=DB::table('encuestados')->select('lineaNegocio','modalidad')
                                     ->where('modalidad','=',$idmodalidad)
                                     ->where('idEncuesta','=',$idencuesta)
                                     ->distinct()
                                     ->get();

      return response()->json(array('info'=>$info,'infot'=>$infot));

  }
    /*Fun funciones generales*/

/*Funciones Excel */
 /* public function excelcampus(Request $request){
      $idencuesta=$request->input('idencuesta');
      $campus=$request->input('campus');

      $encuestados=DB::table('encuestados')->where('contestado','=',0)
                                           ->where('idEncuesta','=',$idencuesta)
                                           ->where('campus','=',$campus)
                                           ->get();
       $myFile= Excel::create('Data', function($excel)use($encuestados) {
          $excel->sheet('Datos', function($sheet) use($encuestados) {
            $sheet->row(1,['Region','Carrera','Modalidad','Campus','Lin. Negocio','No. Cuenta','Nombre','Dirección','Email','Tel.Casa']);
            foreach ($encuestados as $encuestado) {
              $row=[];
              $row[0]=$encuestado->region;
              $row[1]=$encuestado->carrera;
              $row[2]=$encuestado->modalidad;
              $row[3]=$encuestado->campus;
              $row[4]=$encuestado->lineaNegocio;
              $row[5]=$encuestado->noCuenta;
              $row[6]=$encuestado->nombreGeneral;
              $row[7]=$encuestado->direccion;
              $row[8]=$encuestado->email1;
              $row[9]=$encuestado->telefonoCasa;
              $sheet->appendRow($row);
          }
});
        });


$myFile = $myFile->string('xlsx'); //change xlsx for the format you want, default is xls
$response =  array(
   'name' => "filename", //no extention needed
   'file' => "data:application/vnd.openxmlformats-officedocument.spreadsheetml.sheet;base64,".base64_encode($myFile) //mime type of used format
);
return response()->json($response);
  } */

    public function excelregion1(Request $request){
      $idencuesta=$request->input('idencuesta');
      $region=$request->input('region');


        $job = new crearExcel($idencuesta,$region);
        dispatch($job);
        return response()->json("hola");
  }
 /*      $myFile= Excel::create('Data', function($excel)use($encuestados) {
          $excel->sheet('Datos', function($sheet) use($encuestados) {
            $sheet->row(1,['Region','Carrera','Modalidad','Campus','Lin. Negocio','No. Cuenta','Nombre','Dirección','Email','Tel.Casa']);
            foreach ($encuestados as $encuestado) {
              $row=[];
              $row[0]=$encuestado->region;
              $row[1]=$encuestado->carrera;
              $row[2]=$encuestado->modalidad;
              $row[3]=$encuestado->campus;
              $row[4]=$encuestado->lineaNegocio;
              $row[5]=$encuestado->noCuenta;
              $row[6]=$encuestado->nombreGeneral;
              $row[7]=$encuestado->direccion;
              $row[8]=$encuestado->email1;
              $row[9]=$encuestado->telefonoCasa;
              $sheet->appendRow($row);
          }
});
        });


$myFile = $myFile->string('xlsx'); //change xlsx for the format you want, default is xls
$response =  array(
   'name' => "filename", //no extention needed
   'file' => "data:application/vnd.openxmlformats-officedocument.spreadsheetml.sheet;base64,".base64_encode($myFile) //mime type of used format
);
return response()->json($response);*/


  public function excelgeneral(Request $request){
      $idencuesta=$request->input('idencuesta');

      $encuestados=DB::table('encuestados')->where('contestado','=',0)
                                           ->where('idEncuesta','=',$idencuesta)
                                           ->get();
       $myFile= Excel::create('Data', function($excel)use($encuestados) {
          $excel->sheet('Datos', function($sheet) use($encuestados) {
            $sheet->row(1,['Region','Carrera','Modalidad','Campus','Lin. Negocio','No. Cuenta','Nombre','Dirección','Email','Tel.Casa']);
            foreach ($encuestados as $encuestado) {
              $row=[];
              $row[0]=$encuestado->region;
              $row[1]=$encuestado->carrera;
              $row[2]=$encuestado->modalidad;
              $row[3]=$encuestado->campus;
              $row[4]=$encuestado->lineaNegocio;
              $row[5]=$encuestado->noCuenta;
              $row[6]=$encuestado->nombreGeneral;
              $row[7]=$encuestado->direccion;
              $row[8]=$encuestado->email1;
              $row[9]=$encuestado->telefonoCasa;
              $sheet->appendRow($row);
          }
});
        });


$myFile = $myFile->string('xlsx'); //change xlsx for the format you want, default is xls
$response =  array(
   'name' => "filename", //no extention needed
   'file' => "data:application/vnd.openxmlformats-officedocument.spreadsheetml.sheet;base64,".base64_encode($myFile) //mime type of used format
);
return response()->json($response);
  }



public function uploadImage(Request $request)
{
  $idUsuario = $request->session()->get('id');

  $icono=$request->file('file-input');
  if (empty($icono)) {
      $nombre="default.png";
  }else {
    $nombre=date("his").".png";
    $icono->move('img/avatar',$nombre);

  }
$usuario = usuarios::find($idUsuario);
$usuario->imagenPerfil=$nombre;
$usuario->save();

$info= $usuario;
    return redirect()->route('directive');
}


}
