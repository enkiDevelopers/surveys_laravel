<link href="{{ asset('css/app.css') }}" rel="stylesheet">

<div class="container">
<button name="button" type="button" onclick="window.close();" value="Cerrar esta ventana" /> 
        <span class="glyphicon glyphicon-remove" ></span>
</button>

<div class="row col-lg-offset-2">
	<!--<div class="col-md-13 col-md-offset-2">-->
		<?php 
		foreach ($datoencuesta as $datoencuestas) {
            echo "<div class='col-md-6'>";
			echo "<h3><b>Titulo de la escuesta: </b>{$datoencuestas->Titulo_encuesta}</h3>";
			echo "<h4><b>Campus: {$campusname[0]->campus_name} </b></h4>";
			echo "</div>";
			echo "<div class='col-md-6'>";
            echo "<br>";
			echo "<img width='30%' height='90px' src='\img/iconos/{$datoencuestas->Image_path}'>";
			echo "</div>";
		}?>
        
        <?php
        if($info[0]->total_encuestados==0){
            $avancegrl=0;
            $avancealum=0;
            $avanceamp=0;
            $porcentajeavance=0;
            $porcentajeavancealum=0;
            $porcentajeavanceemp=0;

        }else{
            $avancegrl=($info[0]->total_incidentes)+($info[0]->total_contestados);
            $porcentajeavance=(100*$avancegrl)/$info[0]->total_encuestados;

            $avancealum=($info[0]->total_incidentes_alumnos)+($info[0]->total_contestados_alumnos);
            $porcentajeavancealum=(100*$avancealum)/$info[0]->total_alumnos;

            $avanceamp=($info[0]->total_incidentes_empleados)+($info[0]->total_contestados_empleados);
            $porcentajeavanceemp=(100*$avanceamp)/$info[0]->total_empleados;
        }
		?>

 
        <!--Avance General-->
	<div class="col-md-11">
        <hr>
        <div class="col-md-6">
            <div id="chartContainer" style="height: 300px; width: 100%;"></div>
        </div> 
        <div class="col-md-6">
            <p>Situación de avance General de la encuesta</p>
            <h3><b>Encuestados total: </b>{{$info[0]->total_encuestados}}</h3>
            <h5><b>Avance contestados: </b>{{$avancegrl}}</h5>
            <h5><b>Falta por contestar: </b>{{$info[0]->total_encuestados-$avancegrl}}</h5>

        </div>       
    </div>
        <!--End Avance General-->

        <!--Avance alumnos-->
    <div class="col-md-11">
        <hr>

        <div class="col-md-6">
            <p>Situación de avance alumnos</p>
            <h3><b>Alumnos total: </b>{{$info[0]->total_alumnos}}</h3>
            <h5><b>Avance contestados: </b>{{$avancealum}}</h5>
            <h5><b>Falta por contestar: </b>{{$info[0]->total_alumnos-$avancealum}}</h5>

        </div> 
        <div class="col-md-6">
            <div id="chartContaineralum" style="height: 300px; width: 100%;background: transparent;"></div>
        </div>  
    </div>     
        <!--End Avance alumnos-->

        <!--Avance empleados-->
    <div class="col-md-11">
            <hr>

        <div class="col-md-6">
            <div id="chartContaineremp" style="height: 300px; width: 100%;background: transparent;"></div>
        </div> 
        <div class="col-md-6">
            <p>Situación de avance trabajadores</p>
            <h3><b>Empleados total: </b>{{$info[0]->total_empleados}}</h3>
            <h5><b>Avance contestados: </b>{{$avanceamp}}</h5>
            <h5><b>Falta por contestar: </b>{{$info[0]->total_empleados-$avanceamp}}</h5>


        </div>       
    </div>
   <!--  </div>-->
</div>
</div>
        <!--End Avance empleados-->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.bundle.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.js"></script>
    <!--<script src="/js/directive-report.js"></script>-->
    <script src="/js/directive-report1.js"></script>
    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>

<script type="text/javascript">
window.onload = function() {

var chart = new CanvasJS.Chart("chartContainer", {
    backgroundColor: "transparent",
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
            {y: <?php echo $porcentajeavance ?>, label: "Avance General"},
            {y: <?php echo 100-$porcentajeavance ?>, label: "Avance restante"}

        ]
    }]
});

chart.render();



var chart2 = new CanvasJS.Chart("chartContaineralum", {
    backgroundColor: "transparent",
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
            {y: <?php echo $porcentajeavancealum ?>, label: "Avance General Alumnos"},
            {y: <?php echo 100-$porcentajeavancealum ?>, label: "Avance Restante Alumnos"}

        ]
    }]
});

chart2.render();

var chart3 = new CanvasJS.Chart("chartContaineremp", {
    backgroundColor: "transparent",
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
            {y: <?php echo $porcentajeavanceemp ?>, label: "Avance General Alumnos"},
            {y: <?php echo 100-$porcentajeavanceemp ?>, label: "Avance Restante Alumnos"}

        ]
    }]
});

chart3.render();

}
</script>  




