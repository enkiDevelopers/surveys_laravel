//<?php
//$js_BarrasDetalle = "
//<script type = 'text/javascript'>
$(document).ready(function(){
	var url_detalle = \"\";
	$.ajax(
		{
		url:  \"";
//$js_BarrasDetalle .= $url_Lista;		
//$js_BarrasDetalle .= "\",
		method: \"GET\",
		success: function(data) {
			console.log(data);
			var output_url=\"";
$js_BarrasDetalle .= $url_barras2;
$js_BarrasDetalle .= "\";
			var Region = [];
			var Region_html =\"\";
			var Campus = [];
			var Campus_html =\"<option value='Todos'>Seleccione un Campus</option>\";
			for( var i in data) {
				if (i==0) { Region.push(data[i].Region); } else {
					if (Region.indexOf(data[i].Region) ==-1){ Region.push(data[i].Region); } else {}
					};
				Campus.push(data[i].Campus);
			}
			$(\"#Region\").html(\"\");
			for (var j in Region) {
				Region_html=Region_html+\"<option value='\"+Region[j]+\"'>\"+Region[j]+\"</option>\";
			}
			$(\"#Region\").html(Region_html);

			output_url = output_url + \"&Region='\"+Region[0]+\"'\";
			url_detalle = output_url;
			//j=0;
			//$(\"#Campus\").html(\"\");
			//for (j in Campus) {
			//	Campus_html=Campus_html+\"<option value='\"+Campus[j]+\"'>\"+Campus[j]+\"</option>\";
			//}
			//$(\"#Campus\").html(Campus_html);
				//DG
				console.log('se ejecuta dg');
	setTimeout(Espera(), 2000);
	function Espera (){
		console.log('se espero');
	
		console.log(url_detalle);
	}
			
		}
	}
	)
	

	$.ajax(
	{
		url: url_detalle, //<-----------REVISAR PARFAVAR Debemos poder cahcar ésta variable del Ajax anterior ya se llena bien la variable output_url
		method: \"GET\",
		success: function(data) {
			console.log('los datos ' + data);
			//console.log(url_detalle);
			var Rubro = [];//Va antes de Avance en la consulta
			var Region = [];
			var Campus = [];
			var LineaNegocio = [];
			var Avance = [];
/*			var Encuestado = [];
			var Incidencia = [];*/
			var Porcent = [];//Almacenará el porcentaje de avance. se tiene q actualizar la pagina para que cambie
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
				//Eliqe el set de datos a graficar
			if (Campus.length == 0 ){//Si no tiene Campus entonces arroja Region en la consulta	
				for (var i2 in Region){
				Rubro.push (Region[i2]);
				}
			}
			else {//Si tiene campus
			if (LineaNegocio.length == 0){//Si tiene Campus && NO Tiene linea de negocio arroja Campus	
				for (var i2 in Campus){
				Rubro.push (Campus[i2]);
				}
			}
			else {//si tiene LineaNegocio ademas de capus
				for (var i2 in LineaNegocio){
					Rubro.push (LineaNegocio[i2]);
				}
			}
			}//cierra if anidado
			/*opciones de estilo*/
			var chartdata = {
				labels: Rubro,
				datasets : [ 	
					{
						label: ' ',
						backgroundColor: \"#a55eea\",
						borderColor: \"#a55eea\",
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
							fontColor: '#fff',
							stepSize: 25,/*Avance de la escala*/
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
				/*opciones de estilo para el tooltip*/
				tooltips: {
					callbacks: {
						label: function(tooltipItem, data) {//Modifica el mensaje de descripcion del tooltip
						var PorcentShow = data.datasets[0].data[tooltipItem.index];
						return PorcentShow + \"%\";}
					}
				},
				title : {
					display : true,
					position : \"top\",
					text : \"% Avance \",
					fontSize : 20 ,
					fontColor : \"#fff\"
				}, 
			};
			var ctx = $(\"#barras_detalle\");
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
});
//</script>	
	";
//echo $js_BarrasDetalle;
//?>	