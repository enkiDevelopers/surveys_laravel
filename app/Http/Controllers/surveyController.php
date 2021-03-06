<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\templates;
use App\Jobs\enviarRecordatorio;
use App\encuestados;
use App\questionsTemplates;
use App\jobs\enviarEmail;
use App\Mail\mailencuestados;
use App\recordatorios;
use DB;
use File;
use Input;
use Mail;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\usuarios;
use App\publicaciones;
use App\listaEncuestados;
use App\ctlTipoEncuesta as tipos;
use App\optionsMult;
class surveyController extends Controller
{

  public function save(Request $request)
  {
    $creador=$request['creador'];
    $titulo = $request['titulo'];
    $descripcion = $request['descripcion'];

    $icono=$request->file('icono');
    if (empty($icono)) {
        $nombre="default.png";
    }else {
      $nombre=date("his").".png";
      $icono->move('img/iconos',$nombre);

    }
      $surv = new templates;
      $surv->tituloEncuesta = $titulo;
      $surv->descripcion= $descripcion;
      $surv->imagePath= $nombre;
      $surv->creador= $creador;
      $surv->save();
      $eid =$surv->id;
      $datos = questionsTemplates::where('id',$eid)->get();
//      return view('administrator.edit',compact('titulo','descripcion','nombre', 'eid','datos'));
      return redirect()->route('editar',array("id" => "$eid"));

  }

  public function show_cards(Request $request)
  {
    $id= $request->session()->get('id');
    if($id == null)
    {
    return redirect()->route('adminLogin');
    }
    $eAdmin =  usuarios::where('idUsuario', $id)->where('type', '4')->count();
    if($eAdmin == 0)
    {
      return view('errors.404');
    }
    else {
    $propias =
    templates::join('usuarios', 'templates.creador', '=', 'usuarios.idUsuario')
    ->where('usuarios.idUsuario', $id)->whereNull('encuesta')
    ->orderby('id', 'desc')
    ->get();

    $agenas = templates::join('usuarios', 'templates.creador', '=', 'usuarios.idUsuario')
    ->where('usuarios.idUsuario','!=',$id)
    ->where('encuesta','')
    ->orderby('id', 'desc')
    ->get();

    $publicadas=
    templates::join('usuarios', 'templates.creador', '=', 'usuarios.idUsuario')
    ->where('usuarios.idUsuario','=',$id)
    ->where('encuesta',1)
    ->orderby('id', 'desc')
    ->get();


      $tipos = tipos::all();
      $publicaciones = publicaciones::all();
      $listas= listaEncuestados::where('creador', $id)->where('usado', 0)->where('carga', '1')->orWhere('creador', $id)->where('usado', 0)->where('carga', '5')->get();
      $info = usuarios::where('idUsuario', $id)->where('type', '4')->first();
      return view('administrator.surveys', compact('propias','agenas','publicadas','listas','tipos','publicaciones','id','info'));
    }

  }

  public function updateDataTemplate(Request $request)
  {
    $idTemplate = $request['idTemplate'];
    $titulo = $request['titulo'];
    $descripcion = $request['descripcion'];
    $icono=$request->file('icon_survey');

   $surv = new templates;


    if (empty($icono)) {

      $surv::where('id', $idTemplate)->update(array('tituloEncuesta' => $titulo, 'descripcion' => $descripcion));

    }else {
      $nombre=date("his").".png";
      $icono->move('img/iconos',$nombre);

     $surv::where('id', $idTemplate)->update(array('tituloEncuesta' => $titulo, 'descripcion' => $descripcion,'imagePath' => $nombre ));
    }



    return $surv;
  }

