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
			echo "</div>";
		}

		?>

	</div>


	<div class="row">
		<div class="container">
			<div class="col-md-10">
				<div class="col-md-12" >
					<canvas id="canvas"></canvas>
				</div>
			</div>
		</div>
	</div>


<div class="row">
    <div class="container">
        <div class="col-md-12">
            <div id="container" class="col-md-12"></div>
        </div>
    </div>
</div>


	@endsection
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.bundle.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.js"></script>
    <script src="/js/directive-report.js"></script>