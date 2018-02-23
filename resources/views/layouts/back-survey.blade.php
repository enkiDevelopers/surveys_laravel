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
    <link rel="stylesheet" href="/css/alertify.min.css">
    <link rel="stylesheet" type="text/css" href="/css/themes/default.min.css">
    <link rel="stylesheet" href="/css/edit.css">
</head>
<body>

<div class="wrapper" id="app">
            <!-- Sidebar Holder -->
            <nav id="sidebar" class="visible-lg-* visible-md-* .visible-sm-*">
                <div>
                    <img src="/img/logos/UVM_Logo_Blanco.png" alt="Logo UVM" class="logo_UVM">
                </div>
                <hr class="divider">
                <ul class="list-unstyled components">
                    <li id="home">
                        <a href="{{ url('/administrator/surveys')}}" >
                            <span>ENCUESTAS</span>
                        </a>
                    </li>
                    <li id="files">
                        <a href="{{ url('/administrator/files') }}" >
                            <span>LISTAS</span>
                        </a>
                    </li>
                    <li id="admin-list">
                        <a href="{{ url('/administrator/management') }}">
                            <span>ADMINISTRADORES</span>
                        </a>
                    </li>
                    <li id="log-out">
                        <a href="{{ url('/logout') }}">
                            <span>SALIR</span>
                        </a>
                    </li>
                </ul>
            </nav>

                 <nav id="sidebarMobile" class="navbar-default navbar-fixed-top visible-xs">
        <ul class="list-inline components">
          <li id="UVM_Movil">
            <img src="/img/logos/UVM_Logo_Blanco.png" alt="" width="210px;" style="margin-top: 10px;margin-left: 15%;" >
          </li>
          <li id="menu" style="float: left;background-color: darkred;height: 80px;width: 18%;">
            <a href="#" style="text-align: center;color: white">
              <i class="glyphicon glyphicon-menu-hamburger"></i>
            </a>
          </li> 
          <li id="rol" style="float: right;background-color: blue;height: 80px;width: 18%;">
            <a href="#" style="text-align: center;color: white">
              <i class="glyphicon glyphicon-cog"></i>
            </a>
          </li>
        </ul>
      </nav>

      <nav id="contentSidebarMobile" class="navbar-default navbar-fixed-top" hidden="true">
        <ul class="list-unstyled components">
          <li>
            <span aria-hidden="true" style="font-size: 50px;float: right;color: white;border:5px solid white;border-radius: 50px;height: 40px;">&times;</span>
          </li>
          <li id="home" >
            <a href="{{ url('/administrator/surveys')}}" >
              <span>ENCUESTAS</span>
            </a>
          </li>
          <li id="files">
            <a href="{{ url('/administrator/files') }}" >
              <span>LISTAS</span>
            </a>
          </li>
          <li id="admin-list">
            <a href="{{ url('/administrator/management') }}">
              <span>ADMINISTRADORES</span>
            </a>
          </li>
          <li id="log-out__Content" class="exit">
            <a href="{{ url('/logout') }}">
              <span>SALIR</span>
            </a>
          </li>     
        </ul>

      </nav>

                @yield('content')
            </div>
        </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="/js/administratorAddQuestion.js"></script>
    <script src="/js/alertify.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
    <script src="/js/jquery.ui.touch-punch.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            var alto = (screen.height) - (screen.availHeight);
            var barra = screen.availHeight - alto - (alto/2) - (alto/4) - (alto/7);

            $("#sidebar").height(barra);
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
             });

            $("#sidebarMobile").on('click', '#menu', function(event) {
                $("#contentSidebarMobile").toggle("slide");
            });
        });
    </script>
</body>
</html>
