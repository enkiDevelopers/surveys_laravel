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
      <script src="/js/edit.js"></script>
        <script src="{{ asset('js/app.js') }}"></script>
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
                            <span>USUARIOS</span>
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
          <li id="rol" style="float: right;background: linear-gradient(to bottom right, #0f1973, #0d47a1);height: 81px;width: 17%;margin-top: -74px;">
            <a href="{{ url('/administrator/') }}" style="text-align: center;color: white">
              <i class="glyphicon glyphicon-cog"></i>
            </a>
          </li>
        </ul>
      </nav>

      <nav id="contentSidebarMobile" class="navbar-default navbar-fixed-top" hidden="true">
        <ul class="list-unstyled components">
          <li id="home">
            <a href="{{ url('/administrator/surveys')}}" >
              <span class="itemMenuMobile">ENCUESTAS</span>
            </a>
          </li>
          <li id="files">
            <a href="{{ url('/administrator/files') }}" >
              <span class="itemMenuMobile">LISTAS</span>
            </a>
          </li>
          <li id="admin-list">
            <a href="{{ url('/administrator/management') }}">
              <span class="itemMenuMobile">USUARIOS</span>
            </a>
          </li>
          <li id="log-out__Content" class="exit">
            <a href="{{ url('/logout') }}" style="border-bottom: 0;height: auto;">
              <span class="itemCloseMenuMobile">SALIR</span>
            </a>
          </li>
        </ul>

      </nav>

                @yield('content')
            </div>
        </div>

    <!-- Scripts -->

    <script src="/js/administratorAddQuestion.js"></script>
    <script src="/js/alertify.min.js"></script>
    <script src="/js/jqueryui.min.js"></script>
    <script src="/js/jquery.ui.touch-punch.min.js"></script>
    <script type="text/javascript">
      $(document).ready(function () {
        window.addEventListener('click', function(e){
          if (document.getElementById('menu').contains(e.target)){
            $("#contentSidebarMobile").toggle("slide");
          } else{
            $("#contentSidebarMobile").hide("slide");
          }
        })
      });

      imagen();
    </script>
</body>
</html>
