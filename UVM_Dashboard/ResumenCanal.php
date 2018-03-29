<?php
//Inicialización de variables
$url_parametros = "";
$parts = [];
$query = [];
$idE = "";
$Region = "";
$Campus = "";


//setting header to json

header('Content-Type: application/json');

// Obtiene la URL completa
$url_parametros = $_SERVER['REQUEST_URI'];


// Convierte en un Array todos los elementos de la URL
$parts = parse_url($url_parametros);
//var_dump($url_parametros);
//var_dump($parts);

// Delimitamos los elementos de la URL que son de Query
if (isset($parts['query'])) {
	if(!empty($parts['query'])){
		parse_str($parts['query'], $query);
	}
}


// Validamos los Queries pertinentes (para evitar inyecciones)
if(isset($query['idE'])) {
	if( !empty($query['idE']) ){
		$idE = $query['idE']; 
		}	
} else {
	$idE = " 2 "; //Default por ser la muestra original NPS 2018
	// Sentencia DIE debe de ir en su lugar, si no hay un idE definido
	}

if(isset($query['Region'])) {
	if( !empty($query['Region']) ){
		// Se debe validar que venga en el formato correcto separado por comas y con comilla simple para cada texto
		$Region = "WHERE Q.Region IN (".$query['Region'].") ";
		
		if(isset($query['Campus'])) {
			if( !empty($query['Campus']) ){
				// Se debe validar que venga en el formato correcto separado por comas y con comilla simple para cada texto
				
				$Campus = "AND Q.Campus IN (".$query['Campus'].")";
				} else {
					//Parámetro de Campus definido, viene vacío
					$Campus = "";
					}			
		} else {
			$Campus = "";
			}		
		} else {
			//Parámetro de Región definido, viene vacío
			$Region = "";
			}
} else {
	$Region = "";
	}
	
// Conexión SQL Server
$serverName = "uvm-encuestas.database.windows.net"; //serverName\instanceName
$connectionInfo = array( "Database"=>"SurveyCollector", "UID"=>"uvm_encuestas", "PWD"=>"MX?3ncu_2018");
$conn = sqlsrv_connect( $serverName, $connectionInfo);


if( $conn ) {
$sql = "
SELECT
	 Q.Canal
	,SUM(Q.Total) AS Total
	FROM (
		SELECT
			 CASE WHEN UPPER(E.lineaNegocio) = 'ONLINE' THEN 'OnLine' ELSE E.region END AS [Region]
			,CASE WHEN UPPER(E.lineaNegocio) = 'ONLINE' THEN 'OnLine' ELSE E.campus END AS [Campus]
			,UPPER(CAST(E.canal AS varchar(MAX))) AS Canal
			,1 AS Total
			FROM
				[SurveyCollector].[uvm].[encuestados]  AS E with(nolock)
				WHERE
					E.idEncuesta = ";
$sql .=				$idE  ;
$sql .= " AND E.contestado = 1
					AND E.noCuenta IS NOT NULL
		) AS Q ";
$sql .= $Region;
$sql .= $Campus;
$sql .= "
	GROUP BY
		Q.CANAL
	ORDER BY 
		Q.CANAL ASC
";
//echo $sql;
$stmt = sqlsrv_query($conn, $sql);
$result = array(); 

do {
    while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)){
       $result[] = $row; 
    }
} while (sqlsrv_next_result($stmt));



echo json_encode($result);

}else{
     die(print_r( sqlsrv_errors(), true));
}
sqlsrv_free_stmt($stmt);//Free memory associated with result
sqlsrv_close($conn); //Close the connection
?>