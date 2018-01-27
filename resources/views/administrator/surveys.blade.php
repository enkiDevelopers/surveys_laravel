@extends('layouts.admin')
@section('content')
  @php
  date_default_timezone_set('America/Mexico_City');
  @endphp
  @include('sweet::alert')
  <div class="loader" id="loader" >

  </div>
  <div class="procesando" id="procesando" >
  </div>
      <link rel="stylesheet" href="/css/alertify.rtl.css">
      <link rel="stylesheet" href="/css/themes/default.rtl.css">
      <script src="/js/alertify.js"></script>
      <script type="text/javascript" src="/js/surveys.js"></script>

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
                         <?php foreach ($propias as $plantilla) { ?>
                        <div class="col-md-4" id="{{$plantilla->id}}">
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
                                    <p class="card-text responsiveText">Creada por <span class="template-creator"> {{$plantilla->Nombre}}</span></p></div>
                                  </div>

                                    <div class="btn-group centrarbtn" role="group" aria-label="...">
                                        <button type="button" class="btn btn-default"  data-toggle="tooltip" data-placement="top" title="Vista previa">
                                            <span class="glyphicon glyphicon-eye-open" ></span>
                                        </button>
                                          <a href="{{url('administrator/edit')}}/{{$plantilla->id}}"
                                        class="btn btn-default" data-toggle="tooltip" data-placement="top" title="Editar">

                                            <span class="glyphicon glyphicon-pencil"></span>
                                        </a>
                                        <a onclick="alerta({{$plantilla->id}},{{$plantilla->creador}})"
                                          class="btn btn-default" data-toggle="tooltip" data-placement="top"
                                          title="Eliminar">
                                            <span class="glyphicon glyphicon-trash"></span>
                                        </a>
                                      <a onclick="DuModal({{$plantilla->id}});" class="btn btn-default" data-toggle="tooltip" data-placement="top" title="Duplicar">
                                            <span class="glyphicon glyphicon-copy"></span>
                                      </a>

                                        <a onclick="openModal({{$plantilla->id}});" class="popup-link btn btn-default"  data-placement="top" title="Publicar">
                                            <span class="glyphicon glyphicon-send"></span>
                                        </a>

                                    </div>
                                </div>
                            </div>
                        </div>

                <?php } ?>

