@extends('layouts.directive')

@section('content')

<div class="row">
    <div class="container">
    	<div class="col-md-11">
		<?php 
		foreach ($datoencuesta as $datoencuestas) {
            echo "<div class='col-md-6'>";
			echo "<h3><b>Titulo de la escuesta: </b>{$datoencuestas->Titulo_encuesta}</h3>";
			echo "<h4><b>Región: </b></h4>";
			echo "<h4><b>Campus: </b></h4>";
			echo "</div>";
			echo "<br>";
			echo "<div class='col-md-6'>";
			echo "<img width='30%' height='90px' src='\img/iconos/{$datoencuestas->Image_path}'>";
			echo "</div>";
		}?>


        <div class="col-md-11">
        	<hr>
			<div id="chartContainer" style="height: 300px; width: 100%;"></div>
        </div>
        <?php
        $totalgrl=0;
        $totalencuesta=0;
        $totalalum=0;
        $totalencuestaalumno=0;
        $totaltra=0;
        $totalencuestatrabajador=0;

        foreach ($estadisticas as $estadistica) {
       	  if($estadistica->total_encuestados==0){
        }else{
        	$totalgrl+=$estadistica->total_incidentes+$estadistica->total_contestados;
        	$totalencuesta+=$estadistica->total_encuestados;
        }
        }
        if($totalgrl==0){
        }else{
        	$totalgrl=($totalgrl*100)/$totalencuesta;
        }


        foreach ($estadisticas as $estadistica) {
       	  if($estadistica->total_encuestados==0){
        }else{
        	$totalalum+=$estadistica->total_incidentes_alumnos+$estadistica->total_contestados_alumnos;
        	$totalencuestaalumno+=$estadistica->total_alumnos;
        }
        }

        if($totalalum==0){
        }else{
        	$totalalum=($totalalum*100)/$totalencuestaalumno;
        }


        foreach ($estadisticas as $estadistica) {
       	  if($estadistica->total_encuestados==0){
        }else{
        	$totaltra+=$estadistica->total_incidentes_empleados+$estadistica->total_contestados_empleados;
        	$totalencuestatrabajador+=$estadistica->total_empleados;
        }
        }

        if($totaltra==0){
        }else{
        	$totaltra=($totaltra*100)/$totalencuestatrabajador;
        }

		?>

         <div class="col-md-11">
        	<hr>
                <div class="col-md-6">
                </div>
        <div class="col-md-6">
            <div id="chartContainergrl" style="height: 300px; width: 100%;"></div>
        </div> 
        </div>
        <div class="col-md-11">
        	<hr>
        <div class="col-md-6">
            <div id="chartContaineralum" style="height: 300px; width: 100%;background: transparent;"></div>
        <div class="col-md-6">
        	</div>
        </div> 
        </div>
        <div class="col-md-11">
        	<hr>
        <div class="col-md-6">
        	</div>
        <div class="col-md-6">
            <div id="chartContaineremp" style="height: 300px; width: 100%;background: transparent;"></div>
        </div> 
        </div>

    </div>
</div>


<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>



<script type="text/javascript">
window.onload = function () {

var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	title:{
		text: "Reporte de Región"
	},	
	axisY: {
		title: "Encuestas contestadas",
		titleFontColor: "#4F81BC",
		lineColor: "#4F81BC",
		labelFontColor: "#4F81BC",
		tickColor: "#4F81BC"
	},

	toolTip: {
		shared: true
	},
	legend: {
		cursor:"pointer",
		itemclick: toggleDataSeries
	},
	data: [{
		type: "column",
		name: "Encuestas contestadas",
		legendText: "Encuestas contestadas",
		showInLegend: true, 
		dataPoints:[
    <?php
    	foreach ($estadisticas as $estadistica) {
    		$dato=$estadistica->total_contestados+$estadistica->total_incidentes;
    		echo "{ label: ".'"'.$estadistica->campus_name.'"'.",y: ".$dato."},\n";
    	}
    ?>

		]
	},
	{
		type: "column",	
		name: "Encuestas aun no contestadas",
		legendText: "Encuestas aun no contestadas",
		showInLegend: true,
		dataPoints:[
    <?php
    	foreach ($estadisticas as $estadistica) {
    		$faltante=$estadistica->total_encuestados-($estadistica->total_contestados+$estadistica->total_incidentes);
    		echo "{ label: ".'"'.$estadistica->campus_name.'"'.",y: ".$faltante."},\n";
    	}
    ?>
			



		]
	}]
});
chart.render();


function toggleDataSeries(e) {
	if (typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
		e.dataSeries.visible = false;
	}
	else {
		e.dataSeries.visible = true;
	}
	chart.render();
}
var chart = new CanvasJS.Chart("chartContainergrl", {
    backgroundColor: "transparent",
    animationEnabled: true,
    title: {
        text: "Avance General en la Región"
    },

    data: [{
        type: "pie",
        startAngle: 90,
        yValueFormatString: "##0.00\"%\"",
        indexLabel: "{label} {y}",
        dataPoints: [
            {y:<?php echo $totalgrl ?> , label: "Avance General"},
            {y:<?php echo 100-$totalgrl ?>, label: "Avance restante"}

        ]
    }]
});

chart.render();



var chart2 = new CanvasJS.Chart("chartContaineralum", {
    backgroundColor: "transparent",
    animationEnabled: true,
    title: {
        text: "Avance General Alumnos en la Region"
    },
    data: [{
        type: "pie",
        startAngle: 90,
        yValueFormatString: "##0.00\"%\"",
        indexLabel: "{label} {y}",
        dataPoints: [
            {y: <?php echo $totalalum?> , label: "Avance General Alumnos"},
            {y: <?php echo 100-$totalalum?> , label: "Avance Restante Alumnos"}

        ]
    }]
});

chart2.render();

var chart3 = new CanvasJS.Chart("chartContaineremp", {
    backgroundColor: "transparent",
    animationEnabled: true,
    title: {
        text: "Avance General Empleados en la Region"
    },
    data: [{
        type: "pie",
        startAngle: 90,
        yValueFormatString: "##0.00\"%\"",
        indexLabel: "{label} {y}",
        dataPoints: [
            {y: <?php echo $totaltra ?> , label: "Avance General Alumnos"},
            {y: <?php echo 100-$totaltra?>, label: "Avance Restante Alumnos"}

        ]
    }]
});

chart3.render();


}
</script>


@endsection
