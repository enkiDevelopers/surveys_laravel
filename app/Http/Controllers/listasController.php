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


public function ingresarlista(Request $request){
        ini_set('max_execution_time', 0);

        $inicial=0;
        $arreglo=null;
        $nombre=$request->input('nombre');
        //$nombre="lista.js";

        //$archivo->move('listas',$nombre);
        if($request->hasFile('archivo')) {
                $file = $request->file('archivo');
                $dato=$request->file('archivo')->getClientOriginalName();
                $file->move('listas', $dato);
                $id = DB::table('listaEncuestados')->insertGetId(
                                        array( 'nombre'  => $nombre,
                                                'archivo'=>$dato,
                                               'creador' => 6));
        $handle = fopen('listas/'.$dato, "r",'ISO-8859-1');

        $fila = 1;
        while (($data = fgetcsv($handle, 1000, ",")) !== FALSE){
            $data = array_map("utf8_encode", $data);
            if($inicial==0){
                $inicial++;
            }else{
                $infor=DB::table('encuestados')->insert([
                                                    'region'  =>  $data[0],
                                                    'ciclo'=>$data[1],
                                                    'campus'=>$data[2],
                                                    'tipoIngreso'=>$data[3],
                                                    'lineaNegocio'=>$data[4],
                                                    'modalidad'=>$data[5],
                                                    'noCuenta'=>$data[6],
                                                    'nombreGeneral'=>$data[7],
                                                    'fechaNacimiento'=>$data[8],
                                                    'direccion'=>$data[9],
                                                    'email1'=>$data[10],
                                                    'telefonoCasa'=>$data[11],
                                                    'carrera'=>$data[12],
                                                    'programaCV'=>$data[13],
                                                    'programaDesc'=>$data[14],
                                                    'semestre'=>$data[15],
                                                    'vertical'=>$data[16],
                                                    'esIntercambio'=>$data[17],
                                                    'listaEncuestados_idLista' => $id  ]);
            }
        }


        }
        else{

        }
        fclose($handle);

    if (File::exists('listas/'.$dato)) {
        File::delete('listas/'.$dato);
    }else{
        return "noaparece".$dato;
    }

    }
    public function mostrarDatos($id){
        $data=DB::table('encuestados')->where('listaEncuestados_idLista','=',$id)->get();

        return view('administrator/openFile',compact('data'));


    }
    public function mostrarIncidentes($id){
        $data=DB::table('encuestados')->where('listaEncuestados_idLista','=',$id)
                                      ->where('incidente','=',1)
                                      ->get();

        return view('administrator/incidentesFile',compact('data'));


    }
    public function eliminarlista(Request $request){
        $data=DB::table('listaEncuestados')->where('idLista','=',$request->id)->delete();
        $data=DB::table('encuestados')->where('listaEncuestados_idLista','=',$request->id)->delete();

    return response()->json($request);

    }
    public function incidente(Request $request){
        $inicial=0;
        $arreglo=null;
         if($request->hasFile('incidentes')) {

                $file = $request->file('incidentes');
                $dato=$request->file('incidentes')->getClientOriginalName();
                $file->move('listas', $dato);
               
        $handle = fopen('listas/'.$dato, "r");

        $fila = 1;
        while (($data = fgetcsv($handle, 1000, ",")) !== FALSE){
            $data = array_map("utf8_encode", $data);
            if($inicial==0){
                $inicial++;
            }else{

             DB::table('encuestados')->where('noCuenta', $data[0])->update(['incidente' => 1,
                                                                            'comentario' =>$data[1]]);
            }
        }


        }
        else{

        }
    fclose($handle);

    if (File::exists('listas/'.$dato)) {
        File::delete('listas/'.$dato);
    }else{
        return "noaparece".$dato;
    }

    }
}
