/*Pendiente Integrar esto en un PHP genérico que reciba los parámetros de idE, Región y Campus, para modificar la variable url.*/
$(document).ready(function(){
	$.ajax({
		url: "https://uvmmejoraporti.mx/UVM_Dashboard/ResumenCanal.php?idE=2",
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
					bodyFontSize: 30,
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
					fontSize : 40 ,
					fontColor : "#111"
				},
				legend : {
					display : true,
					position : "right",
					fontSize: 36
				}
				
				
			};
			var chartdata = {
				labels: Canal,
				datasets : [
					{
						label: 'Encuestados por Canal',
						data: Total,
						backgroundColor : [
						
							"#6f9c3d",
							"#a5c90f",
							"#d5e24b",
							"#fcfa96",
							"#fcf150",
							"#fce30b",
							"#ffad00",
							"#ed6e10",
							"#c71313",
							"#d05664",
							"#398cab",
							"#18655b"

		                ],
		                borderColor : [
						
							"#6f9c3d",
							"#a5c90f",
							"#d5e24b",
							"#fcfa96",
							"#fcf150",
							"#fce30b",
							"#ffad00",
							"#ed6e10",
							"#c71313",
							"#d05664",
							"#398cab",
							"#18655b"

		                ],
		                borderWidth : [1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1]
					}
				]
			};

			
			
			var ctx = $("#mycanvas");

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