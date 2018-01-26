<?php

namespace App\Http\Controllers;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;
use App\listas;
use DB;
class encuestadosController extends Controller
{

public function showList($id)
{
  $listas = listas::where("creador", $id)->get();
    return view("administrator.files", compact('listas'));
}


public function deletelist($id,$creador)
{
  $ltdelete =listas::where('idLista',$id)->first();
  $ltdelete->delete();
  return "1";
}

public function publicar()
{
  
}

}