<?php foreach ($agenas as $plantilla) { ?>
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
           <p class="card-text responsiveText">Creada por <span class="template-creator"> {{$plantilla->Nombre}}</span></p></div>
         </div>
           <div class="btn-group centrarbtn" role="group" aria-label="...">
               <button type="button" class="btn btn-default"  data-toggle="tooltip" data-placement="top" title="Vista previa">
                   <span class="glyphicon glyphicon-eye-open" ></span>
               </button>
                 <a
               class="btn btn-default" data-toggle="tooltip" data-placement="top" title="Editar" disabled>
                   <span class="glyphicon glyphicon-pencil"></span>
               </a>
               <a
                 class="btn btn-default" data-toggle="tooltip" data-placement="top"
                 title="Eliminar" disabled>
                   <span class="glyphicon glyphicon-trash"></span>
               </a>

               <button type="button" class="btn btn-default" data-toggle="tooltip" data-placement="top" title="Duplicar">
                   <span class="glyphicon glyphicon-copy"></span>
               </button>

               <button type="button" class="btn btn-default" data-toggle="tooltip" data-placement="top" title="Publicar" disabled>
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
                  <div class="row">
                    <div class="col-md-6">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>

                    <div class="col-md-6">
                      <h4 class="modal-title" id="myModalLabel">Publicar encuesta - Titulo de la encuesta</h4>

                  </div>
                  </div>
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


            <div class="panel panel-default"  id="panel">
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
                        </div>

                <div class="panel-body scroll">
                    <div class="row">

                        <div class="" id="recibiendo">

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
                 <form method="post" action="/save" enctype="multipart/form-data" id="myForm">
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
          <a type="button" class="glyphicon glyphicon-remove" data-dismiss="modal" href="administrator/surveys" onclick="limpiar()"></a>
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
                    <input type="file" id="foto1"  onchange="return ShowImagePreview( this.files );" name="icono" onclick="limpiar2();"/> <br />
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
<!--  modal de  creacion de encuesta-->
        <form id="form" onsubmit="return detener();">
      <div class="modal fade" id="miModal" tabindex="-1"
        role="dialog" aria-labelledby="myModalLabel"
        data-backdrop="static" data-keyboard="false">
	           <div class="modal-dialog" role="document">
		              <div class="modal-content">
			                   <div class="modal-header">
				                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="limpiar3()">
					                      <span aria-hidden="true">&times;</span>
				                        </button>
				                            <h4 class="modal-title" id="myModalLabel">Publicar encuesta</h4>

                          </div>
			                    <div class="modal-body">
<!-- Cuerpo del modal inicio -->
                        <input type="hidden" id="token" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" id="idModal" value=""/>
                        <div class="row">
                        <div class="col-md-6">
                              <label for="inicio">Fecha de inicio</label>
                              <input type="datetime"  value="<?php echo date("Y-m-d h:i:s"); ?>" readonly id="inicio">
                        </div>
                        <div class="col md-6">
                              <label for="termino">Fecha de Termino:</label>
                              <input type="datetime-local"  value="<?php echo date("Y-m-d\ h:i:s"); ?>" required id="termino">
                        </div>
                        </div>
                        <hr />
    <div class="row">
    <div class="col-md-12 text-center">
    <label for="descripcion">Instrucciones de la encuesta:</label>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12 text-center">
      <textarea id="instrucciones" maxlength="500" rows="5" cols="50" required></textarea>
    </div>
    </div>
  <hr />
    <div class="row">
    <div class="row">
    <div class="col-md-12 text-center">
          <p>Dirigido a:</p>
    </div>
    </div>
    <div class="row">
    <div class="col-md-6 text-center">

    <label for="destinatarios">Destinatarios: </label>

    </div>
    <div class="col-md-6 text-center">

    <label for="tipo">tipo de encuesta: </label>

    </div>
    </div>
    <div class="row">
    <div class="col-md-6 text-center">

    <select  name="destinatarios" required>

      <?php foreach ($listas as $lista) {?>
      <option value="{{$lista->nombre}}" id="destinatario">  {{$lista->nombre}}</option>
                                  <?php } ?>

      </select>
      </div>
    <div class="col-md-6 text-center">
    <select  name="tipo" required>
                <?php foreach ($tipos as $tipo) {?>
                <option value="{{$tipo->idTipo}}" id="tipo"> <?php echo $tipo->tipo; ?>  </option>
                <?php  } ?>

    </select>
    </div>
    </div>
                  <hr>
                    <div class="row">
                    <div class="col-md-12">
                    <div class="col-md-4">
                    </div>
                    <div class="col-md-4">
                    </div>
                    <div class="col-md-4">
                        <input type="button" name="cancelar"
                        value="Cancelar" class="btn btn-warning" onclick="limpiar3()" data-dismiss="modal">
                        <input type="submit" name="enviar" class="btn btn-danger" id="publicar" value="Publicar" />
        </div>
        </div>
        </div>
        </div>
        </div>
		    </div>
		    </div>
	      </div>
    </form>

<!-- #######################################################################Modal Duplicar######################################################## -->
        <form id="duForm" onsubmit="return detener2();">
              <div class="modal fade" id="duModal" tabindex="-1"
                role="dialog" aria-labelledby="myModalLabel"
                data-backdrop="static" data-keyboard="false">
                <div class="modal-dialog" role="document">
          <div class="modal-content">
                 <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="limpiar4()">
                        <span aria-hidden="true">&times;</span>
                        </button>
                            <h4 class="modal-title" id="myModalLabel">Duplicar encuesta</h4>

                  </div>
                    <div class="modal-body">
                      <div class="row">
                        <input type="hidden" id="idDup" />
                    <div class="col-md-12">
                      <div class="col-md-6">
                          <label for="nNombre">Ingrese nuevo nombre:</label>
                      </div>
                    <div class="col-md-6">
                      <input type="text" maxlength="40" required name="nNombre"/>
                    </div>
                    </div>

                    </div>
                    <div class="row">

                        <hr />
                <div class="col-md-12">
                  <div class="col-md-4">

                  </div>
                  <div class="col-md-2">

                  </div>
                  <div class="col-md-6">
                  <input type="button" name="cancelar"
                      value="Cancelar" class="btn btn-warning" onclick="limpiar4()" data-dismiss="modal">
                      <input type="submit" name="enviar" class="btn btn-danger" id="duplicar" value="Duplicar" />
                    </div>
                </div>

                          </div>

</div>
</div>
</div>
</form>



<!--######################################### Termina MODAL DUPLICAR ##################################################### -->
      <script>
    busca();
      </script>
@endsection
