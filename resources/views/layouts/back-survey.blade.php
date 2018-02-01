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

</head>
<body>

<div class="wrapper" id="app">
            <!-- Sidebar Holder -->
            <nav id="sidebar" class="visible-lg-* visible-md-* .visible-sm-*">
                <div class="sidebar-header">
                    <h3 class="administrator-header">Administrador</h3>
                </div>

                <ul class="list-unstyled components">
                    <div class="profile center text-center">
                        <img src="/img/avatar.jpeg" alt="img-profile">
                        <p>Rafael Alberto Martínez Méndez</p>
                    </div>
                    <li id="home">
                        <a href="{{ url('/administrator/surveys')}}/{{$admor}}" >
                            <i class="glyphicon glyphicon-arrow-left"></i>
                            <span> volver </span>
                        </a>
                    </li>
                </ul>
            </nav>

            <nav id="sidebarMobile" class="navbar-default navbar-fixed-top  visible-xs" >
                <ul class="list-unstyled components">
                    <div class="profile center text-center" id="perfil" onclick="profile();" style="padding-top:-20px;cursor:pointer;width: 20%;display:inline-block;">
                        <img src="/img/avatar.jpeg" alt="" style="vertical-align: initial;">
                    </div>
                    <li id="home"  style="display: inline-flex;padding-right: 10px;" class="pull-right">
                        <a href="{{ url('/administrator/surveys')}}/{{$admor}}" >
                            <i class="glyphicon glyphicon-arrow-left"></i>
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

    <script type="text/javascript">
        $(document).ready(function () {

            var alto = (screen.height) - (screen.availHeight);
            var barra = screen.availHeight - alto - (alto/2) - (alto/4) - (alto/7);

            $("#sidebar").height(barra);
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
             });

        //     alert("Ancho: "+screen.availWidth+ "Alto: "+screen.availHeight);

            if (window.matchMedia('(max-width: 770px)').matches) { // si es menor a 400px
                 $(".container").css('margin-top','100px');
            }
        });
    </script>
</body>
</html>
