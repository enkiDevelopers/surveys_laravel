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
                        <?php 
                                $datosdirective=DB::table('directives')->select(['idDirectives','nombre','apPaterno','apMaterno','type'] )->where('idDirectives','=',1)->get();
                        ?>
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
             $(document).ready(function () {
                 $('#sidebarCollapse').on('click', function () {
                     $('#sidebar').toggleClass('active');
                 });
             });
         </script>    
</body>
</html>
