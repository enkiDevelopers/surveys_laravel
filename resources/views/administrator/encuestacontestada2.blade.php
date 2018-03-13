<!DOCTYPE html>
<html>
<head>
 <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="refresh" content="5;URL=http://www.uvmmejoraporti.mx/surveyeds/login/sistema"> 
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Styles -->
    <link rel="stylesheet" href="/css/sweetalert.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="/js/sweetalert.min.js"></script>
    <style type="text/css">
            html,body { 
            overflow:hidden; 
            }
            .col-center{
                float: none;
                margin: 0 auto;
            }
    </style>
</head>
<body>
  <div class="row">
    <div class="col-md-12" >
        <div class="col-md-5 col-center col-centered text-center">
            <img src="\img/logos/UVM_Logo.png" class="img-responsive " width="70%">
        </div>
    </div> 

        <div class="col-md-6 col-center">
          <center>
              <p><h2>¡Muchas gracias por hacerte escuchar!
                </h2></p>
                <img src="\img/logos/Por_Ti_EXPERIENCIA_UVM.png" height="180px" class="img-resposive"><br><br>
              </center>
        </div>
    </div>
</body>
</html>

<script>
  function cerrar() {
    var miventana = window.self;
    miventana.close();
  }
</script>
