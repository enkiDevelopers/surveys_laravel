@extends('layouts.admin')
@section('content')
  @include('sweet::alert')
  <div class="loader" id="loader" >
  </div>
  <div class="procesando" id="procesando" >
  </div>
  <input type="hidden" id="idadmin" value="{{$id}}"/>
      <link href="/css/surveys.css" rel="stylesheet"/>
      <script type="text/javascript" src="/js/surveys.js"></script>
      <script src="{{ asset('/vendors/ckeditor/ckeditor.js') }}"></script>

<div class="container" >
    <div class="row">

      <div class="col-md-12 ">
              <div class="sep">
              <div class="row">
                <div class="supSide">
                <div class="circle">
                </div>
              <div class="cuadroPerfilSup">
                <div class="eng">
                  <span class="glyphicon glyphicon-cog"> &nbsp</span>
                  </div>
                <div id="content">
                  <div class="nombre"> Jorge Luis González Hernandez </div>
                  <div class="correo">colocho-2104@gmail.com </div>
                      </div>
              </div>
                </div>
              </div>
              </div>


            <div class="panel panel-default ">
                <div class="panel-heading fijado">
                    <div class="row">
                        <div class="col-md-3">
                          <h3><b>  Plantillas </b> </h3>
                        </div>
                        <div class="col-md-9 pull-right" id="infob">
                            <div class="row">
                              <br />
                                <div class="col-md-1">&nbsp</div>
                                <div class="col-md-1 pull-right">
                    <a onclick="ocultar();" id="btnO"><span id="cambiar" class="glyphicon glyphicon-chevron-up"></span> </a>
                                </div>
                                <div class="col-md-2 pull-right">
                                    <b>Ver&nbsp&nbsp<span class="glyphicon glyphicon-eye-open"></span></b>
                                </div>
                                <div class="col-md-2 pull-right">
                                    <b>  Editar&nbsp&nbsp<span class="glyphicon glyphicon-edit" ></span></b>
                                </div>
                                <div class="col-md-2 pull-right">
                                    <b>  Publicar&nbsp&nbsp<span class="glyphicon glyphicon-send"></span></b>
                                </div>
                                <div class="col-md-2 pull-right">
                                    <b>  Duplicar&nbsp&nbsp<span class="glyphicon glyphicon-duplicate"></span></b>
                                </div>
                                <div class="col-md-2 pull-right">
                                    <b>  Eliminar&nbsp&nbsp<span class="glyphicon glyphicon-trash"></span></b>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel-body scroll" id="pBody">
                    <div class="row" >
                      <div class="col-sm-0">
                      </div>

<!--##################################  inicio boton de añadir plantilla#########################################################################-->
                       <div id="btn-añadir" class="col-md-12">

                   <a data-toggle="modal" data-target="#ModalTitle" >
                     <div id="content-btn"class="text-center">
                   <span class="glyphicon glyphicon-plus" id="btn-newSur"></span>
                   <div id="crearPlantilla">
                      <h1>Crear Plantilla</h1>
                     </div>
                       </a>
                      </div>
                        </div>


