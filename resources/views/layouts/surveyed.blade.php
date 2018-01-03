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
                    <h3 class="administrator-header">ENCUESTADO</h3>
                </div>

                <ul class="list-unstyled components">
                    <div class="profile center text-center">
                        <img src="/img/avatar.jpeg" alt="">
                        <p>ENCUESTADO</p>
                    </div>
                 
                </ul>
            </nav>

            <!-- Page Content Holder -->
            <div id="content" class="menu-margin">
                <div class="row">
                    <div class="col-md-11">

                        <nav class="navbar navbar-default  hidden-lg .visible-sm-*">
                            <div class="container-fluid">
        
                                <div class="navbar-header">
                                    <button type="button" id="sidebarCollapse" class="btn btn-info navbar-btn">
                                        <i class="glyphicon glyphicon-align-left"></i>
                                        <span>Toggle Sidebar</span>
                                    </button>
                                </div>
        
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
    <script src="{{ asset('js/app.js') }}"></script>

    <script src="/js/highcharts.js"></script>
    <script src="/js/exporting.js"></script>
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
