<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

use Excel;
use DB;
use File;
use Log;

class ingresarIncidente implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    protected $idlista1;
    protected $archivonombre1;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($idlista,$archivonombre)
    {
        $this->idlista1=$idlista;
        $this->archivonombre1=$archivonombre;        
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $idarray=['id' => $this->idlista1]; 
        //Server
         $path="../listas/" . $this->archivonombre1;
        //Local
        //$path=public_path("/listas/".$this->archivonombre1);
        Excel::filter('chunk')->load($path)->chunk(1300, function($results) use ($idarray){
            foreach($results as $row){
                if($row->De_Cuenta_De_Alumno=="" && $row->nombre_alumno==""){
                }else{
                    $idencuestados=DB::table('encuestados')->select('idE')
                                                           ->where('noCuenta','=',$row->numero_de_cuenta_de_alumno)  
                                                           ->where('listaEncuestados_idLista','=',$idarray['id'])->get();
                if(empty($idencuestados[0]->idE)){

                }else{
                    $datos=DB::table('incidentes')->insert(['lineaNegocio'  =>  $row->linea_de_negocio,
                                                            'noCuenta'      =>  $row->numero_de_cuenta_de_alumno,
                                                            'nombre'        =>  $row->nombre_alumno,
                                                            'campus'        =>  $row->campus,
                                                            'causa'         =>  $row->causa,
                                                            'id_encuestados'=>  $idencuestados[0]->idE]);

                    DB::table('encuestados')->where('idE','=' ,$idencuestados[0]->idE)
                                            ->update(['incidente' => 1]);
                }
                } 
            }
            $job2= new Marcarlisto($idarray['id'],5);
            dispatch($job2);

            });

    }

/**
     * The job failed to process.
     *
     * @param  Exception  $exception
     * @return void
     */
  public function failed($exception){
    //$exception->getMessage();
    // etc...
            $idarray=['id' => $this->id1, 'carga'=> 7];
            //El archivo de excel no existe        
            $job2= new Marcarlisto($idarray['id'],$idarray['carga']);
            dispatch($job2);

  }

}
