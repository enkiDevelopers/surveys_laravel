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


</head>
<body>

    
        <div class="col-md-10 col-sm-12  light-grey">
            <h2 class="text-center">Encuesta</h2>
        </div>
   		<div class="col-md-10" style="margin-top:10px;">
   			<center>
            	<img src="\img/iconos/<?php echo $imagePath;?>" width="10%" height="10%">
        	</center>
        </div>

        <div class="col-md-10 col-sm-12  " style="width:100%;">
            <label for="exampleInputEmail1" >Título de la encuesta</label>
        </div>
        <div class="col-md-10" style="margin-top: 5px;margin-bottom:15px;">
            <input type="text" class="form-control text-black" disabled id="" aria-describedby="emailHelp" placeholder="Titulo de la Encuesta" value="<? echo $titulo?>">
        </div>
        <div class="col-md-10 col-sm-12 " style="width:100%;">
            <label for="exampleInputEmail1" >Descripión de la encuesta</label>
        </div>
        <div class="col-md-10" style="margin-top: 5px;">
            <textarea rows="2" cols="50" class="form-control text-black" disabled id="inputDesc" aria-describedby="desc" placeholder="Descripción"> 
            	<? echo $descripcion?>"
            </textarea>
        </div>

        <div class="col-md-10 col-sm-12  light-grey">
            <h2 class="text-center">Pregunta</h2>
        </div>
		<div class="col-md-10" style="margin-top: 5px;margin-bottom:15px;">
	        <div class="col-md-10 pregs" style="margin-top: 5px;margin-bottom:15px; " id="preg0">
                <div class="form-group">
                    <label> Para empezar da clic en Siguiente</label>
                </div>
    	    </div>
    	    <br>
    	    <br>
        
		<?php 
			$i=1;
			foreach ($datos as $datos) { ?>
	        <div  class= "pregs" id="preg<?php echo $i?>" style="display:none">
                <div class="form-group">
                    <label for="exampleInputEmail1">Número: <?php echo $datos->order;?></label>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1"><?php echo $datos->title;?></label>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control text-black-body" id="" placeholder="Escribe tu respuesta" value="">
                </div>
    	    </div>
       	<? $i++;
			}?>
        <div class="col-md-10" style="margin-top: 5px;margin-bottom:15px;">
        	<button type="button" class="btn btn-default" id="idBack" disabled>Back</button>
        	<button type="button" class="btn btn-danger" id="idNext">Next</button>	
        </div>
    	</div>
<script src="{{asset('js/app.js')}}"></script>
<script>
$(document).ready(function(){
	var n=0;
    $("#idBack").click(function(){
    	if(n==0){
    		$("#idBack").attr('disabled','disabled');	
    	}
    	$("#idNext").removeAttr('disabled');
    	$("#preg"+n).css("display", "none");
		n--;
		$("#preg"+n).css("display", "inline");
    });

    $("#idNext").click(function(){    	    	
    	$("#idBack").removeAttr('disabled');
    	$("#preg"+n).css("display", "none");
    	n++;
		$("#preg"+n).css("display", "inline");
    	if(n>=$(".pregs").length){
    		$("#idNext").attr('disabled','disabled');		
    	}

    });
	
});	


</script>

</body>
</html>

