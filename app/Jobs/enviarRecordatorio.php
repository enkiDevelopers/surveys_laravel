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
    public $Iuser;
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
    public function __construct($Iuser,$asunto,$instrucciones, $id,$host)
    {

      $this->Iuser = $Iuser;
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

      Mail::to($this->Iuser->email1)
      ->send(new mailencuestados($this->Iuser,$this->asunto,$this->instrucciones,$this->host));
      $this->delete();
    }
}
