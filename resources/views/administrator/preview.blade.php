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
    <style type="text/css">
        .col-md-10{
            margin-top: 5px;
            margin-bottom:15px;
        }
    </style>

</head>
<body>

    
        <div class="col-md-10 col-sm-12  light-grey">
            <h2 class="text-center"><? echo $titulo?></h2>
        </div>
   		<div class="col-md-10">
   			<center>
            	<img src="\img/iconos/<?php echo $imagePath;?>" width="10%" height="10%">
        	</center>
        </div>

        <div class="col-md-10 col-sm-12 " style="width:100%;">
            <label for="exampleInputEmail1" >Instrucciones:</label>
        </div>
        <div class="col-md-10" style="">
            <textarea rows="2" cols="50" class="form-control text-black" disabled id="inputDesc" aria-describedby="desc" placeholder="Descripción"> 
            	<? echo $descripcion?>"
            </textarea>
        </div>

        <div class="col-md-10 col-sm-12  light-grey">
            <h2 class="text-center" id="idTitlePregunta">Pregunta </h2>
        </div>
		<div class="col-md-10">
	        <div class="col-md-10 pregs" style="margin-top: 5px;margin-bottom:15px; " id="preg0">
                <div class="form-group">
                    <label> Para empezar da clic en Siguiente</label>
                </div>
    	    </div>
        
		<?php 
			$i=1;
			foreach ($datos as $dato) { ?>
	        <div  class= "pregs" id="preg<?php echo $i?>" style="display:none">
                <div class="form-group">
                    <label><?php echo $dato->title;?></label>
                </div>
                <?php                   
                    if($dato->type==1){
                ?>
                <div class="form-group">
                    <input type="text" class="form-control text-black-body" id="" placeholder="Escribe tu respuesta" value="">
                </div>
                <?php                   
                    }else{
                ?>
                <div class="form-group">
                    <input type="radio" id="opcion" name="opcion" value="">
                    <label for="Choice1">Valor de la opción</label>
                </div>
                <?php                   
                    }
                ?>
                
    	    </div>
       	<? $i++;
			}?>
            <div class="col-md-10" id="preg<?php echo $i?>" style="display:none">
                <div class="form-group">
                    <label> Has completado la encuesta, da clic en save para enviar la encuesta. </label>
                </div>
            </div>
            <?php 
                $i++;
            ?>
            
            <div class="col-md-10" id="preg<?php echo $i?>" style="display:none">
                <div class="form-group">
                    <label> Gracias has completado la encuesta. </label>
                </div>
            </div>


        <div class="col-md-10">
        	<button type="button" class="btn btn-default" id="idBack" disabled>Back</button>
        	<button type="button" class="btn btn-danger" id="idNext">Next</button>	
            <button type="button" class="btn btn-success" id="idSave" style="display:none">Save</button>  
        </div>
    	</div>
        
        <?php echo $options?>

<script src="{{asset('js/app.js')}}"></script>
<script>
$(document).ready(function(){
	var b=0;n=0;
    /********Funcionalidades del botón Atrás******************/
    $("#idBack").click(function(){
    	if(n==0){
    		$("#idBack").attr('disabled','disabled');	
    	}
        $("#idSave").css("display","none");
    	$("#idNext").removeAttr('disabled');
    	$("#preg"+n).css("display", "none");
		n--;
		$("#preg"+n).css("display", "inline");
        $("#idTitlePregunta").text("Pregunta " + n);
    });

    /********Funcionalidades del botón Siguiente******************/
    $("#idNext").click(function(){    	    	
    	$("#idBack").removeAttr('disabled');
    	$("#preg"+n).css("display", "none");
        b=n;
        //Si la pregunta es pregunta abierta la siguiente avanza uno
        //si la pregunta es de opción múltiple, se tiene que saber si hay brinco o no
    	n++;
		$("#preg"+n).css("display", "inline");
        $("#idTitlePregunta").text("Pregunta " + n);
    	if(n>=$(".pregs").length){
    		$("#idNext").attr('disabled','disabled');		
            $("#idSave").css("display","inline");
    	}
    });

    /********Funcionalidades del botón Guardar******************/
    $("#idSave").click(function(){              
        $("#idBack").css("display", "none");
        $("#idNext").css("display", "none");
        $("#idSave").css("display", "none");
        $("#preg"+n).css("display", "none");
        n++;
        $("#preg"+n).css("display", "inline");
    });

	
});	


</script>

</body>
</html>

