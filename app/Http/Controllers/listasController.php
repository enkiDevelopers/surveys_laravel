<?php

namespace App\Http\Controllers;

use App\Listas;
use Illuminate\Http\Request;
use App\templates;
use App\encuestados;
use App\questionsTemplates;
use App\recordatorios;
use DB;
use File;
use Input;
use Mail;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\usuarios;
use App\publicaciones;
use App\listaEncuestados;
use App\ctlTipoEncuesta as tipos;
use App\optionsMult;
use Excel;
use App\jobs\IngresarLista;
use App\jobs\ingresarIncidente;
use App\jobs\Marcarlisto;

use Illuminate\Support\Facades\Storage;

class listasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    /**
     * Display the specified resource.
     *
     * @param  \App\Listas  $listas
     * @return \Illuminate\Http\Response
     */
    public function show(Listas $listas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Listas  $listas
     * @return \Illuminate\Http\Response
     */
    public function edit(Listas $listas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Listas  $listas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Listas $listas)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Listas  $listas
     * @return \Illuminate\Http\Response
     */
    public function destroy(Listas $listas)
    {
        //
    }


public function ingresarDatos(Request $request){//acepta los datos 
    $idlista=$request->input('id');
    //obtiene los recursos que le correponde a lista
    $data=DB::table('recursos')->where('idlista','=',$idlista)->get();
    $cantidad=DB::table('recursos')->where('idlista','=',$idlista)->count();
    //marca lista con stauts 3
    DB::table('listaEncuestados')->where('idLista',$idlista)->update(['carga'=>3]);
    //recorre las listas encontradas
    foreach ($data as $datas) {
         $path= $datas->path;
         //despacha las listas a los jobs
         $job = new IngresarLista($path,$idlista,$cantidad);
         dispatch($job);
         //manda un contador
         $cantidad--;
    } 
}

public function ingresarMasDatos2(Request $request){
            echo "Algo raro está pasando \n";    
            //return back();
}
public function checarlist(Request $request){//funcion que obtiene el nombre para mostrar

    $data=DB::table('recursos')->select('orginalname')->where('idLista','=',$request->id)->get();

    return response()->json($data);
}

public function ingresarMasDatos(Request $request){//recibe el archivo que se guarda
    try{
        //ini_set('max_execution_time', 0);
        $listaid=$request->input('listaid');
        //obtiene un nombre con codificacion md5
        $nombrepath=md5(microtime(true));
        $nombrepath=$nombrepath.".xlsx";
        //cuestiona la existencia del archivo
        if($request->hasFile('datos')) {
                $file = $request->file('datos');
                $dato=$request->file('datos')->getClientOriginalName();
                //guada archivo en carpeta
                $file->move('listas/', $nombrepath);
                //inserta el nombre del archivo y obtiene el id
                $INFO=DB::table('recursos')->insertGetId([ 'path'=> $nombrepath,
                                                           'orginalname'=>$dato,
                                                           'idlista'=>$listaid]);
                //actualiza el estatus del archivo
                DB::table('listaEncuestados')->where('idLista',$listaid)->update(['carga'=>2]);
                
        }else{
            echo "Algo raro está pasando \n";    
        }
        /*$job = new IngresarLista($dato,$listaid);
        dispatch($job);*/
          
         
    }catch(Exception $e){
        echo 'Excepción capturada: ',  $e->getMessage(), "\n";
    }
    return back();
}
private function guardarListaBD($nombre,$id2){//crea nombre de la lista la tabla
    $factual=date('Y-m-d H:m:s');

    $id = DB::table('listaEncuestados')->insertGetId(
                                        array( 'nombre'  => $nombre,
                                               'archivo' => null,
                                               'carga'=>0,
                                               'creador' => $id2,
                                               'created_at'=>$factual));
  return $id;  
}
public function ingresarlista(Request $request){//llama funcion guardarlistabd
        $nombre=$request->input('nombre');

                $arreglo=null;
                $usrid=$request->session()->get('id');  
                $id=$this->guardarListaBD($nombre,$usrid);
  
    /* $INFO=DB::table('listaEncuestados')->where('idLista','=',$idarray['id'])
                                        ->update(['carga'=> 1]); */ 
return back();

}
    public function checarjob(Request $request){//realizar constantes peticiones para ver los estatus de la lista
        $data=DB::table('jobs')->count();
        if($data==0){
            return 1;
        }else{
            return 0;
        }

    }

    public function mostrarDatos($id){ //muesta los datos que contienen las listas
        $data=DB::table('encuestados')->where('listaEncuestados_idLista','=',$id)->get();

        return view('administrator/openFile',compact('data'));


    }
    public function mostrarIncidentes($id){//muestra los datos de incidentes que contienen las listas
        $data=DB::table('encuestados')->where('listaEncuestados_idLista','=',$id)
                                      ->where('incidente','=',1)
                                      ->get();

        return view('administrator/incidentesFile',compact('data'));


    }
    public function eliminarlista(Request $request){//elimina listas
        $data=DB::table('listaEncuestados')->where('idLista','=',$request->id)->delete();
        $data=DB::table('encuestados')->where('listaEncuestados_idLista','=',$request->id)->delete();

    return response()->json($request);

    }
    public function respuesta(){
        return "algo";
    }
    public function incidente(Request $request){//ingresa lista de incidentes 
        ini_set('max_execution_time', 0);
        $listaid=$request->input('idlista');
        $inicial=0;
        $arreglo=null;
        //cuestiona la existencia
         if($request->hasFile('incidentes')) {
                $file = $request->file('incidentes');
                $dato=$request->file('incidentes')->getClientOriginalName();
                $file->move('listas', $dato);
        }
        DB::table('listaEncuestados')->where('idLista',$listaid)->update(['carga'=>4]);
        //despacha los datos
      $job = new ingresarIncidente($listaid,$dato);
      dispatch($job);
        

}
    public function generarReporte(Request $request){
        $idEncuesta=$request->id;
        //Obtenemos los campus en la encusta
        $campus=DB::table('encuestados')->select('campus')
                                        ->where('idEncuesta','=',$idEncuesta)->get();
        //recorremos el nombre de los campus

        foreach ($campus as $campusid) {
            $idcampus=DB::table('ctlCampus')->select('campus_id')
                                            ->where('campus_name','=',$campusid->campus)->get();
                    foreach ($idcampus as $idcampu) { 
                        $check=DB::table('estadisticas')->where('campus_campus_id','=',$idcampu->campus_id)
                                                        ->where('surveys_id','=',$idEncuesta)->count();
                        if($check==0){
                        $totalencuestados=DB::table('encuestados')->where('idEncuesta','=',$idEncuesta)
                                            ->where('campus','=',$campusid->campus)->count();

                        $totalalumnos=DB::table('encuestados')
                                                            ->where('idEncuesta','=',$idEncuesta)
                                                            ->whereNotNull('noCuenta')
                                                            ->where('campus','=',$campusid->campus)->count();
                        $totalempleados=DB::table('encuestados')
                                                            ->where('idEncuesta','=',$idEncuesta)
                                                            ->whereNull('noCuenta')
                                                            ->where('campus','=',$campusid->campus)->count();
                        $totalincidentes=DB::table('encuestados')
                                                            ->where('idEncuesta','=',$idEncuesta)
                                                            ->where('incidente','=',1)
                                                            ->where('campus','=',$campusid->campus)->count();


                        $totalincidentesalumnos=DB::table('encuestados')
                                                            ->where('idEncuesta','=',$idEncuesta)
                                                            ->where('incidente','=',1)
                                                            ->whereNotNull('noCuenta')
                                                            ->where('campus','=',$campusid->campus)->count();

                        $totalincidentesempleados=DB::table('encuestados')
                                                            ->where('idEncuesta','=',$idEncuesta)
                                                            ->where('incidente','=',1)
                                                            ->whereNull('noCuenta')
                                                            ->where('campus','=',$campusid->campus)->count();
                        $totalcontestados=DB::table('encuestados')
                                                            ->where('idEncuesta','=',$idEncuesta)
                                                            ->where('incidente', '=',0)
                                                            ->where('contestado','=',1)
                                                            ->where('campus','=',$campusid->campus)->count();
                        $totalcontestadosalumnos=DB::table('encuestados')
                                                            ->where('idEncuesta','=',$idEncuesta)
                                                            ->where('incidente', '=',0)
                                                            ->where('contestado','=',1)
                                                            ->whereNotNull('noCuenta')
                                                           ->where('campus','=',$campusid->campus)->count();

                        $totalcontestadosempleados=DB::table('encuestados')
                                                            ->where('idEncuesta','=',$idEncuesta)
                                                            ->where('incidente', '=',0)
                                                            ->where('contestado','=',1)
                                                            ->whereNull('noCuenta')
                                                            ->where('campus','=',$campusid->campus)->count();


                        $idEstadisticas=DB::table('estadisticas')->insertGetId([
                                                                                'total_encuestados'=>$totalencuestados,
                                                                                'total_alumnos'=>$totalalumnos,
                                                                                'total_empleados'=>$totalempleados,
                                                                                'total_incidentes'=>$totalincidentes,
                                                                                'total_incidentes_alumnos'=>$totalincidentesalumnos,
                                                                                'total_incidentes_empleados'=>$totalincidentesempleados,
                                                                                'total_contestados'=>$totalcontestados,
                                                                                'total_contestados_alumnos'=>$totalcontestadosalumnos,
                                                                                'total_contestados_empleados'=>$totalcontestadosempleados,
                                                                                'campus_campus_id'=>$idcampu->campus_id,
                                                                                'surveys_id'=> $idEncuesta]);
                        }if($check!=0){

                        $totalencuestados=DB::table('encuestados')->where('idEncuesta','=',$idEncuesta)
                                                                  ->where('campus','=',$campusid->campus)->count();

                        $totalalumnos=DB::table('encuestados')
                                                            ->where('idEncuesta','=',$idEncuesta)
                                                            ->whereNotNull('noCuenta')
                                                            ->where('campus','=',$campusid->campus)->count();

                        $totalempleados=DB::table('encuestados')
                                                            ->where('idEncuesta','=',$idEncuesta)
                                                            ->whereNull('noCuenta')
                                                            ->where('campus','=',$campusid->campus)->count();
                        $totalincidentes=DB::table('encuestados')
                                                            ->where('idEncuesta','=',$idEncuesta)
                                                            ->where('incidente','=',1)
                                                            ->where('campus','=',$campusid->campus)->count();


                        $totalincidentesalumnos=DB::table('encuestados')
                                                            ->where('idEncuesta','=',$idEncuesta)
                                                            ->where('incidente','=',1)
                                                            ->whereNotNull('noCuenta')
                                                            ->where('campus','=',$campusid->campus)->count();

                        $totalincidentesempleados=DB::table('encuestados')
                                                            ->where('idEncuesta','=',$idEncuesta)
                                                            ->where('incidente','=',1)
                                                            ->whereNull('noCuenta')
                                                            ->where('campus','=',$campusid->campus)->count();
                        $totalcontestados=DB::table('encuestados')
                                                            ->where('idEncuesta','=',$idEncuesta)
                                                            ->where('incidente', '=',0)
                                                            ->where('contestado','=',1)
                                                            ->where('campus','=',$campusid->campus)->count();
                        $totalcontestadosalumnos=DB::table('encuestados')
                                                            ->where('idEncuesta','=',$idEncuesta)
                                                            ->where('incidente', '=',0)
                                                            ->where('contestado','=',1)
                                                            ->whereNotNull('noCuenta')
                                                           ->where('campus','=',$campusid->campus)->count();

                        $totalcontestadosempleados=DB::table('encuestados')
                                                            ->where('idEncuesta','=',$idEncuesta)
                                                            ->where('incidente', '=',0)
                                                            ->where('contestado','=',1)
                                                            ->whereNull('noCuenta')
                                                            ->where('campus','=',$campusid->campus)->count();


                        $idEstadisticas=DB::table('estadisticas')->where('surveys_id',$idEncuesta)
                                                                 ->where('campus_campus_id',$idcampu->campus_id)
                                                                 ->update([
                                                                                'total_encuestados'=>$totalencuestados,
                                                                                'total_alumnos'=>$totalalumnos,
                                                                                'total_empleados'=>$totalempleados,
                                                                                'total_incidentes'=>$totalincidentes,
                                                                                'total_incidentes_alumnos'=>$totalincidentesalumnos,
                                                                                'total_incidentes_empleados'=>$totalincidentesempleados,
                                                                                'total_contestados'=>$totalcontestados,
                                                                                'total_contestados_alumnos'=>$totalcontestadosalumnos,
                                                                                'total_contestados_empleados'=>$totalcontestadosempleados]);
            }
        }
}

}
}