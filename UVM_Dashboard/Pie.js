/**************************************************************/
/**	Título**/
/**	Descripción funcional (2 3 línes)**/
/**	Parámetros y Variables Globales o includes o cualquier cosa que necesite para funcionar, es decir**/
/** las interacciones que tiene con el mundo exterior a éste archivo**/
/**	Version 	Fecha			Iniciales **/
/**************************************************************/
/**/
//var url_pie="";
//$(document).ready(
function f_Pie(url_pie){
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
}
//);