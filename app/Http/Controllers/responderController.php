<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use App\surveys;
use DB;
use File;
use Input;
use Response;
use App\Client;
use PDF;

class responderController extends Controller
{	
	public function presentacion($matricula){
		//$id es el la variable de la table encuestados donde se almacena la informacion
		$datos=DB::table('encuestados')
			->join('publicaciones','encuestados.publicaciones_id','=','publicaciones.id')
			->where('encuestados.matricula','=',$matricula)
			->where('encuestados.contestado','=',0)
			->get();
		$constestado=DB::table('encuestados')
			->join('publicaciones','encuestados.publicaciones_id','=','publicaciones.id')
			->where('encuestados.matricula','=',$matricula)
			->where('encuestados.contestado','=',1)
			->get();
		return view('surveyed.home',compact('datos','constestado'));
	}
	public function responder(){
		
	}
}
