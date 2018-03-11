<?php

namespace App\Http\Controllers;
use App\usuarios;
use App\ctlCampus;
use App\ctlRegions;
use Illuminate\Http\Request;

class userController extends Controller
{
    public function show(Request $request)
    {
        $id = $request->session()->get('id');
        $usuarios = usuarios::where('addBy', $id)->where("type",4)->get();
        $directivos = usuarios::where('addBy', $id)->where("type", "!=", 4)->get();

        $campus = ctlCampus::all();
        $regiones = ctlRegions::all();

        return view('administrator.management',compact('usuarios', 'campus', 'regiones', 'id', 'directivos'));
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
          $newUser->password = password_hash($pass, PASSWORD_BCRYPT);
          $newUser->type = 4;
          $newUser->save();

            return "ok";

              }



}
