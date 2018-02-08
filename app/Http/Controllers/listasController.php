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
                                       'archivo' => $dato, 
                                       'creador' => 6));
        $handle = fopen('listas/'.$dato, "r");

        $fila = 1;
        while (($data = fgetcsv($handle, 1000, ",")) !== FALSE){
            if($inicial==0){
                $inicial++;
            }else{
            try{
                $infor=DB::table('encuestados')->insert(
                                            ['email1'    => $data[0],
                                             'email2'    => $data[1],
                                             'email3'    => $data[2],
                                             'name'      => $data[3],
                                             'apPaterno' => $data[4],
                                             'apMaterno' => $data[5],
                                             'matricula' => $data[6],
                                             'clave'     => $data[7],
                                             'listaEncuestados_idLista' => $id]
                                             );
            return 1;
        }catch(\Exception  $e){
                DB::table('encuestados')->where('listaEncuestados_idLista','=',$id)->delete();
                DB::table('listaEncuestados')->where('idLista','=',$id)->delete();

                return 0;

        }

        }
        }

        /*if (($gestor = fopen("listas/".$dato, "r")) !== FALSE) {
            while (($datos = fgetcsv($gestor, " ")) !== FALSE) {
                $numero = count($datos);
                $fila++;
                if($inicial==0){
                    for ($c=0; $c < $numero; $c++) {
                        $campo=$datos[$c].",";
                        DB::insert('insert into users (id, name) values (?, ?)', [1, 'Dayle']);
                }
                    $inicial++;
                }else{

                }

        }
    fclose($gestor);
}*/

       /* while (!feof($data)){
            if($inicial==0){
                    $cabecera= fgets($data);
                    echo $cabecera;
                    $inicial++;
            }else{
                $cuerpo= fgets($data);
                echo $cuerpo;
                $inicial++;
                $id = DB::table('encuestados')->insertGetId(
                                        ['email' => 'john@example.com', 'votes' => 0]
                );

            }
        }*/
           /* if (($fichero = fopen($file, "r")) !== FALSE) {
                    while (($datos = fgetcsv($fichero, 1000)) !== FALSE) {
                        // Procesar los datos.
                        // En $datos[0] está el valor del primer campo,
                        // en $datos[1] está el valor del segundo campo, etc...
                    }
            }*/
        }else{
           // return response()->json("1");
        }

        //return response()->json($data);

    }
    public function mostrarDatos($id){
        $data=DB::table('listaEncuestados')->where('idLista','=',$id)->get();

        return view('administrator/openFile',compact('$data'));


    }
}
