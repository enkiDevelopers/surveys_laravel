<?php
//Inicialización de variables
$url_parametros = "";
$parts = [];
$query = [];
$idE = "";
$Region = "";
$Campus = "";
$url_pie = "https://uvmmejoraporti.mx/UVM_Dashboard/DataSet/ResumenCanal.php?";
$url_barras1 = "https://uvmmejoraporti.mx/UVM_Dashboard/DataSet/AvanceRegionCampus.php?";
$url_barras2 = "https://uvmmejoraporti.mx/UVM_Dashboard/DataSet/AvanceRegionCampus.php?";
$url_Lista = "https://uvmmejoraporti.mx/UVM_Dashboard/DataSet/ListaRegionCampus.php?";
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
// Validamos los Queries pertinentes (para controlar inyecciones)
if(isset($query['idE'])) {
	if( !empty($query['idE']) ){
		$idE .= "idE=".$query['idE']; 
		} else {$idE .= "idE=2";}
	} else {$idE .= "idE=2";}
	
if(isset($query['Region'])) {
	if( !empty($query['Region']) ){
		$Region = "&Region=".$query['Region'];
		} else { $Region = "";}
	} else { $Region = "";}

if(isset($query['Campus'])) {
	if( !empty($query['Campus']) ){
		$Campus = "&Campus=".$query['Campus'];
		} else { $Campus = "";}			
	} else { $Campus = "";}
$url_pie .= $idE.$Region.$Campus;
$url_barras1 .= $idE.$Region.$Campus;
$url_barras2 .= $idE.$Region;
$url_Lista .= $idE.$Region;

$txt_glob ="<!DOCTYPE html>";
$txt_glob .="<html lang='en'>";
$txt_glob .="<head>";
$txt_glob .="    <!-- Don't forget the viewport meta tag for responsive sites! -->";
$txt_glob .="    <meta name='viewport' content='width=device-width, initial-scale=1.0'>";

$txt_glob .="	<script type = 'text/javascript'>";
$txt_glob .="		window.url_barras1 = \"".$url_barras1."\";";
$txt_glob .="		window.url_barras2 = \"".$url_barras2."\";";
$txt_glob .="		window.url_barras2_original = \"".$url_barras2."\";";
$txt_glob .="		window.url_pie = \"".$url_pie."\";";
$txt_glob .="		window.url_Lista = \"".$url_Lista."\";";
$txt_glob .="		window.url_Lista2 = '';";
$txt_glob .="		window.p_idE = \"".$idE."\";";
$txt_glob .="		window.p_Region = \"".$Region."\";";
$txt_glob .="		window.p_Campus = \"".$Campus."\";";
$txt_glob .="		window.g_Region = '';";
$txt_glob .="		window.g_Campus = '';";
$txt_glob .="	</script>";

echo $txt_glob;

?>
	<script src="./js/jquery.min.js"></script>
	<script src="./js/Chart.bundle.js"></script>
	 <script src="./js/Pie.js></script> 
	<link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Open+Sans" />
    <!-- Include PocketGrid -->
	<link rel="stylesheet" href="css/styles.css">
	<link rel="stylesheet" href="css/Mainstyle.css">

</head>
<body>
    <div class="block-group">
      <div class="hdr_side block"><div class="box"></div></div>
	  <div class="hdr_mid block"><div class="box"><img class="d_Logo1" src="../img/logos/UVM_Logo.png" /><img class="m_Logo" src="../img/logos/UVM_Logo_Blanco.png" /></div></div>
	  <div class="hdr_side block"><div class="box"><img class="d_Logo2" src="../img/logos/Por_Ti.png" /></div></div>
	</div>
	<div class="block-group">
		<div class="before KPI block-group">
			<!--<div class="box">KPI</div>-->
			<div class="score block"><div class="box highblue"><h3>Avance</h3><h1 id="Avance">100%</h1> </div></div>
			<div class="score block"><div class="box boyzone"><h3>Encuestados</h3> <h1 id="Encuestados">1,000,000</h1></div></div>
			<div class="score block"><div class="box inuendo"><h3>Faltantes</h3> <h1 id="Faltantes">150,000</h1></div></div>
			<div class="score block"><div class="box bluegray"><h3>Incidencias</h3> <h1 id="Incidencias">15,000</h1></div></div>
			</div>
		<div class="after Agg block-group">
			<!--<div class="box">Agg</div>-->
			<div class="barras1 block"><div class="box">
				<div class="chart-container">
					<canvas id="barras_resumen"></canvas>
				</div>
			</div></div>
			<div class="pie block"><div class="box">
				<div class="chart-container">
					<canvas id="pie"></canvas>
				</div>
			</div></div>
		</div>
	</div>
