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
                        <p>Jorge Luis González Hérnandez</p>
                    </div>
                    <li class="active">
                        <a href="{{ url('/directive')}}" >
                            <i class="glyphicon glyphicon-list-alt"></i>
                            <span>Reportes</span>
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
    <script type="text/javascript">
             $(document).ready(function () {
                 $('#sidebarCollapse').on('click', function () {
                     $('#sidebar').toggleClass('active');
                 });
             });
         </script>    
</body>
</html>
