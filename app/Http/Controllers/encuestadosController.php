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


        $Plantillas=templates::where('id', $idPlantilla)->get();
//creando encuesta
        $encuesta = encuestas::create([
                'tituloEncuesta' =>$Plantillas[0]->tituloEncuesta,
                'descripcion' => $Plantillas[0]->descripcion,
                'imagePath' => $Plantillas[0]->imagePath,
                'creador' =>$Plantillas[0]->creador ,
                'fechai'=> $fechai,
                'fechat'=> $fechat,

            ]);
            $idEncuesta =$encuesta->id;
//clonando preguntas abiertas
  $preguntas = questionstemplates::where('templates_idTemplates', $idPlantilla )->where('type', '1')->get();

  foreach ($preguntas as $pregunta) {

    $question = preguntasEncuestas::create([
            'title' => $pregunta->title,
            'type' => $pregunta->type,
            'orden' => $pregunta->orden,
            'idEncuestas' => $idEncuesta,
                    ]);

  }

//clonando preguntas con opcion multiple
$preguntasB=questionstemplates::where('templates_idTemplates',$idPlantilla)->where('type', '2')->get();

foreach ($preguntasB as $pregunta) {

  $Pregunta = preguntasEncuestas::create([
          'title' => $pregunta->title,
          'type' => $pregunta->type,
          'orden' => $pregunta->orden,
          'idEncuestas' => $idEncuesta
      ]);
        $idPregunta=$Pregunta->id;

            $opciones = optionsMult::where('idParent',$pregunta->id)->get();
              foreach ($opciones as $opcion) {
            $Plantilla = optionsMultEncuestas::create([
              'name' => $opcion->name,
              'idParent' => $idPregunta,
              'salto' => $opcion->salto,
    ]);
    }
}


      $publicacion = publicaciones::create([
        'titulo' => $Plantillas[0]->tituloEncuesta,
        'instrucciones' => $instrucciones ,
        'destinatarios' => $destinatarios ,
        'creador' => $Plantillas[0]->creador,
        'asunto' => $asunto ,
        'idEncuestas'=> $idEncuesta,
    ]);




  return response()->json(array('sms'=>'Guardado Correctamente'));
}


public function consultar()
{
  $hoy = date("Y-m-d h:i:s");

$actuales = encuestas::where('fechat','>=',$hoy)->get();
$finalizadas = encuestas::where('fechat','<',$hoy)->get();
return view("administrator.cards", compact("actuales","finalizadas"));
}

}