  public function duplicar(Request $request){
  $nNombre = $request->nNombre;
  $id=$request->id;
  $creador=$request->creador;

  $cPlantilla=templates::where('id', $id)->get();
  $Plantilla = templates::create([
          'tituloEncuesta' => $nNombre,
          'descripcion' => $cPlantilla[0]->descripcion,
          'imagePath' => $cPlantilla[0]->imagePath,
          'creador' => $creador
      ]);
      $idDupi = $Plantilla->id;
$preguntasA=questionsTemplates::where('templates_idTemplates',$id)->where('type', "1")->get();
foreach ($preguntasA as $pregunta) {
    $Plantilla = questionsTemplates::create([
            'title' => $pregunta->title,
            'type' => $pregunta->type,
            'orden' => $pregunta->orden,
            'templates_idTemplates' => $idDupi,
            'salto'=> $pregunta->salto
        ]);

          }

$preguntasB=questionstemplates::where('templates_idTemplates',$id)->where('type', '2')->get();

  foreach ($preguntasB as $pregunta) {
    $Pregunta = questionsTemplates::create([
            'title' => $pregunta->title,
            'type' => $pregunta->type,
            'orden' => $pregunta->orden,
            'salto'=>$pregunta->salto,
            'templates_idTemplates' => $idDupi
        ]);
  $pId=$Pregunta->id;
$opciones = optionsMult::where('idParent',$pregunta->id)->get();
foreach ($opciones as $opcion) {
  $Plantilla = optionsMult::create([
          'name' => $opcion->name,
          'idParent' => $pId,
          'salto' => $opcion->salto,
      ]);
      }
  }

    return response()->json(array('sms'=>'Duplicado Correctamente'));

}

public function ajaxshowcards(Request $request)
{
  $id=$request->value;
  $eAdmin =  usuarios::where('idUsuario', $id)->count();
  if($eAdmin == 0)
  {
    return view('errors.404');
  }
  else {
    $propias =
    templates::join('usuarios', 'templates.creador', '=', 'usuarios.idUsuario')
    ->where('usuarios.idUsuario', $id)->whereNull('encuesta')
    ->orderby('id', 'desc')
    ->get();

    $agenas = templates::join('usuarios', 'templates.creador', '=', 'usuarios.idUsuario')
    ->where('usuarios.idUsuario','!=',$id)
    ->whereNull('encuesta')
    ->orderby('id', 'desc')
    ->get();

    $publicadas=
    templates::where('encuesta','1')
    ->orderby('id', 'asc')
    ->get();

    $tipos = tipos::all();
    $publicaciones = publicaciones::all();
    $listas= listaEncuestados::where('creador', $id)->where('usado', 0)->get();
    return view("administrator.showcards",compact('propias','agenas','publicadas','listas','tipos','publicaciones','id'));
  }
}


public function reminder(Request $request)
{
  $id= $request->idPub;

  $mensaje = publicaciones::where('idPub',$id)->first();

  $idLista = listaEncuestados::where('idLista', $mensaje->destinatarios)->first();
$recordatorios = recordatorios::where('idPlantilla',$id)->get();
return view("administrator.recordatorio",compact('mensaje','recordatorios','idLista'));


}


public function send(Request $request)
{

  $id= $request->idPub;

  $mensaje = publicaciones::where('idPub',$id)->first();
  $idLista = listaEncuestados::where('idLista', $mensaje->destinatarios)->first();

  $Iusers = encuestados::
  where('listaEncuestados_idLista', $idLista->idLista)->where('email1', '!=', null)
  ->where('incidente', '0')->where('contestado','0')->count();
   $host = $_SERVER["HTTP_HOST"];

$iteraciones =intdiv($Iusers, 2000 )+1;
$inicio=0;
$termino=2000;

for ($i=0; $i < $iteraciones ; $i++) {
$Iusers2 = encuestados::where('listaEncuestados_idLista', $idLista->idLista)
                ->where('email1', '!=', null)
                ->where('incidente', '0')
                ->where('contestado','0')
                ->offset($inicio)
                ->limit($termino)
                ->get();
  $job = new enviarRecordatorio($Iusers2,$mensaje->asunto,$mensaje->instrucciones, $id,$host);
   dispatch($job);
                 $inicio = $inicio+$termino;
               }
$record = new recordatorios;
$record->fechaEnvio = date("Y-m-d h:i:s");
$record->idPlantilla=  $id;
$record->save();
$recordatorios = recordatorios::where('idPlantilla',$id)->get();
return view("administrator.recordatorio",compact('mensaje','recordatorios','idLista'));
}

}
