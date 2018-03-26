<link href="{{ asset('css/app.css') }}" rel="stylesheet">
<link href="{{ asset('css/report.css') }}" rel="stylesheet">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<meta name="csrf-token" content="{{ csrf_token() }}">

<div class="container">
<!--<button name="button" type="button" onclick="window.close();" value="Cerrar esta ventana" /> 
        <span class="glyphicon glyphicon-remove" ></span>
</button>-->
<div class="row">
    
</div>

<div class="row col-lg-offset-2 padding">
    <!--<div class="col-md-13 col-md-offset-2">-->
    <div class="col-md-4 margenarriba">
        <?php 
        foreach ($datoencuesta as $datoencuestas) {
            echo "<div class='col-md-6 text'>";
            echo "<h3><b>Encuesta: </b>{$datoencuestas->tituloEncuesta}</h3>";
            echo "<h4><b>Región: {$regioname[0]->regions_name} </b></h4>";
            echo "</div>";

        }?>
    </div> 
    <div class="col-md-4 margenarriba">
            <img class="img-responsive floatuvm" width="250px" height="100px" src="/img/mail_logo.png">    
    </div> 
    <div class="col-md-4 margenarriba">
        <img class="img-responsive float" width="150px" height="150px" src='/img/Por_Ti_EXPERIENCIA_UVM.png'>    
          <input type="hidden" id="idencuesta" value="{{$datoencuesta[0]->id}}">
          <input type="hidden" id="region" value="{{$regioname[0]->regions_name}}">
    </div>      
        <?php
     /*   if($info[0]->total_encuestados==0){
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
        }*/
        ?>

 
        <!--Avance General-->
    <div class="col-md-12">
        <hr>
                <h2><strong><center>Avance por campus</center></strong></h2>

            <div id="chartContainer" style="height: 300px; width: 100%;"></div>
   
    </div>
        <!--End Avance General-->

        <!--Avance alumnos-->
   <!-- <div class="col-md-11">
        <hr>

        <div class="col-md-6">
            <p>Situación de avance alumnos</p>
            <h3><b>Alumnos total: </b></h3>
            <h5><b>Avance contestados: </b></h5>
            <h5><b>Restante: </b></h5>

        </div> 
        <div class="col-md-6">
            <div id="chartContaineralum" style="height: 300px; width: 100%;background: transparent;"></div>
        </div>  
    </div>     -->
        <!--End Avance alumnos-->

        <!--Avance empleados-->
    <div class="col-md-11">
            <hr>

       <!-- <div class="col-md-6">
            <div id="chartContaineremp" style="height: 300px; width: 100%;background: transparent;"></div>
        </div>--> 
    <!--    <div class="col-md-6">
            <p>Situación de avance trabajadores</p>
            <h3><b>Empleados total: </b></h3>
            <h5><b>Avance contestados: </b></h5>
            <h5><b>Restante: </b></h5>
        </div>       
    </div>-->
   <!--  </div>-->
</div>

</div>
<div class="row col-center">
    <div class="col-md-6">
        <h2><strong><center>Encuestados por canal</center></strong></h2>
        <div id="canales" style="height: 300px; width: 100%;background: transparent;"></div>
    </div>
    <div class="col-md-6">
            <div class="col-md-7 cuadrogris">
            <div class="dato">
                <h3><?php echo number_format($info)?></h3>
                <p><strong>Encuestados</strong></p>
            </div>
        </div>

    <br>
        <div class="col-md-7 cuadrogris" style="display:none">
        <!--Se comenta un diplay none esperando el procedimiento NPS -->
            <div class="dato">
                <h3>%</h3>
                <p><strong>NPS Promedio</strong></p>
            </div>
        </div>
        <div class="col-md-7 cuadrogris">
            <div class="dato">
                <h3><?php echo number_format($totalEncuestados-$info); ?></h3>
                <p><strong>Faltantes</strong></p>
            </div>
        </div>
        <div class="col-md-7 cuadrogrisdato">
            <div class="col-md-8">Reporte Faltante:</div>
            <div class="col-md-3">
                <a type="button" onclick="excelinformeregion();">
                    <span><img src="\img/excel_icon.png" width="90px" height="90px"></span>
                </a>
            </div>
        </div>
    </div>
</div>

   <!-- -->
    <br>
  <!--  <div class="row-center scroll">
        <div class="col-md-12 ">
            <table class="table">
                <thead>
                <tr>
                    <th>Línea de Negocio</th>
                    <th>Modalidad</th>
                    <th>#ENC</th>
                    <th>#FAL</th>
                    <th>#Total</th>
                    <th>#SIS</th>
                    <th>#OLN</th>
                    <th>#CNX</th>
                    <th>#FBK</th>
                    <th>#HP12</th>
                    <th>#EMAIL</th>
                <th>#PRM</th>
                    <th>#DET</th>
                    <th>%NPS</th>-
                    <th>%Avance</th>
                </tr>
                </thead>
                <tbody id="tabla">

                    
                </tbody>
            </table>

        </div>
    </div>-->

</div>  
    <div class="row" style="height:50px;">
    </div>
        <!--End Avance empleados-->



    <!--<script src="/js/directive-report.js"></script>-->
    <!--<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    
    <script src="/js/canvasjs.min.js"></script>
    <script src="/js/report2.js"></script>
    <!--<script src="/js/directive-report1.js"></script>-->
    <script type="text/javascript">
        <?php include "js/directive-report1.js";
        ?>
    </script>



 
