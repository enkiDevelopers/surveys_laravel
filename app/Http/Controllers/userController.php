<?php

namespace App\Http\Controllers;
use App\usuarios;
use App\ctlCampus;
use App\ctlRegions;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;

class userController extends Controller
{
    public function show(Request $request)
    {
        $id = $request->session()->get('id');
        $usuarios = usuarios::where('addBy', $id)->where("type",4)->get();

        $directivos = usuarios::where('addBy', $id)->where("type", "=", 1)
          ->get();

        $dReg = usuarios::where('addBy', $id)->where("type", "=", 2)
        ->join('ctlRegions','usuarios.idRegion','=','ctlRegions.regions_id')
        ->get();

        $dCamp = usuarios::where('addBy', $id)->where("type", "=", 3)
        ->join('ctlCampus','usuarios.idCampus', "=", 'ctlCampus.campus_id')
        ->get();

        $campus = ctlCampus::all();
        $regiones = ctlRegions::all();

        return view('administrator.management',compact('usuarios', 'campus', 'regiones', 'id', 'directivos', 'dReg','dCamp'));
    }

    function generaPass(){
        //Se define una cadena de caractares. Te recomiendo que uses esta.
        $cadena = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890";
        //Obtenemos la longitud de la cadena de caracteres
        $longitudCadena=strlen($cadena);

        //Se define la variable que va a contener la contraseña
        $pass = "";
        //Se define la longitud de la contraseña, en mi caso 10, pero puedes poner la longitud que quieras
        $longitudPass=10;

        //Creamos la contraseña
        for($i=1 ; $i<=$longitudPass ; $i++){
            //Definimos numero aleatorio entre 0 y la longitud de la cadena de caracteres-1
            $pos=rand(0,$longitudCadena-1);

            //Vamos formando la contraseña en cada iteraccion del bucle, añadiendo a la cadena $pass la letra correspondiente a la posicion $pos en la cadena de caracteres definida.
            $pass .= substr($cadena,$pos,1);
        }
        return $pass;
    }

    public function save(Request $request)
    {
          $nombre = $request->nombre;
          $aPaterno =$request->aPaterno;
          $aMaterno = $request->aMaterno;
          $correo = $request->correo;
          $id = $request->addby;


          $cadena = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890";
          $longitudCadena=strlen($cadena);
          $pass = "";
          $longitudPass=8;
          for($i=1 ; $i<=$longitudPass ; $i++){
            $pos=rand(0,$longitudCadena-1);
            $pass .= substr($cadena,$pos,1);
          }

          $newUser = new usuarios;
          $newUser->nombre = $nombre;
          $newUser->apPaterno = $aPaterno;
          $newUser->apMaterno = $aMaterno;
          $newUser->email=$correo;
          $newUser->addBy=$id;
          $newUser->password =  Crypt::encryptString($pass);
          $newUser->type = 4;
          $newUser->save();

  return response()->json(array('sms'=>'usuario registrado correctamente'));

              }


public function deleteAdmin(Request $request)
{
  $id = $request->id;
    $delus =  usuarios::find($id);
    $delus->delete();
  return response()->json(array('sms'=>'usuario eliminado Correctamente'));
}

public function saveDirective(Request $request)
{

    $nombre = $request->nombre;
    $aPaterno =$request->aPaterno;
    $aMaterno = $request->aMaterno;
    $correo = $request->correo;
    $id = $request->addby;
    $tipo = $request->tipos;

    $region  = $request->regiones;
    if($region == 'E')
    {
      $region = null;
    }
    $campus = $request->campus;
    if($campus == 'E')
    {
      $campus = null;
    }


    $cadena = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890";
    $longitudCadena=strlen($cadena);
    $pass = "";
    $longitudPass=8;
    for($i=1 ; $i<=$longitudPass ; $i++){
      $pos=rand(0,$longitudCadena-1);
      $pass .= substr($cadena,$pos,1);
    }

    $newDir = new usuarios;
    $newDir->nombre = $nombre;
    $newDir->apPaterno = $aPaterno;
    $newDir->apMaterno = $aMaterno;
    $newDir->email=$correo;
    $newDir->addBy=$id;
    $newDir->password =  Crypt::encryptString($pass);
    $newDir->type = $tipo;
    $newDir->idRegion = $region;
    $newDir->idCampus= $campus;
    $newDir->save();

    return response()->json(array('sms'=>'usuario registrado correctamente'));

}

function decrypt(Request $request)
{
  $id= $request->id;
  $usuario = usuarios::find($id);
  $pass = $usuario->password;
try {
  $dpass = Crypt::decryptString($pass);
  return response()->json(array('sms'=> $dpass));
}  catch (DecryptException $e) {
return response()->json(array('error'=> $e));
}


}


}
