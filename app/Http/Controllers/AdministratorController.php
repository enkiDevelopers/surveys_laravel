<?php

namespace App\Http\Controllers;
use App\encuestados;
use Illuminate\Http\Request;
use App\usuarios;
class AdministratorController extends Controller
{

    public function uploadImage(Request $request)
    {
      $idUsuario = $request->session()->get('id');

      $icono=$request->file('file-input');
      if (empty($icono)) {
          $nombre="default.png";
      }else {
        $nombre=date("his").".png";
        $icono->move('img/avatar',$nombre);

      }
  $usuario = usuarios::find($idUsuario);
  $usuario->imagenPerfil=$nombre;
  $usuario->save();

$info= $usuario;
        return redirect()->route('adminHome');

    }




  public function verify()
  {

$usuarios = encuestados::all();
return view("administrator.borrar",compact("usuarios"));



  }



}
