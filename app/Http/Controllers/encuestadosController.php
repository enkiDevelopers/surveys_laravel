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
use App\jobs\enviarEmail;
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
    $listas = DB::table('listaEncuestados')
            ->leftJoin('publicaciones', 'listaEncuestados.idLista', '=', 'publicaciones.destinatarios')
            ->select('listaEncuestados.*','publicaciones.*')
            ->where('listaEncuestados.creador','=',$id)
            ->get();
    //$listas = listaEncuestados::where("creador", $id)->get();
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
        ini_set('max_execution_time', 0);
if($fechat < $fechai)
{
  return false;
}
DB::beginTransaction();
try {
            $publicar = templates::find($idPlantilla);
            DB::table('publicaciones')->insert(
                [
                'titulo' => $publicar->tituloEncuesta,
                'instrucciones' =>$instrucciones,
                'destinatarios' =>$destinatarios ,
                'creador' =>$publicar->creador ,
                'asunto' => $asunto,
                'fechai' => $fechai,
                'fechat' => $fechat,
                'idTemplate' => $publicar->id ,
                'tipo' => $tipo,
              ]
            );
  $host = $_SERVER["HTTP_HOST"];
    $idLista = $destinatarios;

    $ins = listaEncuestados::where('idLista', $idLista)->first();
    $ins->usado = 1;
    $ins->save();

     $Iusers = encuestados::where('listaEncuestados_idLista', $idLista)->where('email1', '!=', null)->count();

     $iteraciones =intdiv($Iusers, 2000 )+1;

     $inicio=0;
     $termino=2000;
     $Iusers2 = new encuestados;

     for ($i=0; $i < $iteraciones ; $i++) {

     $Iusers2 = encuestados::where('listaEncuestados_idLista', $idLista)->where('email1', '!=', null)
                     ->offset($inicio)
                       ->limit($termino)
                         ->get();
                     $job = new enviarEmail($Iusers2,$asunto,$instrucciones, $idPlantilla,$host);
                      dispatch($job);
                      $inicio = $inicio+$termino;
                    }
DB::commit();
  $success= true;
 }
   catch (Exception $e) {
$success = false;
echo "error".$e ;
DB::rollback();
     return false;
   }

if($success){
   DB::table('templates')
              ->where('id', $idPlantilla)
              ->update(['encuesta' => 1]);
return response()->json(array('sms'=>'Enviado Correctamente'));
}
else {
  return false;
}

}

public function enviar(Request $request)
{

  $data =  array('mensaje' => "correo normal" );
  $user = array('destino'=> 'colocho364@hotmail.com');

  Mail::send('administrator.prueba', $data, function ($message) use ($user){
      $message->subject('Asunto del correo');
      $message->to('colocho-2104@hotmail.com');
      $message->sender("colocho364@hotmail.com", $name = 'jorge Luis Gonzalez');

  });

  return "nueva prueba enviada";
}

public function consultar(Request $request)
{
  $id= $request->session()->get('id');
  $hoy = date("Y-m-d h:i:s");

$actuales = publicaciones::join("templates","publicaciones.idTemplate","=","templates.id")
->where('fechat','>=', $hoy)->orderby("idPub","desc")->get();
$finalizadas = publicaciones::join("templates","publicaciones.idTemplate","=","templates.id")->where('fechat','<', $hoy)->get();
//$finalizadas = publicaciones::where('fechat','<',$hoy)->get();

return view("administrator.cards", compact("actuales","finalizadas", "id"));
}
    public function ingresarlista(Request $request){

      $id = DB::table('listaEncuestados')->insertGetId(
                    array('nombre' => $request->input('nombre'),
                           'creador' => 6));
    return response()->json($id);

    }



}
