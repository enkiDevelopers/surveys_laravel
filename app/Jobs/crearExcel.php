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

class crearExcel implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    protected $ide;
    protected $reg;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($idencuesta,$region)
    {
        $this->ide=$idencuesta;
        $this->reg=$region;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $encuestados=DB::table('encuestados')->where('contestado','=',0)
                                             ->where('idEncuesta','=',$this->ide)
                                             ->where('region','=',$this->reg)
                                             ->get();
        Excel::create('Data', function($excel)use($encuestados) {
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
        })->export('xlsx');
   
    }
}
