<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use encuestados;
use Mail;
use Log;
use App\Mail\mailencuestados;

class enviarEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
     public $Iusers;
     public $asunto;
     public $instrucciones;
     public $idPlantilla;
     public $host;
     public $timeout = 1200;

    public function __construct($Iusers2, $asunto, $instrucciones, $idPlantilla, $host)
    {
          $this->Iusers = $Iusers2;
          $this->asunto = $asunto;
          $this->instrucciones = $instrucciones;
          $this->idPlantilla = $idPlantilla;
          $this->host = $host;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
  foreach ($this->Iusers as $Iuser) {
      $Iuser->idEncuesta = $this->idPlantilla;
      $Iuser->save();
if(filter_var($Iuser->email1, FILTER_VALIDATE_EMAIL)){
try {
  Mail::to($Iuser->email1)
 ->send(new mailencuestados($Iuser,$this->asunto,$this->instrucciones,$this->host));
} catch (Exception $e) {
  $file = fopen("archivo.txt", "w");
fwrite($file, $e . PHP_EOL);
fclose($file);
}
  }
    }
$this->delete();
    }
}