<?php

$html_detalle ="	
	<div class=\"block-group\">
		<div class=\"filtros block\"><div class=\"box inuendo\">
			<select name=\"Region\" id=\"Region\" class=\"select-style\">
				<option value=\"Region\">Region</option>
			</select>
			<select name=\"Campus\" id=\"Campus\" class=\"select-style\" onchange=\"FiltroCampus();\">
				<option value=\"Todos\">Seleccione una Región</option>
			</select>
		</div></div>
    </div>	
	<div class=\"block-group\">
		<div class=\"barras2 block\"><div class=\"box inuendo\">
				<div class=\"chart-container\" id=\"barras2\">
					<canvas id=\"barras_detalle\"></canvas>
				</div>			
		</div></div>
		<div class=\"export block\"><div class=\"box twinkleblue\">
			Export
		</div></div>
    </div>	";

	if(isset($query['Campus'])) {if( !empty($query['Campus']) ){$html_detalle = "<!-- No hay más detalle para Líder de Campus -->";	}}
echo $html_detalle
?>

<script type = 'text/javascript'>
console.log("la url_pie es: " + url_pie);
f_Pie(url_pie);
</script>
<!-- <script type = 'text/javascript'>
$(document).ready(function(){
	$.ajax({
		url: url_pie,
		method: "GET",
		success: function(data) {
			console.log(data);
			var Canal = [];
			var Total = [];
			for(var i in data) {
				Canal.push(data[i].Canal);
				Total.push(data[i].Total);
			}
			var options = {
				tooltips: {
					enabled: true,
					mode: 'index',
					bodyFontSize: 20,
					callbacks: {
						label: function(tooltipItem, chartdata) {
						var label = chartdata.labels[tooltipItem.index] || '';
						if (label) {
							label += ': ';
							}
						label += chartdata.datasets[0].data[tooltipItem.index].toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
						return label;
						}
					}
				},
				title : {
					display : true,
					position : "top",
					text : "Encuestados por Canal",
					fontSize : 20 ,
					fontColor : "#111"
				},
				legend : {
					display : true,
					position : "right",
					fontSize: 12
				}
			};
			var chartdata = {
				labels: Canal,
				datasets : [
					{
						label: 'Encuestados por Canal',
						data: Total,
						backgroundColor : ["#20bf6b","#26de81","#d5e24b","#fed330","#f7b731","#fd9644","#fa8231","#fc5c65","#eb3b5a","#a55eea","#8854d0"],
		                borderWidth : [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0]
					}
				]
			};
			var ctx = $("#pie");
			var barGraph = new Chart(ctx, {
				type: 'pie',
				data: chartdata,
				options: options
			});
		},
		error: function(data) {
			console.log(data);
		}
	});
});
</script>-->

