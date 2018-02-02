<?php
namespace App\Http\Controllers;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;
use App\listaEncuestados;
use App\encuestas;
use App\publicaciones;
use App\optionsMult;
use App\templates;
use App\preguntasEncuestas;
use App\optionsMultEncuestas;
use App\questionstemplates;
use DB;
use Mail;
use Response;
class encuestadosController extends Controller
{

public function showList($id)
{
  $listas = listaEncuestados::where("creador", $id)->get();
    return view("administrator.files", compact('listas'));
}


public function deletelist($id,$creador)
{
  $ltdelete =listaEncuestados::where('idLista',$id)->first();
  $ltdelete->delete();
  return "1";
}

public function publicar(Request $request)
{
        $idPlantilla=$request->get('id');
        $asunto=$request->get('asunto');
        $fechai=$request->get('fechai');
        $fechat=$request->get('fechat');
        $instrucciones=$request->get('instrucciones');
        $destinatarios=$request->get('destinatarios');
        $tipo=$request->get('tipo');

if($fechat < $fechai)
{
  return false;
}

$publicar = templates::find($idPlantilla);
$publicar->encuesta = 1;
$publicar->save();

$crear =  new publicaciones;
$crear->titulo=$publicar->tituloEncuesta;
$crear->instrucciones=$instrucciones;
$crear->destinatarios=$destinatarios;
$crear->creador=$publicar->creador;
$crear->asunto=$asunto;
$crear->fechai=$fechai;
$crear->fechat=$fechat;
$crear->idTemplate=$publicar->id;
$crear->save();

return response()->json(array('sms'=>'Guardado Correctamente'));
}

public function enviar()
{


  $data =array ('texto'=> "/surveyed/previewtem/"+id);
    //Mail::to($destino)->send(new enviarCorreo($content));
  $user = array(
  'email'=>'colocho364@gmail.com',
  'name'=>'jorge'
  );

  Mail::send("administrator.correo", $data, function ($message) use ($user){
      $message->subject('prueba');
      $message->to('colocho364@gmail.com');
  });

  return "ok";
}

public function consultar()
{
  $hoy = date("Y-m-d h:i:s");

$actuales = publicaciones::join("templates","publicaciones.idTemplate","=","templates.id")->where('fechat','>=', $hoy)->get();
$finalizadas = publicaciones::join("templates","publicaciones.idTemplate","=","templates.id")->where('fechat','<', $hoy)->get();


//$finalizadas = publicaciones::where('fechat','<',$hoy)->get();

return view("administrator.cards", compact("actuales","finalizadas"));
}

}
