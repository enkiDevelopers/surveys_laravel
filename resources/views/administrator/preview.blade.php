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
    <link rel="stylesheet" href="/css/vivify.min.css" >
    <link href="https://fonts.gstatic.com/s/sourcesanspro/v11/toadOcfmlt9b38dHJxOBGEo0As1BFRXtCDhS66znb_k.woff2" rel="stylesheet">
    <link rel="stylesheet" href="https://fast.fonts.net/dv2/14/aad99a1f-7917-4dd6-bbb5-b07cedbff64f.woff2?d44f19a684109620e484167aa490e818127967a40bc2a6fac3cbfea16366c1393256e6a15be66022bd821b1eda7393f8e9df4393864db74885e8b0829bf26e9d6438d26a78ffa8c8630c7bee60ac8d2e0568b628d79fdac296a0b9874646cee94bcc34f1bc25612dab41b048fb76e05399473a60cf2d59d47dde1607d92967378b209725af01b53de0ac8e78bdfe8b6aabde76e6e052e95a06ebbfc83ce0ba708b202b91c5f9df590ce68d29e7e6c6ba988b3070cad9f20a19361c284bdbf9f930d214bb6c8c808f3722183a7155484c2895126663fa93c45be33d0c78ccf06fc7be5efd6ad0a72205&projectId=6915cd0f-6232-45f4-ba0e-01f23e4e8215">
    <link href='https://fonts.gstatic.com/s/sourcesanspro/v11/ODelI1aHBYDBqgeIAH2zlNV_2ngZ8dMf8fLgjYEouxg.woff2' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="/css/sweetalert.min.css">
    <script src="/js/sweetalert.min.js"></script>


    <style type="text/css">
        .col-md-10{
            margin-top: 5px;
            margin-bottom:15px;
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
        

    </style>
</head>
<body>
        <div id="sumary" style="background-image: url(/img/default.png);" class="popIn duration-2250">
            <center >
                <img src="\img/iconos/{{$imagePath}}" width="15%" height="15%" style="margin-top:13%">
            </center><br>
            <h2 class="text-center text-black-body title">{{$titulo}}</h2>
            <textarea type="text" class="form-control text-center descripcion" disabled style="background-color: transparent;cursor: default;">{{$descripcion}}</textarea>
            <input type="button" id="btnStart" value="Comenzar con la encuesta" class="btn btn-lg text-black-body" style="margin: 3% 42% 0px 42%;background-color: #ffeb3b">
        </div>

<div class="container hidden" id="surveyContainer" style="background-image: url(/img/default_questions.png);">
        
        <div class="col-md-12" style="margin-top: 10%">
            <h2 class="text-center text-black-body" id="idTitlePregunta">Recomendaciones: </h2>
        </div>
		<div class="col-md-10">
	        <div class="col-md-10 pregs" style="margin-top: 7%;margin-bottom:15px;" id="preg0">
                <div class="form-group text-black-body">
                    <label > ° Lee con atención las siguiente preguntas.</label>
                    <label>° Recuerda que puedes retroceder una pregunta, antes de guardar la cuesta, si no respondiste de forma correcta.</label>
                    <label><strong>° Para empezar da clic en Siguiente.</strong></label>
                </div>
  	        </div>
        
		<?php 
			$i=1;
            $preguntas = unserialize($options);
            foreach ($preguntas as $cada) {
                $dato=$cada["questions"];

            ?>
	        <div  class= "pregs" id="preg<?php echo $i?>" style="display:none">

                <input type="hidden" name="back" id="back<?php echo $i?>" value="<?php echo ($i-1)?>">
                <input type="hidden" name="type" id="type<?php echo $i?>" value="<?php echo $dato->type?>">                
                <?php                   
                    if($dato->type==1){
                ?>
                <div class="bl_form" style="margin-left: 21%;">
                    <div class="lb_wrap" style="position:relative; display: inline;"></div>
                    <input type="text" style="height: 38px;" class="label_better form-control text-black-body" placeholder="{{$dato->title}}">
                </div>

                <?php                   
                    }else{
                        $opciones=$cada["options"];
                ?>                        
                <div class="form-group text-black-body">
                    <label >Selecciona tu respuesta:</label>
                </div>

                <?php                                   
                        //echo unserialize($options);
                        foreach ($opciones as $option) {

                ?>
                <div class="form-group">
                    <input  type="radio" name="opcion<?php echo $i?>" value="<?php echo $option->id?>">
                    <label for="Choice1" class="text-black-body"><?php echo $option->name?></label>                    

                </div>
                <?php                   
                    }}
                ?>
                
    	    </div>
       	<?php $i++;
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


        <div class="col-md-3 pull-right" >
        	<button type="button" class="btn btn-md btn-default" id="idBack" disabled>Regresar</button>
        	<button type="button" class="btn btn-md btn-danger" id="idNext">Siguiente</button>	
            <button type="button" class="btn btn-md btn-success" id="idSave" style="display:none">Save</button>  
        </div>
    	</div>
</div>        
        <?php 
        /*
            $opciones = unserialize($options);
            foreach ($opciones as $cada) {
                echo $cada["questions"];
                echo "**********************************************";
                echo $cada["options"];
            }
          */  
        ?>

<script src="{{asset('js/app.js')}}"></script>
<script src="/js/label_better.min.js"></script>
<script src="/js/administratorPreviewTem.js"></script>

</body>
</html>

