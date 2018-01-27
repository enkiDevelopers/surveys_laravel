
<link href="{{ asset('css/app.css') }}" rel="stylesheet">

<div class="container">

<button name="button" type="button" onclick="window.close();" value="Cerrar esta ventana" /> 
        <span class="glyphicon glyphicon-remove" ></span>
</button>

<div class="row col-md-offset-1">
		<?php 
		foreach ($datoencuesta as $datoencuestas) {
            echo "<div class'col-md-11'>";
            echo "<div class='col-md-6'>";
			echo "<h3><b>Título de la escuesta: </b>{$datoencuestas->titulo}</h3>";
			echo "<h4><b>Región: {$regioname[0]->regions_name}</b></h4>";
			echo "</div>";
			echo "<br>";
			echo "<div class='col-md-6'>";
			echo "<img width='30%' height='90px' src='\img/iconos/{$datoencuestas->imagen}'>";
			echo "</div>";
            echo "</div>";
		}?>


        <div class="col-md-11">
        	<hr>
			<div id="chartContainer" style="height: 300px; width: 100%;"></div>
        </div>
        <?php
        $totalgrl=0;
        $total1=0;
        $totalencuesta=0;
        $total2=0;
        $totalalum=0;
        $totalencuestaalumno=0;
        $totaltra=0;
        $total3=0;
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
            $total1=$totalgrl;
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
            $total2=$totalalum;
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
            $total3=$totaltra;
        	$totaltra=($totaltra*100)/$totalencuestatrabajador;
        }

		?>

         <div class="col-md-11">
        	<hr>
                <div class="col-md-6">
                    <p>Avance General</p>
                    <h3><b>Encuestados total: </b>{{$totalencuesta}}</h3>
                    <h5><b>Avance contestados: </b>{{$total1}}</h5>
                    <h5><b>Falta por contestar: </b>{{$totalencuesta-$total1}}</h5>
                </div>
        <div class="col-md-6">
            <div id="chartContainergrl" style="height: 300px; width: 100%;"></div>
        </div> 
        </div>
        <div class="col-md-11">
        	<hr>
        <div class="col-md-6">
            <div id="chartContaineralum" style="height: 300px; width: 100%;background: transparent;"></div>
        </div>
        <div class="col-md-6">
                    <h3><b>Encuestados total: </b>{{$totalencuestaalumno}}</h3>
                    <h5><b>Avance contestados: </b>{{$total2}}</h5>
                    <h5><b>Falta por contestar: </b>{{$totalencuestaalumno-$total2}}</h5>
        	</div>
  
        </div>
        <div class="col-md-11">
        	<hr>
        <div class="col-md-6">
            <h3><b>Encuestados total: </b>{{$totalencuestatrabajador}}</h3>
            <h5><b>Avance contestados: </b>{{$total3}}</h5>
            <h5><b>Falta por contestar: </b>{{$totalencuestatrabajador-$total3}}</h5>
        </div>
        <div class="col-md-6">
            <div id="chartContaineremp" style="height: 300px; width: 100%;background: transparent;"></div>
        </div> 
        </div>
</div>
</div>



<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
<script type="text/javascript"><?php include 'js/directive-report1.js';?></script>