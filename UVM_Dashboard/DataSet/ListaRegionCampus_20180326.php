<?php
// Conexión SQL Server
$serverName = "uvm-encuestas.database.windows.net"; //serverName\instanceName
$connectionInfo = array( "Database"=>"SurveyCollector", "UID"=>"uvm_encuestas", "PWD"=>"MX?3ncu_2018");
$conn = sqlsrv_connect( $serverName, $connectionInfo);
//Inicialización de variables
$url_parametros = "";
$parts = [];
$query = [];
$idE = "";
$Region = "";
//setting header to json
header('Content-Type: application/json');
// Obtiene la URL completa
$url_parametros = $_SERVER['REQUEST_URI'];
// Convierte en un Array todos los elementos de la URL
$parts = parse_url($url_parametros);
// Delimitamos los elementos de la URL que son de Query
if (isset($parts['query'])) {
	if(!empty($parts['query'])){
		parse_str($parts['query'], $query);
	}}
// Validamos los Queries pertinentes (para evitar inyecciones)
if(isset($query['idE'])) {
	if( !empty($query['idE']) ){
		$idE = $query['idE']; 
		} else { $idE = " 2 ";}
	} else { $idE = " 2 ";}
if(isset($query['Region'])) {
	if( !empty($query['Region']) ){
		$Region = "AND CASE WHEN UPPER(E.lineaNegocio) = 'ONLINE' THEN 'OnLine' ELSE E.region END IN (".$query['Region'].") ";
		} else { $Region = ""; }
	} else { $Region = ""; }

if( $conn ) {
$sql = "
SELECT DISTINCT
	 CASE WHEN UPPER(E.lineaNegocio) = 'ONLINE' THEN 'OnLine' ELSE E.region END AS [Region]
	,CASE WHEN UPPER(E.lineaNegocio) = 'ONLINE' THEN 'OnLine' ELSE E.campus END AS [Campus]
	FROM
		[SurveyCollector].[uvm].[encuestados]  AS E with(nolock)
		WHERE
			E.idEncuesta = ";
$sql .= $idE;
$sql .= $Region;
$sql .="
			AND E.contestado = 1
			AND E.noCuenta IS NOT NULL
	ORDER BY 
		E.region ASC,
		CASE WHEN UPPER(E.lineaNegocio) = 'ONLINE' THEN 'OnLine' ELSE E.campus END ASC
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