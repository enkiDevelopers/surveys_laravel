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
  <link rel="stylesheet" href="/css/directive.css">
</head>
<body id="wrapper">
  <div class="wrapper"  id="app">
    <!-- Sidebar Holder -->
    <nav id="sidebar" class="visible-lg-* visible-md-* .visible-sm-*">
      <div>
        <img src="/img/logos/UVM_Logo_Blanco.png" alt="Logo UVM" class="logo_UVM">
      </div>
      <hr class="divider">
      <ul class="list-unstyled components">
        <div class="profile center text-center">
        <?php
          foreach ($datosdirective as $datosdirectives) {
            echo "<p style='margin:-5px';>".$datosdirective[0]->nombre." ".$datosdirective[0]->apPaterno." ".$datosdirective[0]->apMaterno."  </p>";
          }
        ?>
        <?php
          foreach ($datosdirective as $datosdirectives) {
            switch ($datosdirective[0]->type) {
              case '1':
                echo "<p>Directivo Corporativo</p>";
                break;
              case '2': 
                echo "<p style='margin: -5px 0'>Directivo Regional</p>";
                echo "<p style='margin: -5px 0'>".$datosdirective[0]->regions_name."</p>";                                    
                break;
              case '3':
                echo "<p style='margin: -5px 0'>Directivo Campus</p>";
                echo "<p style='margin: -5px 0'>".$campus[0]->campus_name."</p>";
                break;    
              default:
                echo "<p>Sin Asignar</p>";
                break;
            }
          }
        ?>
        </div>
          <li class="active">
            <a href="{{ url('/directive')}}" >
              <span>REPORTES</span>
            </a>
          </li>
          <li id="log-out" class="exit">
            <a href="{{ url('/logout') }}">
              <span>SALIR</span>
            </a>
          </li>
        </ul>
      </nav>

      <nav id="sidebarMobile" class="navbar-default navbar-fixed-top visible-xs">
        <ul class="list-inline components">
          <center>
            <li id="UVM_Movil">
              <img src="/img/logos/UVM_Logo_Blanco.png" alt="" width="210px;" style="margin-top: 10px;" >
            </li>
          </center>
          <li id="menu" style="float: left;background-color: darkred;height: 81px;width: 17%;margin-top: -74px;">
            <a href="#" style="text-align: center;color: white">
              <i class="glyphicon glyphicon-menu-hamburger"></i>
            </a>
          </li> 
          
          <li id="rol" style="float: right;background: linear-gradient(to bottom right, #1b5e20, #4caf50);height: 81px;width: 17%;margin-top: -74px;">
            <a href="{{ url('/directive')}}" style="text-align: center;color: white">
              <i class="glyphicon glyphicon-bookmark"></i>
            </a>
          </li>
        </ul>
      </nav>

      <nav id="contentSidebarMobile" class="navbar-default navbar-fixed-top" hidden="true">
        <ul class="list-unstyled components">
          <li>
            <p>
               <span aria-hidden="true" style="font-size: 50px;float: right;color: white;height: 40px;border:5px solid white;border-radius: 50px;" id="closeContentMobile">&times;</span>
            </p>
          </li>
          <li class="active">
            <a href="{{ url('/directive')}}" >
              <span>REPORTES</span>
            </a>
          </li>
          <li id="log-out" class="exit">
            <a href="{{ url('/logout') }}" style="border-bottom: 0;height: auto;">
              <span>SALIR</span>
            </a>
          </li>  
        </ul>
      </nav>
        @yield('content')
   </div>

  <!-- Scripts -->
  <script src="{{ asset('js/app.js') }}"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
  <script src="{{ asset('js/directive.js') }}"></script>
  <script src="/js/highcharts.js"></script>
  <script src="/js/exporting.js"></script>
  <script type="text/javascript">
      $(document).ready(function () {
        $("#menu, #closeContentMobile").on('click', function(event) {
          $("#contentSidebarMobile").toggle("slide");
        });
      });
  </script>
</body>
</html>
