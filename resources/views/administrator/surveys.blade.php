@extends('layouts.admin')
@section('content')
<div class="container" >
    <div class="row">
      <div class="col-md-12 ">

            <div class="panel panel-default ">
                <div class="panel-heading fijado">
                    <div class="row">
                        <div class="col-md-4">
                            Plantillas
                        </div>

                        <div class="col-md-9 pull-right">
                            <div class="row">
                                <div class="col-md-1">&nbsp</div>
                                <div class="col-md-2 pull-right">
                                    Ver&nbsp&nbsp<span class="glyphicon glyphicon-eye-open"></span>
                                </div>
                                <div class="col-md-2 pull-right">
                                    Editar&nbsp&nbsp<span class="glyphicon glyphicon-pencil" ></span>
                                </div>
                                <div class="col-md-2 pull-right">
                                    Publicar&nbsp&nbsp<span class="glyphicon glyphicon-send"></span>
                                </div>
                                <div class="col-md-2 pull-right">
                                    Duplicar&nbsp&nbsp<span class="glyphicon glyphicon-copy"></span>
                                </div>
                                <div class="col-md-2 pull-right">
                                    Eliminar&nbsp&nbsp<span class="glyphicon glyphicon-trash"></span>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
<!-- Aqui debe de ir Agregar plantilla -->

 <!-- Aqui debe de ir Agregar plantilla -->
                <div class="panel-body scroll">
                    <div class="row">
                      <div class="col-sm-0">
                      </div>
                             <div class="col-md-4">
                            <div class="card well card-new-survey" >
                                <div class="card-body text-center">
                                    <h3 class="card-title" id="Atitle">Añadir Plantilla de Encuesta</h3>
                                    <p class="card-text"></p><br>
                                        <p>
                                            <a data-toggle="modal" data-target="#ModalTitle" class="btn btn-default btn-lg btn-new-survey">
                                              <span class="glyphicon glyphicon-plus text-center"></span>
                                            </a>
                                        </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-0">

                        </div>

                         <?php foreach ($plantillas as $plantilla) { ?>
                        <div class="col-md-4">
                            <div class="card well" >
                                     <div class="card-body">
                                        <div class="col-md-2" id="resposiveCard">

                                       <img id="marco" class="card-img-top"
                                       width="100px" height="100px"
                                       alt="Card image cap" src="/img/iconos/<?php echo $plantilla->imagePath;?>"
                                       onerror="this.src='/img/iconos/default.png'">

                                       </div>
                                       <div class="col-md-3">

                                       </div>
                                        <div class="col-md-2">
                                    <div class="titleA">
                                    <h4 class="card-title"  >  <?php echo $plantilla->tituloEncuesta;  ?></h4>
                                    </div>
                                    <div class="">
                                    <p class="card-text responsiveText">Creada por <span class="template-creator">Administrador1</span></p></div>
                                  </div>

                                    <div class="btn-group centrarbtn" role="group" aria-label="...">
                                        <button type="button" class="btn btn-default"  data-toggle="tooltip" data-placement="top" title="Vista previa">
                                            <span class="glyphicon glyphicon-eye-open" ></span>
                                        </button>
                                          <a href="{{url('administrator/edit')}}/{{$plantilla->id}}"
                                        class="btn btn-default" data-toggle="tooltip" data-placement="top" title="Editar">

                                            <span class="glyphicon glyphicon-pencil"></span>
                                        </a>
                                        <a  href="{{url('administrator/delete')}}/{{$plantilla->id}}"
                                          class="btn btn-default" data-toggle="tooltip" data-placement="top"
                                          title="Eliminar">
                                            <span class="glyphicon glyphicon-trash"></span>
                                        </a>

                                        <button type="button" class="btn btn-default" data-toggle="tooltip" data-placement="top" title="Dublicar">
                                            <span class="glyphicon glyphicon-copy"></span>
                                        </button>


                                        <button type="button" class="btn btn-default" data-toggle="tooltip" data-placement="top" title="Publicar">
                                            <span class="glyphicon glyphicon-send"></span>
                                        </button>

                                    </div>
                                </div>
                            </div>
                        </div>

                <?php } ?>




                    </div>
                </div>
            </div>


            <!-- Modal publicar encuesta-->

            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Publicar encuesta - Titulo de la encuesta</h4>
                </div>
                <div class="modal-body">
                <div class="input-daterange input-group" id="datepicker" data-provide="datepicker">
                    <input type="text" class="input-sm form-control" name="start" placeholder="Inicio"/>
                    <span class="input-group-addon">a</span>
                    <input type="text" class="input-sm form-control" name="end" placeholder="Final"/>
                </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Publicar</button>
                </div>
                </div>
            </div>
            </div>


            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-md-6">

                            Encuestas publicadas
                        </div>
                        <div class="col-md-1">&nbsp</div>
                        <div class="col-md-5 ">
                            <div class="row">
                                <div class="col-md-4">
                                    Ver&nbsp&nbsp<span class="glyphicon glyphicon-eye-open"></span>
                                </div>
                                <div class="col-md-4">
                                    Activa<div class="pull-right survey-status survey-status__active">&nbsp</div>
                                </div>
                                <div class="col-md-4">
                                    Finalizada<div class="pull-right survey-status survey-status__finished">&nbsp</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- <div class=" bg-dark-red simbo">
                        <div class="row">
                            <div class="col-md-4">

                            </div>
                        </div>

                    clos<div class=" survey-status survey-status__finished">&nbsp</div></div> -->

                    </div>

                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="card well" >
                                <img class="card-img-top"  alt="Card image cap">
                                <div class="card-body">
                                    <h4 class="card-title">Titulo de la encuesta</h4>
                                    <p class="card-text"></p>
                                   <div class="btn-group " role="group" aria-label="...">
                                        <a href="{{ url('/surveyed/solve') }}" type="button" class="btn btn-default"  data-toggle="tooltip" data-placement="top" title="Vista previa">
                                            <span class="glyphicon glyphicon-eye-open"></span>
                                        </a>
                                    </div>
                                    <div class="pull-right survey-status survey-status__finished">&nbsp</div>

                                    <!-- <a  class="" href="{{ url('/surveyed/solve') }}">Editar</a> -->

                                </div>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="card well" >
                                <img class="card-img-top"  alt="Card image cap">
                                <div class="card-body">
                                    <h4 class="card-title">Titulo de la encuesta</h4>
                                    <p class="card-text"></p>
                                    <div class="btn-group"   role="group" aria-label="...">
                                        <a href="{{ url('/surveyed/solve') }}" type="button"  class="btn btn-default"  data-toggle="tooltip" data-placement="top" title="Vista previa">
                                            <span class="glyphicon glyphicon-eye-open"></span>
                                        </a>
                                    </div>
                                    <div class="pull-right survey-status survey-status__active">&nbsp</div>
                                    <!-- <a  class="" href="">Editar</a> -->

                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
                 <form method="post" action="/save" enctype="multipart/form-data">
                  {{ csrf_field() }}
        <div class="modal fade" id="ModalTitle" aria-hidden="true" data-keyboard="false" data-backdrop="static" tabindex="-1" style="z-index: 1050;" role ="dialog" aria-labelledby="myModalLabel1">
            <div class="modal-dialog" role="document">

                <div class="modal-content">
                <div class="modal-header">
  <div class="row">
      <div class="col-sm-10">
        <h4 class="modal-title" id="myModalLabel1">Datos principales de la plantilla de encuesta</h4>
      </div>

      <div class="col-sm-2 pull-right pull-right">
        <div class="pull-right">
        <a type="button" class="glyphicon glyphicon-remove" data-dismiss="modal" href="administrator/surveys"></a>
        </div>
      </div>
    </div>

                </div>
                <div class="modal-body">
                    <h5>Título de la encuesta:</h5>
                    <input type="text" maxlength="40" class="form-control text-black " required id="ModalTitleInput" aria-describedby="emailHelp" placeholder="Ingrese el titulo " name="titulo"><br>
                    <h5> Descripción de la encuesta:</h5>
                    <textarea maxlength="500"class="form-control text-black" required cols="10" rows="5" name="descripcion" id="ModalDescInput" aria-describedby="desc" placeholder="Ingrese la Descripción "></textarea>
                    <h5> Icono de la encuesta:</h5>
                    <input type="file" id="foto1" required onchange="return ShowImagePreview( this.files );" name="icono" /> <br />


  <div id="previewcanvascontainer" style="height 200px; width 200px;">
  <canvas id="previewcanvas" >
  </canvas>
  </div>

                </div>
                <div class="modal-footer">
                  <a type="button" class="btn btn-default" data-dismiss="modal" href="administrator/surveys" onclick="limpiar()">Cancelar</a>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>


                </div>
            </div>
        </div>
          </form>
