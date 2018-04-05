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
    protected $info;
    protected $cantidad1;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($dato,$id,$cantidad)
    {
       $this->dato1=$dato;
       $this->id1=$id;
       $this->cantidad1=$cantidad;
    }
    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $i=0;
        echo $this->cantidad1;
        try{
        $idarray=['id' => $this->id1]; 
        $path = public_path("/listas/$this->dato1");
        //$contents = Storage::exists($path);
        //echo $path;
        //if ($contents) {
            //$error=true;
            Excel::filter('chunk')->load($path)->chunk(1300, function($results) use ($idarray){            
             $data=count($results);
             foreach($results as $row){
              //  $error=false;
                if($row->no_cuenta== ""){
                    $this->cantidad1=100;
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
        //}else{
            //El archivo de excel no existe
          //  $this->cantidad1==100; //El archivo de excel no existe
        //}
            
        }catch(Exception $e){
           $this->cantidad1=100; //El archivo de excel no existe o hubo otro tipo de error
        } 
   if($this->cantidad1==100){
            $idarray=['id' => $this->id1, 'carga'=> 6];
            //El archivo de excel no existe        
            $job2= new Marcarlisto($idarray['id'],$idarray['carga']);
            dispatch($job2);
    }
            if($this->cantidad1==1){
                    $idarray=['id' => $this->id1, 'carga'=> 1];
                    $job2= new Marcarlisto($idarray['id'],$idarray['carga']);
                    dispatch($job2);
            }
  }
}