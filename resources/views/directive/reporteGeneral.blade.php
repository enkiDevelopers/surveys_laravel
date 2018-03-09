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
            echo "</div>";

        }?>
    </div> 
    <div class="col-md-4 margenarriba">
            <img class="img-responsive floatuvm" width="250px" height="100px" src="/img/mail_logo.png">    

    
    </div> 
    <div class="col-md-4 margenarriba">
        <img class="img-responsive float" width="150px" height="150px" src='/img/Por_Ti_EXPERIENCIA_UVM.png'>    
    </div>      



        <!--End Avance alumnos-->

        <!--Avance empleados-->
    <div class="col-md-12">
        <hr>
                <h2><strong><center>Avance por Región</center></strong></h2>

        <div id="chartContainer" style="height: 300px; width: 100%;"></div>
   
    </div>

    <div class="col-md-11">
            <hr>


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
                <h3><?php echo number_format($info);?></h3>
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
                <a type="button" onclick="excelinformegeneral();return false;">
                    <span><img src="\img/excel_icon.png" width="90px" height="90px"></span>
                </a>
            </div>
        </div>
    </div>
</div>

    <div class="row col-center">
        <div class="col-md-6">

        </div>
        <div class="col-md-6">
        </div>
        <div class="col-md-6">

          <legend><strong>Línea de negocios</strong></legend>
          <input type="hidden" id="idencuesta" value="{{$datoencuesta[0]->id}}">

            <select class="form-control text-black" id="cmblineanegocios" value="Linea de negocios" selected="selected" onchange="sltlinea(this.value)">
                    <option value="1">Seleccione una opción</option> 
                <?php
                        foreach ($lineanegocios as $lineanegocio) {
                        echo "<option value={$lineanegocio->lineaNegocio}>{$lineanegocio->lineaNegocio}</option>";    
                    }
                ?> 
            </select>
        </div>
        <div class="col-md-6">
          <legend><strong>Modalidad</strong></legend>
            <select class="form-control text-black" id="cmbmodalidad" value="Modalidades" selected="selected" onchange="sltmodalidades(this.value)">
                    <option value="1">Seleccione una opción</option>  
                    <?php
                        foreach ($modalidad as $modalidades) {
                    ?>
                             "<option value="{{$modalidades->modalidad}}">{{$modalidades->modalidad}}</option>";    
                    <?php    
                        }
                    ?>            
            </select>
        </div>
    </div>
    <br>
    <div class="row-center scroll">
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
                <!--<th>#PRM</th>
                    <th>#DET</th>
                    <th>%NPS</th>-->
                    <th>%Avance</th>
                </tr>
                </thead>
                <tbody id="tabla">

                    
                </tbody>
            </table>

        </div>
    </div>
</div>  
    <div class="row" style="height:50px;">
    </div>
        <!--End Avance empleados-->


    <!--<script src="/js/directive-report.js"></script>-->
    <!--<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    
    <script src="/js/canvasjs.min.js"></script>
    <script src="/js/report3.js"></script>
    <!--<script src="/js/directive-report1.js"></script>-->
    <script type="text/javascript">
        <?php include "js/directive-reportgeneral.js";
        ?>
    </script>



 
