<?php

namespace App\Http\Controllers;
use Session;
use Illuminate\Http\Request;
use App\usuarios;
use DB;
use Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;
use App\encuestados;
class iniciarSesion extends Controller
{

public function validarInicio(Request $request)
{

   $id= $request->session()->get('id');
  if ($id== null) {
 return view('welcome');
}else {

  $usuario = usuarios::find($id);
  $encuestado = encuestados::where('noCuenta', $id)->count();
if($encuestado != 0)
{
   return redirect('logout');
}else{

  if($usuario->type == 4)
  {
    $info = $usuario;
    return view('administrator.home',compact('info'));
  }elseif($usuario->type == 3 || $usuario->type == 2 || $usuario->type == 1 )
  {
    return redirect('/directive');
  }
}
}

}

public function validarAdmin(Request $request)
{
  $id= $request->session()->get('id');
 if ($id== null) {
     return view('auth.login');
 }else{
   $info = usuarios::find($id);
   return view('administrator.home',compact('info'));
 }

}


public function validaUsuarioAdmin(Request $request)
{
  $isValid = null;
  $email = $request->email;
  $pass = $request->password;

  if($email == "admin@admin.com" and $pass=="12345678")
  {
    $isValid = usuarios::where('email',$email)->where('type','4')->first();
    $id=$isValid->idUsuario;
    Session::put('id', $id);
    return redirect()->route('adminHome');
  }

$isValid = 0;
  $found = usuarios::where('email',$email)->where('type', "=" , '4')->get();
  foreach ($found as $foun) {

          try {
          $decPass =  Crypt::decryptString($foun->password);
          if($decPass == $pass)
          {
            $isValid = $foun ;
            break;
          }
          } catch (DecryptException $e) {
                break;
          }

  }

  if($isValid==0)
  {
    $mensaje = "usuario y/o contraseña incorrecta";
    echo "<script>";
    echo "if(confirm('$mensaje'));";
    echo "window.location = '/administrator/login';";
    echo "</script>";

  }else{
    $cEncryt = $isValid->password;

    try {
    $cDecrypt =Crypt::decryptString($cEncryt);
              } catch (DecryptException $e) {

      $mensaje = "No se pudo desencriptar la contraseña";
      echo "<script>";
      echo "if(confirm('$mensaje'));";
      echo "window.location = '/administrator/login';";
      echo "</script>";

      //  sleep(5);
        }

  if($cDecrypt == $pass )
  {
    $id=$isValid->idUsuario;
    Session::put('id', $id);
    return redirect('/administrator');
  }else {
    $mensaje = "Error Usuario y/o contraseña incorrecta";
    echo "<script>";
    echo "if(confirm('$mensaje'));";
    echo "window.location = '/administrator/login';";
    echo "</script>";
  }

  }




}

public function inicioAdmin(Request $request)
{
  $id= $request->session()->get('id');
  $info = usuarios::find($id);
  return view('administrator.home',compact('info'));
}



public function validarDirective(Request $request)
{
  $isValid = null;
  $email = $request->email;
  $pass = $request->password;


  $found = usuarios::where('email',$email)->where('type', "!=" , '4')->get();
  foreach ($found as $foun) {
      if(Crypt::decryptString($foun->password) == $pass)
      {
        $isValid = $foun ;
        break;
      }
  }

  if($isValid==null)
  {
    $mensaje = "El usuario no existe";
    echo "<script>";
    echo "if(confirm('$mensaje'));";
    echo "window.location = '/directives/login';";
    echo "</script>";

  }else{
    $cEncryt = $isValid->password;

    try {
    $cDecrypt =Crypt::decryptString($cEncryt);
              } catch (DecryptException $e) {

      $mensaje = "No se pudo desencriptar la contraseña";
      echo "<script>";
      echo "if(confirm('$mensaje'));";
      echo "window.location = '/directives/login';";
      echo "</script>";

      //  sleep(5);
        }

  if($cDecrypt == $pass )
  {
    $id=$isValid->idUsuario;
    Session::put('id', $id);
    return redirect('/directive');
  }else {
    $mensaje = "Error Usuario y/o contraseña incorrecta";
    echo "<script>";
    echo "if(confirm('$mensaje'));";
    echo "window.location = '/directives/login';";
    echo "</script>";
  }

  }






}


public function lencuesta(Request $request){

      $cuenta = $request->cuenta;
      $ruta   =  $request->ruta;
      $isValid = DB::table('encuestados')->where('noCuenta','=',$cuenta)->first();

          if($isValid==null)
          {
              return redirect()->route('loginpagina',"sistema");
          }else{
            $id=$isValid->noCuenta;
            Session::put(['id'=> $id,'canal'=> $ruta]);
            return redirect()->route('encuesta');
          }
}

public function lencuesta2(){
    return redirect()->route('loginpagina',"sistema");
}



}
