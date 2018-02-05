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
use App\encuestados;
use App\questionstemplates;
use DB;
use App\Mail\mailencuestados;
use Mail;
use Response;
class encuestadosController extends Controller
{

public function showList(Request $request)
{
  $id= $request->session()->get('id');
  if($id == null)
  {
  return redirect()->route('adminLogin');
  }
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
$user =encuestados::where('listaEncuestados_idLista','1')->get();
$asunto1="Nueva encuesta";
$asunto =array('sms'=> $asunto1);


foreach ($user as $usuario) {
$data= array(
'cuerpo'=> "cuerpo",
'id'=> $usuario->idE
);

Mail::send('administrator.correo', $data, function ($message) use ($usuario,$asunto){
    $message->subject($asunto["sms"]);
    $message->to($usuario->email1);
});
}
 return $data;

}

public function consultar(Request $request)
{
  $id= $request->session()->get('id');
  $hoy = date("Y-m-d h:i:s");

$actuales = publicaciones::join("templates","publicaciones.idTemplate","=","templates.id")
->where('fechat','>=', $hoy)->get();
$finalizadas = publicaciones::join("templates","publicaciones.idTemplate","=","templates.id")->where('fechat','<', $hoy)->get();
//$finalizadas = publicaciones::where('fechat','<',$hoy)->get();

return view("administrator.cards", compact("actuales","finalizadas", "id"));
}

}
