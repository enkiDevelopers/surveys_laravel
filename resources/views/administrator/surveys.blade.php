@extends('layouts.admin')
@section('content')
  @include('sweet::alert')
  <div class="loader" id="loader" >

  </div>
  <div class="procesando" id="procesando" >
  </div>
  <input type="hidden" id="idadmin" value="{{$id}}"/>
      <link rel="stylesheet" href="/css/alertify.rtl.css">
      <link rel="stylesheet" href="/css/themes/default.rtl.css">
      <script src="/js/alertify.js"></script>
      <script src="/js/moment.min.js"></script>
      <script type="text/javascript" src="/js/surveys.js"></script>
      <script src="{{ asset('/vendors/ckeditor/ckeditor.js') }}"></script>


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
                    <div class="row" >
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
                                  <div id="actualizar">

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
<!-- #############################################3 Modal agregar plantilla -->
          <form id="myForm" method="post" action="/save" enctype="multipart/form-data" id="myForm">
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
                    <input type="hidden" value="{{$id}}" name="creador" id="creador"/>
                    <input type="hidden" id="token" name="_token" value="{{ csrf_token() }}">
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
    <!-- Modal publicar encuesta-->
        <form id="form" onsubmit="return detener();">
      <div class="modal fade" id="miModal" 
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
                        <input type="hidden" id="idModal" />
                        <div class="row">
                        <div class="col-md-6">
                              <label for="inicio">Fecha de inicio</label>
                              <input type="datetime"  value="" readonly id="inicio">
                        </div>
                        <div class="col md-6">
                              <label for="termino">Fecha de Término:</label>
                              <input type="datetime-local"   required id="termino" min="">
                        </div>
                        </div>
                        <hr />
                        <div class="row">
                        <div class="col-md-12">
                          <div class="col-md-6">
                          <label for="asunto">Asunto</label>
                          </div>
                          <div class="col-md-6">
                          <input type="text" name="asunto" id="asunto" maxlength="100"/>
                          </div>
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

      <textarea id="instrucciones" name="instrucciones" maxlength="500" rows="5" cols="50" required  class="ckeditor">

      </textarea>
    <!--  <textarea class="ckeditor" name="editor1" id="editor1" rows="10" cols="80"> </textarea>-->
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

    <label for="tipo">Tipo de encuesta: </label>

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
                        <input type="hidden" id="idCreador">
                        <input type="hidden" id="idDup" />
                        <input type="hidden" id="token" name="_token" value="{{ csrf_token() }}">
                    <div class="col-md-12">
                      <div class="col-md-6">
                          <label for="nNombre">Ingrese nuevo nombre:</label>
                      </div>
                    <div class="col-md-6">
                      <input type="text" maxlength="40" required id="nNombre" name="nNombre"/>
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
    showcards();

      </script>
@endsection
