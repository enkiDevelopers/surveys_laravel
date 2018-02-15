<?php

namespace App\Http\Controllers;
use Session;
use Illuminate\Http\Request;
use App\usuarios;
use DB;

class iniciarSesion extends Controller
{

public function ldap(Request $request)
{
  $email = $request->email;
  $pass = $request->password;
  $isValid = usuarios::where('email',$email)->where('type','4')->first();
if($isValid==null)
{
return redirect()->route('adminLogin');
}else{
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
  $id=$isValid->idUsuario;
  Session::put('id', $id);
  return redirect()->route('adminHome');

}

}

 public function validar(Request $request)
{
  $id= $request->session()->get('id');
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
            echo $ruta;
          return redirect()->route('loginpagina',"sistema");
          }else{
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

            $id=$isValid->noCuenta;
            Session::put(['id'=> $id,'canal'=> $ruta]);
            return redirect()->route('encuesta');

          }

}



}
