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
    <!--<link rel="stylesheet" href="/css/sidebar.css">-->
    <link rel="stylesheet" href="/css/surveyed.css">
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

<style type="text/css">

</style>
</head>
<body>
  <div class="row">
    <center>
        <img src="/img/mail_logo.png">
        <h3><p><?php echo $info[0]->nombreGeneral ?></p></h3>
        <?php
            if($info[0]->email2 == "" ){
        ?>
            <p><?php echo $info[0]->email1?></p>
        <?php
            }if($info[0]->email2 != "" && $info[0]->email3=="" ){
        ?>
            <p><?php echo $info[0]->email1?> | <?php echo $info[0]->email2?></p>
        <?php
            }if($info[0]->email1 != ""  && $info[0]->email2 != "" && $info[0]->email3!="" ){
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

    <script src="/js/highcharts.js"></script>
    <script src="/js/exporting.js"></script>
    <script type="text/javascript">
    function htmlbodyHeightUpdate(){
        var height3 = $( window ).height()
        var height1 = $('.nav').height()+50
        height2 = $('.main').height()
        if(height2 > height3){
            $('html').height(Math.max(height1,height3,height2)+10);
            $('body').height(Math.max(height1,height3,height2)+10);
        }
        else
        {
            $('html').height(Math.max(height1,height3,height2));
            $('body').height(Math.max(height1,height3,height2));
        }
        
    }
    $(document).ready(function () {
        htmlbodyHeightUpdate()
        $( window ).resize(function() {
            htmlbodyHeightUpdate()
        });
        $( window ).scroll(function() {
            height2 = $('.main').height()
            htmlbodyHeightUpdate()
        });
    });

    $(window).resize(function() {
    var path = $(this);
    var contW = path.width();
    if(contW >= 751){
        document.getElementsByClassName("sidebar-toggle")[0].style.left="200px";
    }else{
        document.getElementsByClassName("sidebar-toggle")[0].style.left="-200px";
    }
});
$(document).ready(function() {
    $('.dropdown').on('show.bs.dropdown', function(e){
        $(this).find('.dropdown-menu').first().stop(true, true).slideDown(300);
    });
    $('.dropdown').on('hide.bs.dropdown', function(e){
        $(this).find('.dropdown-menu').first().stop(true, true).slideUp(300);
    });
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        var elem = document.getElementById("sidebar-wrapper");
        left = window.getComputedStyle(elem,null).getPropertyValue("left");
        if(left == "200px"){
            document.getElementsByClassName("sidebar-toggle")[0].style.left="-200px";
        }
        else if(left == "-200px"){
            document.getElementsByClassName("sidebar-toggle")[0].style.left="200px";
        }
    });
});
         </script>    
</body>
</html>