<script type = 'text/javascript'>
$(document).ready(function(){
	$.ajax({
		url: url_barras1,
		method: "GET",
		success: function(data) {
			console.log(data);
			var Rubro = [];//Va antes de Avance en la consulta
			var Region = [];
			var Campus = [];
			var LineaNegocio = [];
			var Avance = [];
/*			var Encuestado = [];
			var Incidencia = [];*/
			var Porcent = [];//Almacenará el porcentaje de avance. se tiene q actualizar la pagina para que cambie
			var PorTem = 0.0;
			
			var BR_titulo = "% Avance por Región";
			
			var tEncuestado = 0;
			var tIncidencia = 0;
			var tTotal = 0;
			var tFaltante = 0;
			var tAvance = 0.0;
			
			for(var i in data) {
				tEncuestado += (data[i].Encuestado);
				tIncidencia += (data[i].Incidencia);
				tTotal += (data[i].Total);
				if (data[i].Region !== undefined){//Solo acepta registros definidos
					Region.push(data[i].Region);}
				
				if (data[i].Campus !== undefined){//Solo acepta registros definidos
					Campus.push(data[i].Campus);}
				
				if (data[i].LineaNegocio !== undefined) {//Solo acepta registros definidos
					LineaNegocio.push(data[i].LineaNegocio);}
				Avance.push(data[i].Avance);
				PorTem=Avance[i]*100;
				Porcent.push(PorTem.toFixed(2));//Porcentaje
			}
			
			tAvance=(tEncuestado/(tTotal-tIncidencia))*100;
			tAvance=tAvance.toFixed(2) + "%";
			tFaltante = (tTotal-tIncidencia-tEncuestado);
			
			tEncuestado = tEncuestado.toLocaleString();
			tFaltante = tFaltante.toLocaleString();
			tIncidencia = tIncidencia.toLocaleString();
			
			$('#Avance').html(tAvance); 
			$('#Encuestados').html(tEncuestado);
			$('#Incidencias').html(tIncidencia);
			$('#Faltantes').html(tFaltante);
			
				//Eliqe el set de datos a graficar
			if (Campus.length == 0 ){//Si no tiene Campus entonces arroja Region en la consulta	
				for (var i2 in Region){
				Rubro.push (Region[i2]);
				BR_titulo = "% Avance por Región";
				}
			}
			else {//Si tiene campus
			if (LineaNegocio.length == 0){//Si tiene Campus && NO Tiene linea de negocio arroja Campus	
				for (var i2 in Campus){
				Rubro.push (Campus[i2]);
				BR_titulo = "% Avance por Campus";
				}
			}
			else {//si tiene LineaNegocio ademas de capus
				for (var i2 in LineaNegocio){
					Rubro.push (LineaNegocio[i2]);
					BR_titulo = "% Avance por Línea de Negocio";
				}
			}
			}//cierra if anidado
			/*opciones de estilo*/
			var chartdata = {
				labels: Rubro,
				datasets : [ 	
					{
						label: ' ',
						backgroundColor: "#398cab",
						borderColor: "#398cab",
						data: Porcent
					}
				]//Cierra datasets
			};			
			/*opciones de la escala a usar*/			
			var options  ={
				scales: {
					xAxes: [{
						ticks: {
							beginAtZero:true,//Empezar en cero
							//NOTITA BARRAS PORCENTAJE
							//steps: 4,
							stepSize: 25,/*Avance de la escala*/
							//max: 100,
							callback: function(value, index, values) {//Agrega el simbolo %
							return value + '%';
							}
						}
					}]
				},
				legend: {
					display: false,
				},
				/*opciones de estilo para el tooltip*/
				tooltips: {
					callbacks: {
						label: function(tooltipItem, data) {//Modifica el mensaje de descripcion del tooltip
						var PorcentShow = data.datasets[0].data[tooltipItem.index];
						return PorcentShow + "%";}
					}
				},
				title : {
					display : true,
					position : "top",
					text : BR_titulo,
					fontSize : 20 ,
					fontColor : "#111"
				}, 
			};
			var ctx = $("#barras_resumen");
			/*define el tipo de grafica a usar*/
			var barGraph = new Chart(ctx, {
				type: 'horizontalBar',
				data: chartdata,
				options: options
			});
		},//Cierra function(data)
		error: function(data) {
			console.log(data);
		}
	});
});
</script>	
<script type = 'text/javascript'>
$(document).ready(function(){
$.when(
	$.ajax({
		url: url_Lista,
		method: "GET",
		success: function(data) {
			console.log(data);
			var output_url=url_barras2_original;//NOTITA
			var Region = [];
			var Region_html ="";
			var Campus = [];
			var Campus_html ="";
			for( var i in data) {
				if (i==0) { Region.push(data[i].Region); } else {if (Region.indexOf(data[i].Region) ==-1){ Region.push(data[i].Region); } else {}};
				Campus.push(data[i].Campus);
				}
			$('#Region').html('');
			for (var j in Region) {
				Region_html=Region_html+"<option value='"+Region[j]+"'>"+Region[j]+"</option>";
				}
			$("#Region").html(Region_html);
			g_Region = "&Region='"+Region[0]+"'"; //Default de Primer opción
			
			if(p_Region.length==0){
			output_url = output_url + g_Region;
			url_barras2 = output_url;
			}
			if (Region.length === 1 ){
			j=0;
			$("#Campus").html("");
			for (j in Campus) {
				Campus_html=Campus_html+"<option value='"+Campus[j]+"'>"+Campus[j]+"</option>";
			}
			$("#Campus").html(Campus_html);
			g_Campus = "&Campus='"+Campus[0]+"'"; //Default de Primer opción
			output_url = output_url + g_Campus;
			url_barras2 = output_url;
			}
			}	
		})).then(
function(){
	$.ajax({
		url: url_barras2,
		method: "GET",
		success: function(data) {
			console.log(data);
			url_barras2 = url_barras2_original;
			var Rubro = [];
			var Region = [];
			var Campus = [];
			var LineaNegocio = [];
			var Avance = [];
			var Porcent = [];
			var PorTem = 0.0;
			var BR2_titulo = "";
			for(var i in data) {
				if (data[i].Region !== undefined){//Solo acepta registros definidos
					Region.push(data[i].Region);}
				if (data[i].Campus !== undefined){//Solo acepta registros definidos
					Campus.push(data[i].Campus);}
				if (data[i].LineaNegocio !== undefined) {//Solo acepta registros definidos
					LineaNegocio.push(data[i].LineaNegocio);}
				Avance.push(data[i].Avance);
				PorTem=Avance[i]*100;
				Porcent.push(PorTem.toFixed(2));//Porcentaje
			}
			if (Campus.length == 0 ){//Si no tiene Campus entonces arroja Region en la consulta	
				for (var i2 in Region){
				Rubro.push (Region[i2]);
				}
				BR2_titulo = "% Avance de "+Region[0];
			}
			else {//Si tiene campus
			if (LineaNegocio.length == 0){//Si tiene Campus && NO Tiene linea de negocio arroja Campus	
				for (var i2 in Campus){
				Rubro.push (Campus[i2]);
				}
				BR2_titulo = "% Avance por campus de "+Region[0];
			}
			else {//si tiene LineaNegocio ademas de capus
				for (var i2 in LineaNegocio){
					Rubro.push (LineaNegocio[i2]);
				}
				BR2_titulo = "% Avance por línea de negocio de "+Campus[0];
			}
			}//cierra if anidado
			var chartdata = {
				labels: Rubro,
				datasets : [ {
						label: ' ',
						backgroundColor: "#a55eea",
						borderColor: "#a55eea",
						data: Porcent
					}]//Cierra datasets
				};			
			var options  ={
				scales: {
					xAxes: [{
						ticks: {
							beginAtZero:true,//Empezar en cero
							fontColor: '#fff',
							//NOTITA BARRAS PORCENTAJE
							//steps: 4,
							stepSize: 25,/*Avance de la escala*/
							//max: 100,
							callback: function(value, index, values) {//Agrega el simbolo %
							return value + '%';
							}
						},
						gridLines: {
							color: 'rgba(255,255,255,0.5)',
							zeroLineColor: 'rgba(255,255,255,0.5)',
							}
						}],
					yAxes: [{
						ticks: {
						
							fontColor: '#fff',
						
							},
						
						gridLines: {
							color: 'rgba(255,255,255,0.5)',
							zeroLineColor: 'rgba(255,255,255,0.5)',
							}
					
						}]					
					},
				legend: {
					display: false,
					},
				tooltips: {
					callbacks: {
						label: function(tooltipItem, data) {//Modifica el mensaje de descripcion del tooltip
						var PorcentShow = data.datasets[0].data[tooltipItem.index];
						return PorcentShow + "%";}
						}
					},
				title : {
					display : true,
					position : "top",
					text : BR2_titulo,
					fontSize : 20 ,
					fontColor : "#fff"
					}, 
				};
			var ctx = $("#barras_detalle");
			$(ctx).html('');
			/*define el tipo de grafica a usar*/
			var barGraph = new Chart(ctx, {
				type: 'horizontalBar',
				data: chartdata,
				options: options
				});
				
		},//Cierra function(data)
		error: function(data) {
			console.log(data);
			}
	});//cierra Ajax
}//cierra function()
);//cierra then()
});
</script>	
<script type = 'text/javascript'>
$("#Region").change(function(){
url_Lista2 = url_Lista+"&Region='"+$('#Region').find(":selected").text()+"'";	
$.when(
	$.ajax({
		url: url_Lista2,
		method: "GET",
		success: function(data) {
			console.log(data);
			var output_url=url_barras2_original;//NOTITA
			var Region = [];
			var Region_html ="";
			var Campus = [];
			var Campus_html ="<option value='Todos'>Seleccione un Campus</option>";
			for( var i in data) {
				if (i==0) { Region.push(data[i].Region); } else {if (Region.indexOf(data[i].Region) ==-1){ Region.push(data[i].Region); } else {}};
				Campus.push(data[i].Campus);
				}
			g_Region = "&Region='"+Region[0]+"'"; //Default de Primer opción
			output_url = output_url + g_Region;
			url_barras2 = output_url;
			
			$("#Campus").html('');
			for (var j in Campus) {
			Campus_html=Campus_html+"<option value='"+Campus[j]+"'>"+Campus[j]+"</option>";
			}
			$("#Campus").html(Campus_html);
			}	
		})
//url_barras2 = url_barras2_original;		
	).then(
function(){
	$.ajax({
		url: url_barras2,
		method: "GET",
		success: function(data) {
			console.log(data);
			url_barras2 = url_barras2_original;
			var Rubro = [];
			var Region = [];
			var Campus = [];
			var LineaNegocio = [];
			var Avance = [];
			var Porcent = [];
			var BR2_titulo = "";
			var PorTem = 0.0;
			for(var i in data) {
				if (data[i].Region !== undefined){//Solo acepta registros definidos
					Region.push(data[i].Region);}
				if (data[i].Campus !== undefined){//Solo acepta registros definidos
					Campus.push(data[i].Campus);}
				if (data[i].LineaNegocio !== undefined) {//Solo acepta registros definidos
					LineaNegocio.push(data[i].LineaNegocio);}
				Avance.push(data[i].Avance);
				PorTem=Avance[i]*100;
				Porcent.push(PorTem.toFixed(2));//Porcentaje
			}
			if (Campus.length == 0 ){//Si no tiene Campus entonces arroja Region en la consulta	
				for (var i2 in Region){
				Rubro.push (Region[i2]);
				}
				BR2_titulo = "% Avance de "+$('#Region').find(":selected").text();
			}
			else {//Si tiene campus
			if (LineaNegocio.length == 0){//Si tiene Campus && NO Tiene linea de negocio arroja Campus	
				for (var i2 in Campus){
				Rubro.push (Campus[i2]);
				}
				BR2_titulo = "% Avance por campus de "+$('#Region').find(":selected").text();
			}
			else {//si tiene LineaNegocio ademas de capus
				for (var i2 in LineaNegocio){
					Rubro.push (LineaNegocio[i2]);
				}
				BR2_titulo = "% Avance por línea de negocio de "+Campus[0];
			}
			}//cierra if anidado
			var chartdata = {
				labels: Rubro,
				datasets : [ {
						label: ' ',
						backgroundColor: "#a55eea",
						borderColor: "#a55eea",
						data: Porcent
					}]//Cierra datasets
				};			
			var options  ={
				scales: {
					xAxes: [{
						ticks: {
							beginAtZero:true,//Empezar en cero
							fontColor: '#fff',
							//NOTITA BARRAS PORCENTAJE
							//steps: 4,
							stepSize: 25,/*Avance de la escala*/
							//max: 100,
							callback: function(value, index, values) {//Agrega el simbolo %
							return value + '%';
							}
						},
						gridLines: {
							color: 'rgba(255,255,255,0.5)',
							zeroLineColor: 'rgba(255,255,255,0.5)',
							}
						}],
					yAxes: [{
						ticks: {
						
							fontColor: '#fff',
						
							},
						
						gridLines: {
							color: 'rgba(255,255,255,0.5)',
							zeroLineColor: 'rgba(255,255,255,0.5)',
							}
					
						}]					
					},
				legend: {
					display: false,
					},
				tooltips: {
					callbacks: {
						label: function(tooltipItem, data) {//Modifica el mensaje de descripcion del tooltip
						var PorcentShow = data.datasets[0].data[tooltipItem.index];
						return PorcentShow + "%";}
						}
					},
				title : {
					display : true,
					position : "top",
					text : BR2_titulo,
					fontSize : 20 ,
					fontColor : "#fff"
					}, 
				};
				$('#barras_detalle').remove(); // this is my <canvas> element	
				$('#barras2').append('<canvas id="barras_detalle"><canvas>');			
			var ctx = $("#barras_detalle");
			/*define el tipo de grafica a usar*/
			var barGraph = new Chart(ctx, {
				type: 'horizontalBar',
				data: chartdata,
				options: options
				});
			console.log(ctx);	
		},//Cierra function(data)
		error: function(data) {
			console.log(data);
			}
	});//cierra Ajax
}	
);

});
</script>	
<script type = 'text/javascript'>
function FiltroCampus(){
	url_barras2 = url_barras2_original;
	
	if(p_Region == "") {
		url_barras2 = url_barras2_original + "&Region='"+$('#Region').find(":selected").text()+"'";
	}
	
	if ($('#Campus').find(":selected").text() != "Seleccione un Campus"){
	url_barras2 = url_barras2 + "&Campus='";
	url_barras2 = url_barras2 + $('#Campus').find(":selected").text();
	url_barras2 = url_barras2 + "'";
	}
		$.ajax({
			url: url_barras2,
			method: "GET",
			success: function(data) {
			console.log(data);
			url_barras2 = url_barras2_original;
			var Rubro = [];
			var Region = [];
			var Campus = [];
			var LineaNegocio = [];
			var Avance = [];
			var Porcent = [];
			var BR2_titulo = "";
			var PorTem = 0.0;
			for(var i in data) {
				if (data[i].Region !== undefined){//Solo acepta registros definidos
					Region.push(data[i].Region);}
				if (data[i].Campus !== undefined){//Solo acepta registros definidos
					Campus.push(data[i].Campus);}
				if (data[i].LineaNegocio !== undefined) {//Solo acepta registros definidos
					LineaNegocio.push(data[i].LineaNegocio);}
				Avance.push(data[i].Avance);
				PorTem=Avance[i]*100;
				Porcent.push(PorTem.toFixed(2));//Porcentaje
			}
			if (Campus.length == 0 ){//Si no tiene Campus entonces arroja Region en la consulta	
				for (var i2 in Region){
				Rubro.push (Region[i2]);
				}
				BR2_titulo = "% Avance de "+$('#Region').find(":selected").text();
			}
			else {//Si tiene campus
			if (LineaNegocio.length == 0){//Si tiene Campus && NO Tiene linea de negocio arroja Campus	
				for (var i2 in Campus){
				Rubro.push (Campus[i2]);
				}
				BR2_titulo = "% Avance por campus de "+$('#Region').find(":selected").text();
			}
			else {//si tiene LineaNegocio ademas de capus
				for (var i2 in LineaNegocio){
					Rubro.push (LineaNegocio[i2]);
				}
				BR2_titulo = "% Avance por línea de negocio de "+ $('#Campus').find(":selected").text();
			}
			}//cierra if anidado
			var chartdata = {
				labels: Rubro,
				datasets : [ {
						label: ' ',
						backgroundColor: "#a55eea",
						borderColor: "#a55eea",
						data: Porcent
					}]//Cierra datasets
				};			
			var options  ={
				scales: {
					xAxes: [{
						ticks: {
							beginAtZero:true,//Empezar en cero
							fontColor: '#fff',
							//NOTITA BARRAS PORCENTAJE
							//steps: 4,
							stepSize: 25,/*Avance de la escala*/
							//max: 100,
							callback: function(value, index, values) {//Agrega el simbolo %
							return value + '%';
							}
						},
						gridLines: {
							color: 'rgba(255,255,255,0.5)',
							zeroLineColor: 'rgba(255,255,255,0.5)',
							}
						}],
					yAxes: [{
						ticks: {
						
							fontColor: '#fff',
						
							},
						
						gridLines: {
							color: 'rgba(255,255,255,0.5)',
							zeroLineColor: 'rgba(255,255,255,0.5)',
							}
					
						}]					
					},
				legend: {
					display: false,
					},
				tooltips: {
					callbacks: {
						label: function(tooltipItem, data) {//Modifica el mensaje de descripcion del tooltip
						var PorcentShow = data.datasets[0].data[tooltipItem.index];
						return PorcentShow + "%";}
						}
					},
				title : {
					display : true,
					position : "top",
					text : BR2_titulo,
					fontSize : 20 ,
					fontColor : "#fff"
					}, 
				};
			$('#barras_detalle').remove(); // this is my <canvas> element	
			$('#barras2').append('<canvas id="barras_detalle"><canvas>');			
			var ctx = $("#barras_detalle");
			/*define el tipo de grafica a usar*/
			var barGraph = new Chart(ctx, {
				type: 'horizontalBar',
				data: chartdata,
				options: options
				});
			console.log(ctx);	
		},//Cierra function(data)
			error: function(data) {
				console.log(data);
				}
			});//cierra Ajax

}
</script>
</body>
</html>