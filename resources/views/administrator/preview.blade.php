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
    <link href="https://fonts.gstatic.com/s/sourcesanspro/v11/toadOcfmlt9b38dHJxOBGEo0As1BFRXtCDhS66znb_k.woff2" rel="stylesheet">
    <link rel="stylesheet" href="https://fast.fonts.net/dv2/14/aad99a1f-7917-4dd6-bbb5-b07cedbff64f.woff2?d44f19a684109620e484167aa490e818127967a40bc2a6fac3cbfea16366c1393256e6a15be66022bd821b1eda7393f8e9df4393864db74885e8b0829bf26e9d6438d26a78ffa8c8630c7bee60ac8d2e0568b628d79fdac296a0b9874646cee94bcc34f1bc25612dab41b048fb76e05399473a60cf2d59d47dde1607d92967378b209725af01b53de0ac8e78bdfe8b6aabde76e6e052e95a06ebbfc83ce0ba708b202b91c5f9df590ce68d29e7e6c6ba988b3070cad9f20a19361c284bdbf9f930d214bb6c8c808f3722183a7155484c2895126663fa93c45be33d0c78ccf06fc7be5efd6ad0a72205&projectId=6915cd0f-6232-45f4-ba0e-01f23e4e8215">
    <link href='https://fonts.gstatic.com/s/sourcesanspro/v11/ODelI1aHBYDBqgeIAH2zlNV_2ngZ8dMf8fLgjYEouxg.woff2' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="/css/sweetalert.min.css">
    <script src="/js/sweetalert.min.js"></script>
<script type="text/javascript">
  if(history.forward(1)){
    location.replace( history.forward(1) );
  }
</script>

    <style type="text/css">
        .col-md-10{
        
        }
        .title{
            font-size: 20px;
            font-family: "Source Sans Pro",sans-serif;
            line-height: 30px;
            color: #3D3D3D;
            font-weight: bold;
        }
        .descripcion{
            color: #3D3D3D;
            font-family: "Source Sans Pro",sans-serif;
            font-size: 19px;
            line-height: 145%;
            border-color: transparent;
            margin-left: 25%;
            width: 50%;
        }
        #btnStart::hover, #btnStart::focus{
            text-decoration-color: #000;
            color: #000;
        }
        .bl_form {
          margin: 100px 0 150px;
        }

        .bl_form input {
          padding-top: 15px;
          background-color: #fff ;
          box-shadow: 0 2px 8px rgba(0,0,0,0.2);
          border: none;
          color: black;
          padding: 10px 15px;
          border-radius: 25px;
          font-size: 16px;
          outline: none;
        }


        .lb_wrap .lb_label.top, .lb_wrap .lb_label.bottom {
          left: 15px !important;
        }

        .lb_wrap .lb_label.left {
          left: 0;
        }

        .lb_label {
          font-weight: bold;
          color: #000;

        }

        .lb_label.active {
          color: white;
        }

        #sumary{

        }
        
        .ancho{            
            background-size: 100% 100%;
            -webkit-background-size: 100% 100%;           /* Safari 3.0 */
            -moz-background-size: 100% 100%;           /* Gecko 1.9.2 (Firefox 3.6) */
            -o-background-size: 100% 100%;           /* Opera 9.5 */
            background-size: 100% 100%;             
        }
        @media screen and (max-width: 699px) and (min-width: 520px) {
            ul li a {
                padding-left: ;
                background: url(email-icon.png) left center no-repeat;
            }
        }
        html,body { 
            overflow:hidden; 
            }
</style>

</head>

<body>
<div class="row">

        <div id="sumary" class="col-md-12 ">
            <div class="col-md-12" height="" style="background-color: #333333;">
                    <div class="col-md-5">
                            <img src="\img/UVM_Logo.jpg" class="img-responsive" width="100%" height="100%;">
                    </div>
            </div>
 <center>
            <img src="\img/iconos/{{$imagePath}}"  width="200px" height="700px" class="img-responsive" style="margin-top:5%" onerror="this.src='/img/iconos/default.png'">
            <br>
            <h2 class="text-center text-black-body title">{{$titulo}}</h2>
            <p>{{$descripcion}}</p>
            <input type="button" id="btnStart" value="Comenzar con la encuesta" class="btn btn-lg text-black-body" style="margin-bottom:0%;background-color: #ffeb3b">
