<?php
//setting header to json
header('Content-Type: application/json');//

// Conexión SQL Server
$serverName = "uvm-encuestas.database.windows.net"; //serverName\instanceName
$connectionInfo = array( "Database"=>"SurveyCollector", "UID"=>"uvm_encuestas", "PWD"=>"MX?3ncu_2018");
$conn = sqlsrv_connect( $serverName, $connectionInfo);

//Inicialización de variables
$url_parametros = "";
$parts = [];
$query = [];
$idE = "";

// Obtiene la URL completa
$url_parametros = $_SERVER['REQUEST_URI'];
//var_dump($url_parametros);
// Convierte en un Array todos los elementos de la URL
$parts = parse_url($url_parametros);
//var_dump($parts);
// Delimitamos los elementos de la URL que son de Query

if (isset($parts['query'])) {
	if(!empty($parts['query'])){
		parse_str($parts['query'], $query);
	}
}


if(isset($query['idE'])) {
	if( !empty($query['idE']) ){
		$idE = $query['idE']; 
		}	
} else {
	$idE = " 2 "; //Default por ser la muestra original NPS 2018
	// Sentencia DIE debe de ir en su lugar, si no hay un idE definido
	}
	
	if(isset($query['Campus'])) {//Valida que exista
if( !empty($query['Campus']) ){//Valida contenido
	$c_Campus =	" , Q.LineaNegocio "; /*Asigna Q.LineaNegocio a Campo_campus. Quitar si no está definido Campus*/
	$f_Campus =" AND Q.Campus IN (".$query['Campus'].")";//filtro_Campus Vacio
} else {$c_Campus =""; $f_Campus =" ";}//Falso, asigna campo_campus Vacio
} else {$c_Campus =" /*, Q.LineaNegocio */ "; $f_Campus =" ";}


if(isset($query['Region'])) {//Valida Exista
	if( !empty($query['Region']) ){ //Valida contenido
		// Se debe validar que venga en el formato correcto separado por comas y con comilla simple para cada texto
		$c_Region = " Q.Region , Q.Campus ";
		$c_Region .= $c_Campus; //Concatena campo_Region+campo_campus
	
	
		$f_Region = "WHERE Q.Region IN (".$query['Region'].") ";
		$f_Region .= $f_Campus;
		} else {$c_Region = " Q.Region "; $f_Region=" ";}
		
		} else {$c_Region = " Q.Region "; $f_Region=" ";}

//Si no está definida la Region, entonces se presenta a nivel region


//echo $sql;

$stmt = sqlsrv_query($conn, $sql);//
$result = array(); //

do {
    while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)){
       $result[] = $row; 
    }
} while (sqlsrv_next_result($stmt));

echo json_encode($result);//Formato JSon


sqlsrv_free_stmt($stmt);//Free memory associated with result
sqlsrv_close($conn); //Close the connection
//print json_encode($result);

?>