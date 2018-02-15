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
    <link rel="stylesheet" href="/css/sweetalert.min.css">
    <script src="/js/sweetalert.min.js"></script>
    <script src="{{ asset('js/app.js') }}"></script>
</head>
<body>
 
    <div class="wrapper" id="app">
            <!-- Sidebar Holder -->
            <nav id="sidebar" class="visible-lg-* visible-md-* .visible-sm-*">
                <div class="sidebar-header">
                      <h3 class="administrator-header">Administrador</h3>
                </div>

                <ul class="list-unstyled components">
                    <div class="profile center text-center" id="perfil" onclick="profile();" style="cursor:pointer;">
                        <img src="/img/avatar/default.png">
                  <a href="{{url("/administrator")}}"><p>Rafael Alberto Martínez Méndez</p></a>
                    </div>
                    <li id="home">
                        <a href="{{ url('/administrator/surveys')}}" >
                            <i class="glyphicon glyphicon-briefcase"></i>
                            <span>Encuestas</span>
                        </a>
                    </li>
                    <li id="files">
                        <a href="{{ url('/administrator/files') }}" >
                            <i class="glyphicon glyphicon-list-alt"></i>
                            <span>Encuestados</span>
                        </a>
                    </li>
                    <li id="admin-list">
                        <a href="{{ url('/administrator/management') }}">
                            <i class="glyphicon glyphicon-user"></i>
                            <span>Administradores</span>
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

            <nav id="sidebarMobile" class="navbar-default navbar-fixed-top  visible-xs" >
                <ul class="list-inline components">
                    <div class="profile center text-center" id="perfil" onclick="profile();" style="padding-top:-20px;cursor:pointer;width: 20%;display:inline-block;">
                        <img src="/img/avatar.jpeg" alt="" style="vertical-align: initial;">
                    </div>
                    <li id="home">
                        <a href="{{ url('/administrator/surveys')}}" >
                            <i class="glyphicon glyphicon-briefcase"></i>
                        </a>
                    </li>
                    <li id="files">
                        <a href="{{ url('/administrator/files') }}" >
                            <i class="glyphicon glyphicon-file"></i>
                        </a>
                    </li>
                    <li id="admin-list">
                        <a href="{{ url('/administrator/management') }}">
                            <i class="glyphicon glyphicon-user"></i>
                        </a>
                    </li>
                    <li id="log-out" class="exit">
                        <a href="{{ url('/logout') }}">
                            <i class="glyphicon glyphicon-log-out"></i>
                        </a>
                    </li>
                </ul>
            </nav>
        @yield('content')
    </div>

    <!-- Scripts -->
    <script type="text/javascript">
        $(document).ready(function () {

            var alto = (screen.height) - (screen.availHeight);
            var barra = screen.availHeight - alto - (alto/2) - (alto/4);

            $("#sidebar").height(barra);
            $('#sidebarCollapse').on('click', function () {
            $('#sidebar').toggleClass('active');
             });

        });

        function profile(){
            location.href= "{{url('/administrator')}}";
        }
    </script>
</body>
</html>
