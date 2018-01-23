@extends('layouts.directive')
	@section('content')




	<div class="row">
		<div class="col-md-6">
		<?php 
		foreach ($datoencuesta as $datoencuestas) {
			echo "<h3><b>Titulo de la escuesta: </b>{$datoencuestas->Titulo_encuesta}</h3>";
			echo "<h4><b>Región: </b></h4>";
			echo "<h4><b>Campus: </b></h4>";
			echo "</div>";
			echo "<br>";
			echo "<div class='col-md-6'>";
			echo "<img width='30%' height='90px' src='\img/iconos/{$datoencuestas->Image_path}'>";
			echo "</div></div>";
		}
            $avancegrl=($info[0]->total_incidentes)+($info[0]->total_contestados);
            $porcentajeavance=(100*$info[0]->total_encuestados)/$avancegrl;
            echo "<hr><h4><b>Encuestados Total: </b>{$porcentajeavance}</h4></hr>";

            $avancealum=($info[0]->total_incidentes_alumnos)+($info[0]->total_contestados_alumnos);
            $porcentajeavancealum=(100*$info[0]->total_alumnos)/$avancealum;

            $avanceamp=($info[0]->total_incidentes_empleados)+($info[0]->total_contestados_empleados);
            $porcentajeavanceemp=(100*$info[0]->total_empleados)/$avanceamp;
		?>

<script>
window.onload = function() {

var chart = new CanvasJS.Chart("chartContainer", {
    animationEnabled: true,
    title: {
        text: "Avance General"
    },
    data: [{
        type: "pie",
        startAngle: 90,
        yValueFormatString: "##0.00\"%\"",
        indexLabel: "{label} {y}",
        dataPoints: [
            {y: <?php echo $avancegrl ?>, label: "Avance General"},
            {y: <?php echo 100-$avancegrl ?>, label: "Avance restante"}

        ]
    }]
});

chart.render();

var chart2 = new CanvasJS.Chart("chartContaineralum", {
    animationEnabled: true,
    title: {
        text: "Avance General Alumnos"
    },
    data: [{
        type: "pie",
        startAngle: 90,
        yValueFormatString: "##0.00\"%\"",
        indexLabel: "{label} {y}",
        dataPoints: [
            {y: <?php echo $avancealum ?>, label: "Avance General Alumnos"},
            {y: <?php echo 100-$avancealum ?>, label: "Avance Restante Alumnos"}

        ]
    }]
});

chart2.render();

var chart3 = new CanvasJS.Chart("chartContaineremp", {
    animationEnabled: true,
    title: {
        text: "Avance General Empleados"
    },
    data: [{
        type: "pie",
        startAngle: 90,
        yValueFormatString: "##0.00\"%\"",
        indexLabel: "{label} {y}",
        dataPoints: [
            {y: <?php echo $avanceamp ?>, label: "Avance General Alumnos"},
            {y: <?php echo 100-$avanceamp ?>, label: "Avance Restante Alumnos"}

        ]
    }]
});

chart3.render();

}
</script>           
	<div class="row">
        <div class="col-md-6">
            <div id="chartContainer" style="height: 300px; width: 100%;"></div>
        </div> 
        <div class="col-md-6">
        <hr>
            <p>Situación de avance General de la encuesta</p>
        
        </div>       
    </div>

    <div class="row">
        <div class="col-md-6">
        <hr>
            <p>Situación de avance alumnos</p>

        </div> 
        <div class="col-md-6">
            <div id="chartContaineralum" style="height: 300px; width: 100%;"></div>
        </div>       
    </div>
    
    <div class="row">
        <div class="col-md-6">
            <div id="chartContaineremp" style="height: 300px; width: 100%;"></div>
        </div> 
        <div class="col-md-6">
        <hr>
                    <p>Situación de avance trabajadores</p>

        </div>       
    </div>
    







	@endsection

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.bundle.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.js"></script>
    <!--<script src="/js/directive-report.js"></script>-->
    <script src="/js/highcharts.js"></script>
    <script src="/js/exporting.js"></script>
    <script src="/js/directive-report1.js"></script>

<script type="text/javascript">
        var pieChartData = {
            labels: ["Incidentes por tipo de Encuestados",],
            datasets: [{
                label: 'Alumnos',
                backgroundColor: 'rgb(2,21,248)',
                stack: 'Stack 0',
                data: [<?php echo $avancegrl; ?>]
                
            }]
};

        window.onload = function() {
            var ctx = document.getElementById('pieGraf').getContext('2d');
            window.myBar = new Chart(ctx, {
                type: 'pie',
                data: pieChartData,
                options: {
                    title:{
                        display:true,
                        fontSize: 20,
                        fontFamily: "Arial",
                        fontColor: "#000",
                        text:"Encuestados"
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



    </script>


    <script type="text/javascript">
    @php
   	 $q1a=10;
     $q1b=20;
    @endphp
    
        Highcharts.chart('container', {
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: null,
            type: 'pie'
        },
        title: {
            text: 'Campus Norte '
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.y:.0f} puntos </b>'
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: true,
                    format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                    style: {
                        color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                    }
                },
                showInLegend: true
            }
        },
        series: [{
            name: 'Puntos Encuesta',
            colorByPoint: true,
            data: [{
                name: 'Estudiantes No Encuestados',
                y: {{$q1a}}
            }, {
                name: 'Estudiantes Encuestados',
                y: {{$q1b}}
            }]
        }]
        });
    </script>

    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>





