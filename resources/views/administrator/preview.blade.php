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

<body class="todo">

            <div id="figTop">
                <img src="\img/iconos/{{$imagePath}}" class=" imagen" onerror="this.src='/img/Por_Ti_EXPERIENCIA_UVM.png'">
            </div>


        <div id="sumary" class="todo">
            
            <div align="justify" class="col-md-6 col-md-offset-3 titulo" style="word-wrap: break-word;">
                <h2 class="text-center text-black-body title">{{$titulo}}</h2>
            </div>
            <div align="justify" class="cuerpo" style="word-wrap: break-word;">
                <br>
                <strong>Descripción de la encuesta: 
                </strong>
                <br>
                <label id="descTemplate3" style="word-wrap: break-word;font-weight:normal"> {{$descripcion}}
                </label>   
            </div>
            <div align="justify" class="botonContinuar">
                
                    <input type="button" id="btnStart" value="Comenzar con la encuesta" class="btn btn-lg text-black-body btnsta posCenterBoton" >
                
            </div>
        </div>

    <div id="surveyContainer"  class="todo">

        <div align="center" class="col-md-6 col-md-offset-3 titulo" id="idTitlePregunta">
            <h2 class="text-center text-black-body title">Instrucciones Generales: </h2>
        </div>


            <div class="cuerpo" style="word-wrap: break-word;">
                <div align="justify" class="form-group text-black-body ">
                    <ul>
                        <li><strong>Lee con atención las preguntas </strong></li>
                        <li>Responde sinceramente</li>
                        <li>Tómate tu tiempo para responder</li>
                        <li>No permitas que nadie influencie tus respuestas</li>
                        <li>Estamos abiertos a recibir ideas, opiniones y sugerencias</li>
                    </ul>
                </div>
            </div>

            <div align="justify" class="botonContinuar">
                <input type="button" class="btn btn-lg text-black-body btnsiguiente posCenterBoton"  id="idEntendido" value="Entendido">
            </div>
    </div>


     <form class="preguntas" method="POST"  id="control"  action="" onKeypress="">
        <?php 
            $i=1;
            
            $preguntas = unserialize($options);
            foreach ($preguntas as $cada){
            $dato=$cada["questions"];
        ?>
            <div class="pregs" id="preg<?php echo $i ?>" style="display:none">
                    <div align="center" class="titlePreguntas">
                        <h2 class="text-center text-black-body title" >{{$dato->title}} </h2>
                    </div>
    
                <input type="hidden" name="back"  id="back<?php echo $i?>" value="<?php echo ($i-1)?>">
                <input type="hidden" name="back"  id="num<?php echo $i?>" value="<?php echo $i ?>">
                <input type="hidden" name="type"  id="type<?php echo $i?>" value="<?php echo $dato->type?>"> 
                <input type="hidden" name="salto" id="saltoa<?php echo $i?>" value="<?php echo $dato->salto?>"> 
        <?php
            if($dato->type==1){
        ?>
                <div class="zonarespuestas" >
                    <input class="pregAbierta pregs2" type="input"  size="300" data-name="opt<?php echo $i?>"  name="<?php echo $dato->id ?>" id="opt<?php echo $i?>" placeholder="Escribe tu respuesta">   
                </div>
        
        <?php
            }
            if($dato->type==2){
        ?>
                <div class= "zonarespuestas" style="padding-top: 5px;">
        <?php 
                $opciones=$cada["options"]; 
                foreach ($opciones as $option) {
        ?>
                <div class="col-sm-12 col-lg-12 col-xs-12">
                    <input type="radio"  name="<?php echo $dato->id ?>" data-name="opcion<?php echo $i?>" id="opcion<?php echo $i?>" data-clave="opc<?php echo $i?>" data-salto="<?php echo $option->id ?>" value="<?php echo $option->name ?>">
                    <label for="Choice1" class="text-black-body"><?php echo $option->name?></label><input id="<?php echo $i?>salto<?php echo $option->id?>" type="hidden" name="salto" value="<?php echo $option->salto?>">           
                    <input type="hidden" class="form-control" >
                </div>
                               
                <?php
                }
                ?>
                </div>
            <?php
            }
            if($dato->type==3){
            ?>
                <div class= "zonarespuestas" style="padding-top: 5px;">
            <?php
                $opciones=$cada["options"]; 
                foreach ($opciones as $option) {
            ?>
                <div class="col-sm-6 col-lg-6 col-xs-6">
                    <input type="checkbox"  name="<?php echo "datos".$dato->id."[]" ?>" data-name="opcion<?php echo $i?>" id="opcion<?php echo $i?>" data-clave="opc<?php echo $i?>" data-salto="<?php echo $option->id ?>" value="<?php echo $option->name ?>">
                    <label for="Choice1" class="text-black-body"><?php echo $option->name?></label><input id="<?php echo $i?>salto<?php echo $option->id?>" type="hidden" name="salto" value="<?php echo $dato->salto?>">           
                    <input type="hidden" class="form-control" >
                </div>
            <?php
                }
            ?>
            </div>
            <?php
            }

            ?>

            </div>

        <?php
            $i++;   
        } 
 
        ?>
        <div class="zonarespuestas" id="zona" style="display:none">        
            <input type="hidden" name="idencuestado" value="<?php echo $eid ?>">
            <div class="todo" id="gracias" style="display:none;">
                <p align="center"><strong>Para terminar el proceso ¡Da clic en el boton Enviar!</strong></p>
                <input type="hidden" name="back" id="back<?php echo $i?>" value="<?php echo ($i-1)?>">
            </div>
        </div>
        <?php
                echo "<input type='hidden' id='idencuestado' name='idencuesta' value='".$idencuesta1."'>";
            
        ?>  
        <input type="hidden" name="_token" value="{{ csrf_token() }}">

        </form>
            <!-- <button type="button" class="btn btn-md btn-default" id="idBack" disabled>Regresar</button>-->
            
            <div align="justify" class="botonContinuar">
                <input type="button" class="btn btn-lg text-black-body btnsiguiente posCenterBoton"  id="idNext" value="Siguiente">
            
                <input type='button'  class='btn btn-lg text-black-body btnsiguiente posCenterBoton' id='idenviar' value='Finalizar' style='display:none;'>
            </div>



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
        document.getElementById("idenviar").value="Procesando...";
        document.getElementById("idenviar").disabled=true;
        document.getElementById("control").action = "/guardar";
        document.getElementById("control").submit();
}
}
</script>
