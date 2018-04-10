<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!--<link rel="stylesheet" href="/css/sidebar.css">-->
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link rel="stylesheet" href="/css/surveyed.css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>

<style type="text/css">

</style>
</head>
<body>
  <div class="row">
    <center>
        <img src="/img/mail_logo.png">
        <h3><p><?php echo $info[0]->nombreGeneral ?></p></h3>
        <?php
            if($info[0]->email2 == 0 ){
        ?>
            <p><?php echo $info[0]->email1?></p>
        <?php
            }if($info[0]->email2 != 0 && $info[0]->email3==0 ){
        ?>
            <p><?php echo $info[0]->email1?> | <?php echo $info[0]->email2?></p>
        <?php
            }if($info[0]->email1 != 0  && $info[0]->email2 != 0 && $info[0]->email3==0 ){
        ?>
            <p><?php echo $info[0]->email1?> | <?php echo $info[0]->email2?> | <?php echo $info[0]->email3?></p>

        <?php
            }

        ?>
    </center>
  </div>

<!--<nav class="navbar navbar-default" role="navigation">
        <div class="navbar-header">
            <a id="menu-toggle" href="#" class="navbar-toggle">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
            </a>
        </div>
        <div id="sidebar-wrapper" class="sidebar-toggle list-unstyled components">
            <ul class="sidebar-nav">
                <div class="profile center text-center" style="width:200px;margin-top:20%;">
                            <img src="/img/avatar.jpeg" alt="">
                            <p>Encuestado</p>
                            <?php
                                    echo $info[0]->nombreGeneral."\n";
                                    echo $info[0]->email1;
                            ?>
                </div>
                    <li id="log-out" class="exit">
                        <a href="{{ url('/logout') }}">
                            <i class="glyphicon glyphicon-log-out"></i>
                            <span>Salir</span>
                        </a>
                    </li>

            </ul>
        </div>
</nav>-->
  <div class="main" >

                @yield('content')
    </div>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<link href="/css/bootstrap-toggle.min.css" rel="stylesheet">
  <script src="/js/bootstrap-toggle.min.js"></script>
</body>
</html>
