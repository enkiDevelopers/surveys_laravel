$(document).ready(function(){
	$.ajax({
		url: "https://uvmmejoraporti.mx/UVM_Dashboard/Barras.php?idE=2",
		//url: "https://uvmmejoraporti.mx/UVM_Dashboard/Barras.php?idE=2&Region='Sur'",
		//url: "https://uvmmejoraporti.mx/UVM_Dashboard/Barras.php?idE=2&Region='Sur'&Campus='Cuernavaca'",
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
							stepSize: 25,/*Avance de la escala*/
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
						return PorcentShow + "%";
					}
			
					}
				}
				
			};
			

			var ctx = $("#mycanvas");



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