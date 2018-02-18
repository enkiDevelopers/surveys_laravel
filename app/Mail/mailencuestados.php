<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\encuestados;
class mailencuestados extends Mailable
{
    use Queueable, SerializesModels;
      public $infousuario;
      public $asunto;
      public $instrucciones;
      public $protocolo;
      public $host;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($infousuario, $asunto, $instrucciones, $host)
    {

      $this->infousuario = $infousuario;
      $this->instrucciones = $instrucciones;
      $this->subject = $asunto;

      if($infousuario->email2!=null)
       {

if(filter_var($infousuario->email2, FILTER_VALIDATE_EMAIL)){
       $this->cc($infousuario->email2);
     }

     }
       if ($infousuario->email3!=null) {
          if(filter_var($infousuario->email3, FILTER_VALIDATE_EMAIL)){
            $this->bcc($infousuario->email3);
       }

     }

       $this->host = $host;

           if (isset($_SERVER['HTTPS'])) {
               $this->protocolo = "https";
         }else
           {
               $this->protocolo = "http";
           }


    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('administrator.correo');
    }
}
