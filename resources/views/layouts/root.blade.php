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
<body>

<div class="wrapper" id="app">
            <!-- Sidebar Holder -->
            <nav id="sidebar" class="visible-lg-* visible-md-* .visible-sm-*">
                <div class="sidebar-header" >
                    <h3 class="administrator-header text-center">Perfil: <strong>Root</strong></h3>
                </div>

                <ul class="list-unstyled components">
                    <div class="profile center text-center" id="perfil" onclick="profile();" style="cursor:pointer;">
                        <img src="/img/avatar.jpeg" alt="img-profile">
                        <a href="{{url('/root')}}"></a>
                    </div>
                    <li id="home">
                        <a href="{{ url('/root/config/')}}" >
                            <i class="glyphicon glyphicon-hdd"></i>
                            <span> Datos Generales </span>
                        </a>
                    </li>
                    <li id="newAdmin">
                        <a href="{{ url('/root/new-administrator')}}">
                            <i class="glyphicon glyphicon-user"></i>
                            <span> Agregar Administrador</span>
                        </a>
                    </li>
                    <li id="log-out">
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
                        <a href="{{ url('/root/config/')}}" >
                            <i class="glyphicon glyphicon-hdd"></i>
                            <span> Datos Generales </span>
                        </a>
                    </li>
                    <li id="newAdmin">
                        <a href="{{ url('/root/new-administrator')}}">
                            <i class="glyphicon glyphicon-user"></i>
                            <span> Agregar Administrador</span>
                        </a>
                    </li>
                    <li id="log-out">
                        <a href="{{ url('/logout') }}">
                            <i class="glyphicon glyphicon-log-out"></i>
                            <span>Salir</span>
                        </a>
                    </li>
                </ul>
            </nav>

                @yield('content')
</div>
    <!-- Scripts -->
    <script src="{{ asset('/js/app.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/1.16.1/TweenMax.min.js"></script>
    <script>
        $(document).ready(function () {

            var alto = (screen.height) - (screen.availHeight);
            var barra = screen.availHeight - alto - (alto/2) - (alto/4) - (alto/7);

            $("#sidebar").height(barra);
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
            });
        });        
    </script>
</body>
</html>
