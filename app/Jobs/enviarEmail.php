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

    public function __construct($Iusers, $asunto, $instrucciones, $idPlantilla, $host)
    {
          $this->Iusers = $Iusers;
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
    Mail::to($this->Iusers->email1)
    ->send(new mailencuestados($this->Iusers,$this->asunto,$this->instrucciones,$this->host));
    Log::info("mensaje enviado");
    $this->delete();
    }
}
