<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

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
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($destinatarios,$asunto,$instrucciones, $id,$host)
    {

      $this->Iusers = $destinatarios;
      $this->asunto = $asunto;
      $this->instrucciones = $instrucciones;
      $this->idPlantilla = $id;
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
               Mail::to($Iuser->email1)
      ->send(new mailencuestados($Iuser,$this->asunto,$this->instrucciones,$this->host));
  }
  $this->delete();
    }
}