<!--Termina boton añadir plantila de encuesta -->

                        <div class="col-sm-0">
                        </div>
                                  <div id="actualizar">

                                  </div>
                    </div>
                </div>
            </div>

                    <div class="panel panel-default"  id="panel" >
                    <div class="panel-heading"> <!-- INICIO ENCABEZADO PANEL -->
                      <div class="row">
                          <div class="col-md-3">
                            <h4><b>  Encuestas publicadas </b> </h4>
                          </div>
                          <div class="col-md-9 pull-right" id="infob">
                              <div class="row">
                                <br />
                                  <div class="col-md-1">&nbsp</div>
                                  <div class="col-md-1 pull-right">
                      <a onclick="ocultar2();" id="btnOp"><span id="cambiar2" class="glyphicon glyphicon-chevron-up"></span> </a>
                                  </div>
                                  <div class="col-md-2 pull-right">
                                      <b>Ver&nbsp&nbsp<span class="glyphicon glyphicon-eye-open"></span></b>
                                  </div>
                                  <div class="col-md-2 pull-right">
                                    Activa<div class="pull-right survey-status survey-status__active"></div>
                                  </div>
                                  <div class="col-md-2 pull-right">
                                    Finalizada<div class="pull-right survey-status survey-status__finished"></div>
                                  </div>
                                  <div class="col-md-2 pull-right">
                                  <img id="btnT" src="/img/redes/twitter.png"  width="40" height="40" onclick="infoT();"/>
                                  </div>
                                  <div class="col-md-2 pull-right">
                                  <img id="btnF" src="/img/redes/Facebook.png"  width="40" height="40" onclick="infoF();"/>
                                  </div>

                              </div>
                          </div>
                      </div>

                        </div>
                        <!-- fin ENCABEZADO PANEL -->
                <div class="panel-body scroll" id="pPBody">
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
                        <div class="row col-md-12">
                          <div class="col-md-6">
                                <label for="inicio">Fecha de inicio</label>
                                <div class='input-group date datetimepicker'>
                                    <input type="text" readonly id="inicio" class="datepicker form-control text-black-body"/>
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar text-info"></span>
                                    </span>
                                </div>
                          </div>
                          <div class="col md-6">
                                <label for="termino">Fecha de Término:</label>
                                <div class='input-group date datetimepicker'>
                                    <input type="text" required id="termino" min="" class="datepicker form-control text-black-body"/>
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar text-info"></span>
                                    </span>
                                </div>
                          </div>
                          <hr>
                        </div>
                        <div class="row col-md-12">
                          <label for="asunto">Asunto del correo:</label>
                          <input type="text" name="asunto" id="asunto" maxlength="100" class="form-control text-black-body">
                          <hr>
                        </div>
                        <div class="row col-md-12 text-center">
                          <label for="descripcion">Instrucciones de la encuesta:</label>
                        </div>
                        <div class="row col-md-12 text-center">
                          <textarea id="instrucciones" name="instrucciones" maxlength="500" rows="5" cols="50" required  class="ckeditor"></textarea><hr>
                        </div>

    <div class="row">

    <div class="row">
      <div class="col-md-6 text-center">
        <label for="destinatarios">Destinatarios: </label>
      </div>
      <div class="col-md-6 text-center">
        <label for="tipo">Tipo de encuesta: </label>
      </div>
    </div>
    <div >
    <div class="col-md-6 text-center">

    <select name="destinatarios" id="destinatarios" class="form-control text-black-body" required>

      <?php foreach ($listas as $lista) {?>
        <option value="{{$lista->idLista}}" >  {{$lista->nombre}}</option>
      <?php } ?>
    </select>
      </div>
    <div class="col-md-6 text-center">
    <select  id="tipo" name="tipo" class="form-control text-black-body" required>
                <?php foreach ($tipos as $tipo) {?>
                <option value="{{$tipo->idTipo}}" > <?php echo $tipo->tipo; ?>  </option>
                <?php  } ?>

    </select>
    </div>
    </div>
                  <hr>

        </div>
        </div>
        <div class="modal-footer">
           <input type="button" name="cancelar" value="Cancelar" class="btn btn-warning" onclick="limpiar3()" data-dismiss="modal">
            <input type="submit" name="enviar" class="btn btn-danger" id="publicar" value="Publicar" />
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
                <div class="col-md-6">
                <input type="button" name="cancelar" value="Cancelar" class="btn btn-warning" onclick="limpiar4()" data-dismiss="modal">
                <input type="submit" name="enviar" class="btn btn-danger" id="duplicar" value="Duplicar" />
                </div>
                </div>
                </div>
</div>
</div>
</div></div>

</form>

<!--######################################### Termina MODAL DUPLICAR ##################################################### -->

<!--################################ Modal recordatorio ############################################################################### -->
<div class="modal" tabindex="-1" role="dialog" id="recordatorio" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Enviar recordatorio</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div id="recorRec">

        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" onclick="send();">Enviar recordatorio</button>
      </div>
    </div>
  </div>
</div>

<script>
  busca();
  showcards();

  $(".datetimepicker, .datepicker").datetimepicker({
    format: 'YYYY-MM-DD HH:mm:ss',
      });

</script>
@endsection
