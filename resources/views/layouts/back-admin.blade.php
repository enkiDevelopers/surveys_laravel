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
                <div class="sidebar-header">
                   <button type="button" id="sidebarCollapse"  class=" btn-default btn navbar-btn pull-right">
                        <i class="glyphicon glyphicon-menu-hamburger"></i>
                    </button>
                    <h3 class="administrator-header">Administrador</h3>
                </div>

                <ul class="list-unstyled components">
                    <div class="profile center text-center">
                        <img src="/img/avatar.jpeg" alt="">
                        <p>Rafael Alberto Martínez Méndez</p>
                    </div>
                    <li id="home">
                        <a href="{{ url('administrator/management')}}" >
                            <i class="glyphicon glyphicon-arrow-left	Try it
"></i>
                            <span> volver</span>
                        </a>
                    </li>



        <!--                <li id="list-surveyed">
                        <a href="{{ url('/administrator/surv-list') }}">
                            <i class="glyphicon glyphicon-link"></i>
                            <span>Lista de encuestados</span>
                        </a>
                    </li> -->
                </ul>
            </nav>

                @yield('content')
            </div>
        </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="/js/administrator-new-survey.js"></script>
    <script type="text/javascript">
            $(document).ready(function () {
                 $('#sidebarCollapse').on('click', function () {
                     $('#sidebar').toggleClass('active');
                 });

            //     alert("Ancho: "+screen.availWidth+ "Alto: "+screen.availHeight);

                if (window.matchMedia('(max-width: 400px)').matches) { // si es menor a 400px
                    $("#sidebar").addClass('active');
                    $(".sidebar-header").hide();
                    $("p").hide();
                }else {
                  //  $("#sidebar").addClass('active');
                }
             });
         </script>
</body>
</html>
