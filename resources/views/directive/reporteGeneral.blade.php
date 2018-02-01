<link href="{{ asset('css/app.css') }}" rel="stylesheet">

<div class="container">
<button name="button" type="button" onclick="window.close();" value="Cerrar esta ventana" /> 
        <span class="glyphicon glyphicon-remove" ></span>
</button>
<a name="button" type="button" href="pdf"  value="Cerrar esta ventana" /> 
        <span class="glyphicon glyphicon-remove" ></span>
</a>

<div class="row col-md-offset-1">

    <?php 
        foreach ($datoencuesta as $datoencuestas) {
            echo "<div class='col-md-6'>";
            echo "<h3><b>Título de la escuesta: </b>{$datoencuestas->tituloEncuesta}</h3>";
            echo "</div>";
            echo "<br>";
            echo "<div class='col-md-6'>";
            echo "<img width='30%' height='90px' src='\img/iconos/{$datoencuestas->imagePath}'>";
            echo "</div>";
    }
    ?>

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
                    <div id="chartContainer" style="height: 300px; width: 100%;"></div>                   
        	</div>
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
                </div>
                <div class="col-md-6"></div>
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
 	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.bundle.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.js"></script>
    <!--<script src="/js/directive-report.js"></script>-->
    <script type="text/javascript">
        <?php include "js/directive-reportgeneral.js";
        ?>
    </script>
    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

        <script src="{{ asset('js/directive.js') }}"></script>