<script>
function limpiar()
{
  var canvas = document.getElementById("previewcanvas");
  canvas.width=canvas.width;
}


    window.onload = function() {
        $("#home").addClass('active');
    }

    function editar(){
        window.location = "{{ url('/administrator/edit') }}";
    }

        function verificar(){
        if ($("#exampleInputEmail1").val() != "") {
            $("#add-question").removeClass('disabled');
            window.location ="{{ url('/administrator/edit') }}";
        }else{

        }
    }


    function publish(){
        if ($("#ModalTitleInput").val() != "" && $("#ModalTitleInput").val() != " ") {
            if ($("#ModalDescInput").val() != "" && $("#ModalDescInput").val() != " ") {
                $("#exampleInputEmail1").val($("#ModalTitleInput").val());
                $("#inputDesc").val($("#ModalDescInput").val());
                $("#ModalTitle").modal('hide');
                verificar();
            }else{
                alert("Ingrese una descripción para la encuesta");
            }
            }else{
       alert("Ingrese un Título para la encuesta");
        }

    }


    function ShowImagePreview( files )
{

    if( !( window.File && window.FileReader && window.FileList && window.Blob ) )
    {
      alert('Por favor Ingrese un archivo de Imagen');
      return false;
    }

    if( typeof FileReader === "undefined" )
    {
        alert( "Filereader undefined!" );
        return false;
    }

    var file = files[0];

    if( !( /image/i ).test( file.type ) )
    {
        alert( "El archivo no es una imagen" );
        return false;
    }

    reader = new FileReader();
    reader.onload = function(event)
            { var img = new Image;
              img.onload = UpdatePreviewCanvas;
              img.src = event.target.result;  }
    reader.readAsDataURL( file );
}

function UpdatePreviewCanvas()
{
    var img = this;
    var canvas = document.getElementById( 'previewcanvas' );

    if( typeof canvas === "undefined"
        || typeof canvas.getContext === "undefined" )
        return;

    var context = canvas.getContext( '2d' );

    var world = new Object();
    world.width = canvas.offsetWidth;
    world.height = canvas.offsetHeight;

    canvas.width = world.width;
    canvas.height = world.height;

    if( typeof img === "undefined" )
        return;

    var WidthDif = img.width - world.width;
    var HeightDif = img.height - world.height;

    var Scale = 0.0;
    if( WidthDif > HeightDif )
    {
        Scale = world.width / img.width;
    }
    else
    {
        Scale = world.height / img.height;
    }
    if( Scale > 1 )
        Scale = 1;

    var UseWidth = Math.floor( img.width * Scale );
    var UseHeight = Math.floor( img.height * Scale );

    var x = Math.floor( ( world.width - UseWidth ) / 2);
    var y = Math.floor( ( world.height - UseHeight ) / 2 );

    context.drawImage( img, x, y, 200, 200 );
}


</script>
@endsection
