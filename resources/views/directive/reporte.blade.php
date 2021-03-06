<!DOCTYPE html>
<html>
<head>
 <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}"> 
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
      <img src="\img/default_questions.png" width="100%" height="30px">
        <div class="col-md-5 col-center col-centered text-center">
            <img src="\img/logos/UVM_Logo.png" class="img-responsive " width="70%">
        </div>
    </div> 

    		<div class="col-md-6 col-center">
    			<center>
            	<p><h2>El reporte de esta encuesta, aun no esta Generado</h2></p>
            	<p><strong>Por favor contacte con su administrador.</strong></p>
                <img src="/img/logos/Por_Ti_EXPERIENCIA_UVM.png" height="180px" class="img-resposive"><br><br>
            	<a class="btn btn-info btn-lg" style="width: 40%" href="javascript:window.close();">Salir</a>
            	</center>
    		</div>
    </div>
</body>
</html>
