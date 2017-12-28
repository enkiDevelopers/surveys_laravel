 var barChartData = {
            labels: ["Encuesta 1", "Encuesta 2", "Encuesta 3", "Encuesta 4",],
            datasets: [{
                label: 'Número de Estudiantes Encuestados',
                backgroundColor: 'rgb(2,21,248)',
                stack: 'Stack 0',
                data: [30,60,90,85,100]
                
            }, {
                label: 'Número de Estudiantes No Encuestados',
                backgroundColor: '#DE0D0D',
                stack: 'Stack 1',
                data: [70, 40, 10, 15]
                
            }]
        };

        window.onload = function() {
            var ctx = document.getElementById('canvas').getContext('2d');
            window.myBar = new Chart(ctx, {
                type: 'bar',
                data: barChartData,
                options: {
                    title:{
                        display:true,
                        fontSize: 30,
                        fontFamily: "Arial",
                        fontColor: "#000",
                        text:"Reporte de Campus Norte"
                    },
                    tooltips: {
                        mode: 'index',
                        intersect: false
                    },
                    responsive: true,
                    scales: {
                        xAxes: [{
                            stacked: true
                        }],
                        yAxes: [{
                            stacked: true
                        }]
                    },
                    layout: {
			            padding: {
			                left: 50,
			                right: 0,
			                top: 10,
			                bottom: 10
			            }
        			}
    
                }
            });
        };


