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

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($infousuario, $asunto, $instrucciones)
    {
      $this->infousuario = $infousuario;
      $this->instrucciones = $instrucciones;
      $this->subject = $asunto;

            if($infousuario->email2!=null)
        {
        $this->cc($infousuario->email2);

      }
        if ($infousuario->email3!=null) {
          $this->bcc($infousuario->email3);
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