</center>
    </div>



</div>

<div class="container hidden" id="surveyContainer" style="background-image:\img/default_questions.jpg;">
        <div class="col-md-12" >
                <img src="\img/default_questions.png" width="100%" height="80px">
                    <div class="col-md-5">
                            <img src="\img/UVM_Logo.jpg" class="img-responsive" width="100%" height="100%;">
                    </div>
         </div>    
        <div class="col-md-12">
            <h2 class="text-center text-black-body" style="margin-top: 5%;margin-bottom:15px;" id="idTitlePregunta">Recomendaciones: </h2>
        </div>
        <div class="col-md-10">
            <div class="col-md-10 pregs" style="margin-top: 10%;margin-bottom:15px;" id="preg0">
                <div class="form-group text-black-body">
                    <ul>
                        <li>Lee con atención las siguiente preguntas</li>                        
                        <li>Si no respondiste de forma correcta, recuerda que puedes retroceder una pregunta antes de guardar la cuesta </li>   
                        <li><strong>Para empezar da clic en Siguiente.</strong></li>
                    </ul>
                </div>
            </div>

        
<!-- onsubmit="get_action();"-->
    <form method="POST"  id="control"  action="">
        <?php 
            $i=1;
            
            $preguntas = unserialize($options);
            foreach ($preguntas as $cada){
            $dato=$cada["questions"];
        ?>
            <div class= "pregs" id="preg<?php echo $i ?>" style="display:none">
                <input type="hidden" name="back" id="back<?php echo $i?>" value="<?php echo ($i-1)?>">
                <input type="hidden" name="back" id="num<?php echo $i?>" value="<?php echo $i ?>">
                <input type="hidden" name="type" id="type<?php echo $i?>" value="<?php echo $dato->type?>"> 
        <?php
            if($dato->type==1){
        ?>
            <div class="bl_form" class="col-md-10 pregs" style="margin-top: 7%;margin-bottom:15px;" >
                <div class="lb_wrap" style="position:relative; display: inline;"></div>
                    <label >{{$dato->title}}
                        <input type="input" style="height: 100%;width: 100%;" size="300" data-name="opt<?php echo $i?>"  name="<?php echo $dato->id ?>" id="opt<?php echo $i?>" class="form-control" >
                    </label>
            </div>
        <?php
            }
            else{
        ?>
                <div class="form-group" style="margin-left: 21%;height: 38px;width: 600px;position:relative; display: inline;">
                <label> {{$dato->title}}</label>
                </div>
        <?php 
                $opciones=$cada["options"]; 
                foreach ($opciones as $option) {
        ?>
                <div class="form-group"  style="margin-left: 21%;">
                    <input type="radio"  name="<?php echo $dato->id ?>" data-name="opcion<?php echo $i?>" id="opcion<?php echo $i?>" data-clave="opc<?php echo $i?>" data-salto="<?php echo $option->id ?>" value="<?php echo $option->name ?>">
                    <label for="Choice1" class="text-black-body"><?php echo $option->name?></label><input id="<?php echo $i?>salto<?php echo $option->id?>" type="hidden" name="salto" value="<?php echo $option->salto?>">           
                    <input type="hidden" class="form-control" >
            
                </div> 
                               
        <?php
        }


        }
        ?>
        </div>
        <?php
                 $i++;   
        }
 
        ?>
        <div class="col-md-10" id="preg<?php echo $i?>" style="display:none">
            <div class="form-group">                
            </div>
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

        <div class="col-md-5 pull-right" >

            <input type='button' onclick="get_action()" class='btn btn-primary' id='idenviar' value='Enviar Encuesta' style='display:none'>
            <button type="button" class="btn btn-md btn-default" id="idBack" disabled>Regresar</button>
            
            <button type="button" class="btn btn-md btn-danger"  id="idNext">Siguiente</button> 
        </div>
        </form>
        </div>
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
        document.getElementById("control").action = "/guardar";
        document.getElementById("control").submit();

}
}

</script>

