<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class encuestados extends Model
{
  protected $table = 'encuestados';
  protected $primaryKey = 'idE';


  protected $fillable = [
      'email1', 'email2', 'email3','name','apPaterno','apMaterno'
      ,'matricula', 'clave','contestado','creacion','incidente','acceso'
      ,'Publicaciones_id','listaEncuestados_idLista','ctlCampus_idCampus','idEncuesta'
  ];
}
