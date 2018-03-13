<?php

namespace App\Http\Controllers;
use Session;
use Illuminate\Http\Request;
use App\usuarios;
use DB;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;
class iniciarSesion extends Controller
{

public function ldap(Request $request)
{
  $email = $request->email;
  $pass = $request->password;
$isValid = usuarios::where('email',$email)->where('type','4')->first();
  if($email == "administrador@administrador" and $pass=="12345678")
  {
    $id=$isValid->idUsuario;
    Session::put('id', $id);
    return redirect()->route('adminHome');
  }else{

if($isValid==null)
{
  $mensaje = "El usuario no existe";
  echo "<script>";
  echo "if(confirm('$mensaje'));";
  echo "window.location = '/administrator/login';";
  echo "</script>";

}else{
  $cEncryt = $isValid->password;
  try {
  $cDecrypt =Crypt::decryptString($cEncryt);

  } catch (DecryptException $e) {

    $mensaje = "Error Usuario y/o contraseña incorrecta";
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
  return redirect()->route('adminHome');
}else {
  $mensaje = "Error Usuario y/o contraseña incorrecta";
  echo "<script>";
  echo "if(confirm('$mensaje'));";
  echo "window.location = '/administrator/login';";
  echo "</script>";
}

}
  /*
      $host = "192.168.1.100";
      $user = $email;//"pruebas";
      $pswd = $pass;//"Colocho_2104";
      $ad = ldap_connect($host)
          or die("Imposible Conectar");
   ldap_set_option($ad, LDAP_OPT_PROTOCOL_VERSION, 3)or die ("Imposible asignar el Protocolo LDAP");
if ($bd==false) {
  return "error";
}
// Creo el DN
    $dn = "OU=Usuarios,DC=pruebas,DC=local";

    // Especifico los parámetros que quiero que me regrese la consulta
    $attrs = array("displayname","mail","samaccountname","telephonenumber","givenname");

    // Creo el filtro para la busqueda
    $filter = "(samaccountname=$usuario)";
    $search = ldap_search($ad, $dn, $filter, $attrs);
if($search== "false")
{
    return "error";
}else {
  $id=$isValid->idUsuario;
  Session::put('id', $id);
  return redirect()->route('adminHome');
}*/


}

}

 public function validar(Request $request)
{
  $id= $request->session()->get('id');
  $isValid = usuarios::where('idUsuario',$id)->select('type')->first();

  if($id == null)
  {
  return view('auth.login');
  }else {

        $info = usuarios::find($id);
        return view('administrator.home',compact('info'));
}

}


public function validar2(Request $request)
{
 $id= $request->session()->get('id');
 if($id == null)
 {
 return view('welcome');
}else {
 return redirect('/administrator');
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

public function ldirective(Request $request){
        $email = $request->email;
        //$ruta   =  $request->ruta;
        $isValid = usuarios::where('email',$email)->first();

          if($isValid==null)
          {
            return redirect()->route('directivelogin');
          }else{
           $id=$isValid->idUsuario;
           Session::put('id', $id);
           return redirect()->route('directive');
          }

}




}
