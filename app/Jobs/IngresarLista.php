<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable; 
use App\jobs\Marcarlisto;


use Excel;
use DB;
use File;
use Log;

class IngresarLista implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    protected $dato1;
    protected $id1;
    protected $info=0;
    /**
     * Create a new job instance.
     *
     * @return void
     */



    public function __construct($dato,$id)
    {
       $this->dato1=$dato;
       $this->id1=$id;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $i=0;
        try{
        $idarray=['id' => $this->id1]; 
        Excel::filter('chunk')->load(public_path("/listas/".$this->dato1))->chunk(500, function($results) use ($idarray){
         $data=count($results);
         foreach($results as $row){
            if($row->no_cuenta== ""){

            }else{
                $correo1= filter_var($row->correo_electronico, FILTER_VALIDATE_EMAIL);
                $correo2= filter_var($row->correo_electronico_sf, FILTER_VALIDATE_EMAIL);
                $correo3= filter_var($row->correo_electronico_3, FILTER_VALIDATE_EMAIL);
                $infor=DB::table('encuestados')->insert([
                                                    'region'  =>  $row->region,
                                                    'ciclo'=>$row->ciclo,
                                                    'campus'=>$row->campus,
                                                    'tipoIngreso'=>$row->tipo_ingreso,
                                                    'lineaNegocio'=>$row->linea_negocio,
                                                    'modalidad'=>$row->modalidad,
                                                    'noCuenta'=>$row->no_cuenta,
                                                    'nombreGeneral'=>$row->nombre_general,
                                                    'fechaNacimiento'=>$row->fecha_nacimiento,
                                                    'direccion'=>$row->direccion,
                                                    'email1'=>$correo1,
                                                    'email2'=>$correo2,
                                                    'email3'=>$correo3,
                                                    'telefonoCasa'=>$row->telefono_casa,
                                                    'carrera'=>$row->carrera,
                                                    'programaCV'=>$row->programacv,
                                                    'programaDesc'=>$row->programa_desc,
                                                    'semestre'=>$row->semestre,
                                                    'vertical'=>$row->vertical,
                                                    'esIntercambio'=>$row->es_intercambio,
                                                    'contestado' => 0,
                                                    'listaEncuestados_idLista' => $idarray['id']  ]);
       }

}

        },$shouldQueue = true);

}catch(Exception $e){


}
            $job2= new Marcarlisto($this->id1);
            dispatch($job2);

/*if (File::exists(('./listas/'.$this->dato1))) {
        File::delete(('./listas/'.$this->dato1));
    }else{
        return "noaparece".$this->dato1;
 }*/

}

}
