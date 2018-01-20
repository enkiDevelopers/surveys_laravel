<!DOCTYPE html>


<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="/css/sidebar.css">

</head>

<!--modal section-->
<div id="MdCorporativo" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Reportes Disponibles</h4>
      </div>
      <div class="modal-body" >
        <div class="row">
        <div id="titulo_encuesta" class="col-md-6"></div>
        <div id="imagen" class="col-md-6"></div>

        </div>
        <fieldset>
          <legend>Reporte General</legend>
            <button class="btn btn-default">
                Ver reporte
            </button>
        </fieldset>
        <fieldset>
          <legend>Reporte regional</legend>
            <select class="form-control text-black" value="Zonas Disponibles" selected="selected" onchange="selecciona(this.value)">
            <option>Seleccione una opcion</option>
            <?php 
                foreach ($regionestotal as $regionestotales) {
                    echo "<option value=".$regionestotales->regions_id.">".$regionestotales->regions_name."</option>";
                       
                }
            ?>
            </select>
            <button class="btn btn-default">
                Ver reporte
            </button>
        </fieldset>
     <fieldset>
          <legend>Reporte Campus</legend>
          <p id='cargar'></p>
            <select class="form-control text-black" value="Seleccione Zona" id="regionescorp">

            </select>
            <button class="btn btn-default">
                Ver reporte
            </button>
        </fieldset>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
      </div>
    </div>

  </div>
</div>

<div id="MdRegional" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Reportes Disponibles</h4>
      </div>
      <div class="modal-body" >
        <div class="row">
        <div id="titulo_encuestar" class="col-md-6"></div>
        <div id="imagenr" class="col-md-6">

        </div>

        </div>
        <fieldset>
          <legend>Reporte regional</legend>
            <select class="form-control text-black" disabled>
            <?php
                foreach ($regiones as $region) {
                    echo "<option value={$region->regions_id}>{$region->regions_name}</option>";     
                }
            ?>
            </select>
            <hr>
            <button class="btn btn-default">
                Ver reporte
            </button>
        </fieldset>
     <fieldset>
          <legend>Reporte Campus</legend>
            <select class="form-control text-black">
            <?php
                foreach ($campusregion as $campusregions) {
                    echo "<option value={$campusregions->campus_id}>{$campusregions->campus_name}</option>";
                       
                }
            ?>
            </select>
            <hr>
            <button class="btn btn-default">
                Ver reporte
            </button>
        </fieldset>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
      </div>
    </div>

  </div>
</div>

<div id="MdCampus" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Reportes Disponibles</h4>
      </div>
      <div class="modal-body" >
        <div class="row">
        <div id="titulo_encuestac" class="col-md-6"></div>
        <div id="imagenc" class="col-md-6"></div>

        </div>
     <fieldset>
          <legend>Reporte Campus</legend>
            <select class="form-control text-black" id="region_campus" disabled>
            <?php
                foreach ($campus as $campu) {
                    echo "<option value={$campu->campus_id}>{$campu->campus_name}</option>";  
                }
            ?>
            </select>
            <hr>
            <button class="btn btn-default" href="">
                Ver reporte
            </button>
        </fieldset>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
      </div>
    </div>

  </div>
</div>

<!--end modal section-->
<body id="wrapper">
    <div class="wrapper"  id="app">
          <!-- Sidebar Holder -->
            <nav id="sidebar">
                <div class="sidebar-header center text-center">
                   <button type="button" id="sidebarCollapse" class="btn-default btn navbar-btn pull-right">
                        <i class="glyphicon glyphicon-menu-hamburger"></i>
                    </button>
                    <h3 class="administrator-header">Directivo</h3>
                </div>

                <ul class="list-unstyled components">
                    <div class="profile center text-center">
                        <img src="/img/avatar.jpeg" alt="">
                            <p><?php echo $datosdirective[0]->nombre." ".$datosdirective[0]->apPaterno." ".$datosdirective[0]->apMaterno;  ?></p>

                        <?php
                            switch ($datosdirective[0]->type) {
                                case '1':
                                    echo "<p>Directivo Corporativo</p>";
                                    break;
                                case '2': 
                                    echo "<p>Directivo Regional</p>";
                                    break;
                                case '3':
                                    echo "<p>Directivo Campus</p>";
                                    break;
                                
                                default:
                                    echo "<p>Sin Asignar</p>";
                                    break;
                            }
                         ?>

                    </div>
                    <li class="active">
                        <a href="{{ url('/directive')}}" >
                            <i class="glyphicon glyphicon-list-alt"></i>
                            <span>Reportes</span>
                        </a>

                    </li>
                    <li id="log-out" class="exit">
                        <a href="{{ url('/logout') }}">
                            <i class="glyphicon glyphicon-log-out"></i>
                            <span>Salir</span>
                        </a>
                    </li>
                </ul>
            </nav>

            <!-- Page Content Holder -->
            <div id="content" class="menu-margin">
                <div class="row">
                    <div class="col-md-11">

                        <nav class="navbar navbar-default  hidden-lg .visible-sm-*">
                            <div class="container-fluid">
        
                                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                                    <ul class="nav navbar-nav navbar-right">
                                        <li><a href="#">Page</a></li>
                                        <li><a href="#">Page</a></li>
                                        <li><a href="#">Page</a></li>
                                        <li><a href="#">Page</a></li>
                                    </ul>
                                </div>
                            </div>
                        </nav>
                    </div>

                </div>

                 
                @yield('content')
            </div>     
    </div>

    <!-- Scripts -->


    <script src="{{ asset('js/directive.js') }}"></script>

    <script src="{{ asset('js/app.js') }}"></script>

    <script src="/js/highcharts.js"></script>
    <script src="/js/exporting.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<script type="text/javascript">
/*
function directiveModal(comp){

  let id = comp.id;
  console.log(id);
        $.ajax({
              dataType : 'json',
              type : 'post',
              url : '/busquedamodal',
              data : {"_token": "{{ csrf_token() }}","id": id,},
              async:true,
              cache:false,
              success : function(response){
                var titulo="";
                var imagen="";
                    titulo+="<h4><b>"+response["0"].Titulo_encuesta+"</b></h4>";
                    imagen+="<img class='card-img-top' alt='Card image cap' src='\img/iconos/"+response[0].Image_path+"' width='50%' height='90px'>";
                    console.log(titulo);

                 $("#titulo_encuesta").html(titulo);
                 $("#imagen").html(imagen);

                $('#MdReporte').modal('show');

              },
              error : function(error) {
                console.log(error);
              }
          });

}
*/
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
    <script type="text/javascript">
             $(document).ready(function () {
                 $('#sidebarCollapse').on('click', function () {
                     $('#sidebar').toggleClass('active');
                 });
             });
         </script>    
</body>
</html>
