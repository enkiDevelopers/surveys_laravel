<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class conexionController extends Controller
{

function conexion(Request $request)
{
    $usuario = $request->usuario;
  	$password = $request->pass;
  	$servidor = $request->host;
  	$basededatos = $request->nombre;
    $tabla = $request->tabla;

return $usuario;
  	// creación de la conexión a la base de datos con mysql_connect()
  	$conexion = mysqli_connect($servidor,$usuario,$password ) or die ("No se ha podido conectar al servidor");

  	// Selección del a base de datos a utilizar
  	$db = mysqli_select_db($conexion, $basededatos) or die ( "Upps! Pues va a ser que no se ha podido conectar a la base de datos" );
  	// establecer y realizar consulta. guardamos en variable.
  	$consulta = "SELECT * FROM ".$tabla;
  	$resultado = mysqli_query( $conexion, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos");



return $resultado;

}



}
