<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use DB;
use App\templates;
use encuestados;
use Mail;
use App\Mail\mailencuestados;


class enviarRecordatorio implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    public $Iusers;
    public $asunto;
    public $instrucciones;
    public $idPlantilla;
    public $host;
    public $timeout = 1200;
    public $plantilla;
    public $imagen;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($Iusers2,$asunto,$instrucciones, $id,$host)
    {

      $this->Iusers = $Iusers2;
      $this->asunto = $asunto;
      $this->instrucciones = $instrucciones;
      $this->idPlantilla = $id;

      $plantilla = DB::table('templates')->where('id',   $this->idPlantilla)->first();
      $this->imagen = $plantilla->imagePath;

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

    if(filter_var($Iuser->email1, FILTER_VALIDATE_EMAIL)){
    try {
      Mail::to($Iuser->email1)
     ->send(new mailencuestados($Iuser,$this->asunto,$this->instrucciones,$this->host, $this->imagen));
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
