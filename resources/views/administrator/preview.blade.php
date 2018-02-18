<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}"> 
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}"> 
    <title>{{ config('app.name', 'Laravel') }}</title>
    <meta http-equiv="Expires" content="0"/>
    <meta http-equiv="pragma" content="no-cache"/>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="/css/sidebar.css">
    <link rel="stylesheet" href="/css/alertify.min.css">
    <link rel="stylesheet" href="/css/vivify.min.css" >
    <link rel="stylesheet" href="/css/preview.css">
    <link rel="stylesheet" href="/css/sweetalert.min.css">
    <script src="/js/sweetalert.min.js"></script>
<script type="text/javascript">
  if(history.forward(1)){
    location.replace( history.forward(1) );
  }
</script>



</head>

<body>

        <div id="sumary" class="col-md-12 fondo" >
            <center><img src="\img/iconos/{{$imagePath}}" class="img-responsive imagen" style="margin-top:2%" onerror="this.src='/img/Por_Ti_EXPERIENCIA_UVM.png'"></center>
            <br>
            <div align="justify" class="col-md-6 col-md-offset-3 fondogris"><h2 class="text-center text-black-body title">{{$titulo}}</h2></div>
            <div align="justify" class="col-md-6 col-md-offset-3 anchodiv"><strong>Descripción de la encuesta: </strong> {{$descripcion}}   </div>
            <div align="justify" class="col-md-6 col-md-offset-3"><center> <input type="button" id="btnStart" value="Comenzar con la encuesta" class="btn btn-lg text-black-body btnstar" ></center></div>

              
        </div>

<div id="surveyContainer"  class="col-md-12 fondo">

        <center><img src="\img/iconos/{{$imagePath}}" class="img-responsive imagen" style="margin-top:2%" onerror="this.src='/img/Por_Ti_EXPERIENCIA_UVM.png'"></center>
        <div align="justify" class="col-md-6 col-md-offset-3 fondogris">
            <h2 class="text-center text-black-body" id="idTitlePregunta">Instrucciones Generales: </h2>
        </div>

        <div class="col-md-6 col-md-offset-3 margenarriba total">
            <div class="col-md-10 pregs scroll" id="preg0">
                <div align="justify" class="form-group text-black-body "  >
                    <ul>
                        <li><strong>Lee con atención las preguntas </strong></li>
                        <li>Responde sinceramente</li>
                        <li>Tómate tu tiempo para responder</li>
                        <li>No permitas que nadie influencie tus respuestas</li>
                        <li>Estamos abiertos a recibir ideas, opiniones y sugerencias</li>
                    </ul>
                </div>
            </div>

     <form method="POST"  id="control"  action="" onKeypress="">
        <?php 
            $i=1;
            
            $preguntas = unserialize($options);
            foreach ($preguntas as $cada){
            $dato=$cada["questions"];
        ?>
        <div class="divmovil">
            <div class= "col-md-12 pregs pregunta" id="preg<?php echo $i ?>" style="display:none">
                    <div align="justify" class="fondogris">
                        <h2 class="text-center text-black-body" >{{$dato->title}} </h2>
                    </div>

                <input type="hidden" name="back" id="back<?php echo $i?>" value="<?php echo ($i-1)?>">
                <input type="hidden" name="back" id="num<?php echo $i?>" value="<?php echo $i ?>">
                <input type="hidden" name="type" id="type<?php echo $i?>" value="<?php echo $dato->type?>"> 
        <?php
            if($dato->type==1){
        ?>
            <div class="bl_form" class="col-md-10 pregs" style="margin-top: 7%;margin-bottom:15px;" >
                <div class="lb_wrap" style="position:relative; display: inline;"></div>
                    <input type="input" style="height: 100%;width: 100%;" size="300" data-name="opt<?php echo $i?>"  name="<?php echo $dato->id ?>" id="opt<?php echo $i?>" class="form-control" >   
            </div>
        <?php
            }
            else{
        ?>
 
        <?php 
                $opciones=$cada["options"]; 
                foreach ($opciones as $option) {
        ?>
                <div class="form-group">
                    <input type="radio"  name="<?php echo $dato->id ?>" data-name="opcion<?php echo $i?>" id="opcion<?php echo $i?>" data-clave="opc<?php echo $i?>" data-salto="<?php echo $option->id ?>" value="<?php echo $option->name ?>">
                    <label for="Choice1" class="text-black-body"><?php echo $option->name?></label><input id="<?php echo $i?>salto<?php echo $option->id?>" type="hidden" name="salto" value="<?php echo $option->salto?>">           
                    <input type="hidden" class="form-control" >
            
                </div> 
                               
        <?php
        }


        }
        ?>
        </div>
</div>

        <?php
                 $i++;   
        }
 
        ?>
        <div class="col-md-10" id="preg<?php echo $i?>" style="display:none">

        </div>
        <?php 
        ?>
        <input type="hidden" name="idencuestado" value="<?php echo $eid ?>">
        <div class="col-md-10" id="gracias" style="margin-top: 7%;margin-bottom:15px;display:none;">
        <p><strong>Para terminar el proceso ¡Da clic en el boton Enviar!</strong></p>
        <input type="hidden" name="back" id="back<?php echo $i?>" value="<?php echo ($i-1)?>">

    </div>
        <?php
                echo "<input type='hidden' id='idencuestado' name='idencuesta' value='".$idencuesta1."'>";
            
        ?>  
        <input type="hidden" name="_token" value="{{ csrf_token() }}">

        <div class="col-md-12" >
        <center>
            <input type='button' onclick="get_action()" class='btn btn-lg text-black-body btnsiguiente' id='idenviar' value='Enviar Encuesta' style='display:none;color:white;'>
           <!-- <button type="button" class="btn btn-md btn-default" id="idBack" disabled>Regresar</button>-->
            <input type="button" class="btn btn-lg text-black-body btnsiguiente"  id="idNext" value="Entendido!" style="color:white;">
        </center>   

        </div>
        </form>
        </div>
    
</div>
<!-- onsubmit="get_action();"-->
  





<script src="{{asset('js/app.js')}}"></script>
<script src="/js/label_better.min.js"></script>
<script src="/js/administratorPreviewTem.js"></script>

</body>
</html>
<script type="text/javascript">
function pop(){
             swal({
              title: "Información",
              text: "Encuesta demostrativa ninguna Información será guardada",
              type: "warning",
              showCancelButton: true,
              confirmButtonClass: "btn-danger",
              confirmButtonText: "Continuar",
              cancelButtonText: "Cancelar",
              closeOnConfirm: false,
              closeOnCancel: true
            },
            function(isConfirm) {
            if (isConfirm) {
                location.href ="/contestado";

            } else {
            
            }
            });
}
function get_action(){

    var id=document.getElementById("idencuestado").value;
    console.log(id);
    if(id==''){
        pop();

    }else{
        document.getElementById("control").action = "/guardar";
        document.getElementById("control").submit();

}
}

</script>

