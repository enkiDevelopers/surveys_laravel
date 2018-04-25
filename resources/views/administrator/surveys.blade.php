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
      <link href="/css/bootstrap-toggle.min.css" rel="stylesheet">
        <script src="/js/bootstrap-toggle.min.js"></script>

<div class="container" >
    <div class="row">
      <div class="col-md-12 ">

      <div class="sep">

            <div class="supSide">
              <div class="circle" style=" <?php $nombre_fichero = './img/avatar/'.$info->imagenPerfil;if (file_exists($nombre_fichero)) {echo "background-image: url('/img/avatar/$info->imagenPerfil');";} else {echo "background-image: url('/img/avatar/default.png');";}  ?> "
 onclick="return principal();">
              </div>
              <div class="cuadroPerfilSup">
              <div class="row">

                    <span class="glyphicon glyphicon-cog eng">&nbsp</span>

                <div id="titName" style="height: 20px;">

                    {{$info->nombre}} {{$info->apPaterno}} {{$info->apMaterno}}
                </div>
              </div>

              <div class="row">
              <div class="col-md-8" id="titEm" style="width: 150px; height: 20px; overflow:hidden;">
                    {{$info->email}}
                </div>
              </div>
              </div>
            </div>
    </div>


            <div class="panel panel-default " id="panel1">
        <div class="panel-heading fijado">

<div class="row">
<div class="col-md-12">
<div class="col-md-4" style="text-align: top; ">
<b style="font-size: 30px;">Plantillas</b>
</div>

<div class="col-md-4" style="text-align: center;" id="btn-crear">
  <div style="margin: 1rem;">
    <a class="btn  btnLista text-center" data-toggle="modal" data-target="#ModalTitle"><span class="mas glyphicon-plus"></span>Crear</a>
  </div>
</div>

<div class="col-md-4" style="text-align: right;" id="btn-aC">
  <div style="margin: 1rem;">
    <input type="checkbox"
      checked data-toggle="toggle" data-on="Ocultar"
      data-off="Mostrar" data-onstyle="danger" data-offstyle="success"
         id="btnO" onchange="ocultar();"
      >

  </div>

</div>

</div>
</div>
                </div>
                <div class="panel-body scroll" id="pBody">

                              <div class="col-md-12 text-center" id="actualizar">

                              </div>

                </div>
            </div>

                    <div class="panel panel-default"  id="panel" >
                    <div class="panel-heading"> <!-- INICIO ENCABEZADO PANEL -->
                      <div class="row">
                      <div class="col-md-12">
                      <div class="col-md-6" style="text-align: top; ">
                      <b style="font-size: 30px;">Encuestas</b>
                      </div>

                      <div class="col-md-6" id="btn-aC2"style="text-align: right;">
                        <div style="margin: 1rem;">
                          <input type="checkbox"
                          checked data-toggle="toggle" data-on="Ocultar"
                          data-off="Mostrar" data-onstyle="danger" data-offstyle="success"
                            id="btnOp" onchange="ocultar2();"
                          >

                        </div>

                      </div>

                      </div>
                      </div>
                        </div>
                        <!-- fin ENCABEZADO PANEL -->
                <div class="panel-body scroll" id="pPBody">
                    <div class="row">

                        <div class="recibiendo" id="recibiendo">

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
        <div class="modal fade bd-example-modal-lg" id="ModalTitle" aria-hidden="true" data-keyboard="false" data-backdrop="static" tabindex="-1" style="z-index: 1050;" role ="dialog" aria-labelledby="myModalLabel1" style="min-width: 200px;">
            <div class="modal-dialog modal-lg" role="document">

                <div class="modal-content">
                <div class="modal-header">
  <div class="row">
      <div class="col-sm-10">
        <h4 class="modal-title" id="myModalLabel1">Inicializar plantilla</h4>
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
                    <input type="hidden" id="token" name="_token" value="{{ csrf_token() }}"/>
                      <div class="row">
                      <div class="col-md-4">
                        <input
                          type="text" maxlength="40" class="form-control text-black "
                          required id="ModalTitleInput" aria-describedby="emailHelp"
                          placeholder="Titulo de la encuesta" name="titulo" style="margin-bottom: 20px;"/>
                          <textarea maxlength="500" style="resize:none"
                                                      class="form-control text-black" required
                                                      cols="10" rows="10" name="descripcion" id="ModalDescInput" aria-describedby="desc"
                                                      placeholder="Descripción del proposito de la encuesta"></textarea>
                      </div>

                      <div class="col-md-4" id="pHorizontal">
                          <br />
                        <div class="col-md-3 col-md-offset-3 text-center cont">
                          <div class="title text-center">
                            Título de prueba
                          </div>
                        <div class="btnC">
                          <a class="btn btn-icon text-center" data-toggle="tooltip" data-placement="top" >
                          <span class="glyphicon glyphicon-edit "></span>
                          </a>
                          <a class="btn btn-icon text-center" data-toggle="tooltip" data-placement="top" >
                          <span class="glyphicon glyphicon-duplicate"></span>
                          </a>
                          <a class="btn btn-icon text-center" data-toggle="tooltip" data-placement="top" >
                          <span class="glyphicon glyphicon-trash "></span>
                          </a>
                          <a class="btn btn-icon text-center" data-toggle="tooltip" data-placement="top" >
                        <span class="glyphicon glyphicon-eye-open" ></span>
                          </a>
                          <a class="btn btn-icon text-center" data-toggle="tooltip" data-placement="top" >
                          <span class="glyphicon glyphicon-send"></span>
                          </a>
                        </div>

                          <div class="horizontal" >
                        <div class="vertical">
                            <img id="imgSalida" class="img-responsive center-block img" src="/img/iconos/default.png"/>
                        </div>

                        </div>



                        				</div>












                      </div>
                      <div class="col-md-4 text-center">
                      <label class="btn btn-info btn-file">
                        Seleccione su imagen
                        <input type="file" id="foto1" name="icono" onclick="limpiar2();" style="display:none;"/>
                      </label>
                      </div>

                      </div>
                      <div class="row">
                        <div class="col-md-4">

                        </div>

                      </div>

                </div>


                <div class="modal-footer">

             <a type="button" class="btn btn-default" data-dismiss="modal"
             onclick="limpiar()">Cancelar</a>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
                </div>



            </div>


        </div>
          </form>


<!--  modal de  creacion de encuesta-->
    <!-- Modal publicar encuesta-->
        <form id="form" onsubmit="return detener(event);">
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
                          <div clas="col-md-12">
                            <div class="col-md-6 text-center">
                            <label for="inicio">
                              Fecha de inicio:
                              <div class='input-group date datetimepicker'>
                                                               <input type="text" disabled readonly id="inicio" class="datepicker form-control text-black-body"/>
                                                               <span class="input-group-addon">
                                                                   <span class="glyphicon glyphicon-calendar text-info"></span>
                                                               </span>
                                                           </div>
                            </label>

                            </div>
                            <div class="col-md-6  text-center">
                                <label for="termino">Fecha de Término:
                                  <div class='input-group date datetimepicker'>
                                                                      <input type="text" required id="termino" readonly class="datepicker form-control text-black-body"/>
                                                                      <span class="input-group-addon">
                                                                          <span class="glyphicon glyphicon-calendar text-info"></span>
                                                                      </span>
                                                                  </div>
                                </label>
                            </div>
                          </div>
                        </div>


<hr />

                        <div class="row">
                          <div clas="col-md-12">
                              <br />
                            <div class="col-md-6 text-center">
                            <label for="destinatarios">Destinatarios:
                              <select name="destinatarios" id="destinatarios" class="form-control text-black-body" required>

                                   <?php foreach ($listas as $lista) {?>
                                     <option value="{{$lista->idLista}}" >  {{$lista->nombre}}</option>
                                   <?php } ?>
                                 </select>
                             </label>
                            </div>

                            <div class="col-md-6  text-center">
                              <label for="tipo">Tipo de encuesta:
                                <select  id="tipo" name="tipo" class="form-control text-black-body" required>
                                               <?php foreach ($tipos as $tipo) {?>
                                               <option value="{{$tipo->idTipo}}" > <?php echo $tipo->tipo; ?>  </option>
                                               <?php  } ?>

                                   </select>
                               </label>
                            </div>
                          </div>
                        </div>


                          <hr />

                          <div class="row">
                            <div class="col-md-12 text-center">
                               <label for="asunto">Asunto del correo:</label>
                            </div>
                            <div class="col-md-12">
                               <input type="text" name="asunto" id="asunto" maxlength="100" class="form-control text-black-body">

                            </div>
                          </div>
                            <hr />

                            <div class="row">
                                <div class="col-md-12 text-center">
                                    <label for="descripcion">Instrucciones de la encuesta:</label>
                              </div>
                            </div>

                          <div class="row">
                              <div class="col-md-12">
                              <textarea id="instrucciones"
                               name="instrucciones" maxlength="500" rows="5" cols="50" required  class="ckeditor" style="resize: none;">

                               </textarea>
                            </div>
                          </div>



      </div> <!-- -->
        <div class="modal-footer">
           <input type="button" name="cancelar" value="Cancelar" class="btn btn-warning" onclick="limpiar3()" data-dismiss="modal">
            <input type="submit" name="enviar" class="btn btn-danger" id="publicar" value="Publicar" />
        </div>
		    </div>
		    </div>
	      </div>
    </form>
<!-- #######################################################################Modal Duplicar######################################################## -->
        <form id="duForm" onsubmit="return detener2(event);">
              <div class="modal fade" id="duModal" tabindex="-1"
                role="dialog" aria-labelledby="myModalLabel"
                data-backdrop="static" data-keyboard="false">
                <div class="modal-dialog" role="document">
          <div class="modal-content">
                 <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="limpiar4()">
                        <span aria-hidden="true">&times;</span>
                        </button>
                            <h4 class="modal-title" id="myModalLabel">Duplicar plantila</h4>
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
  imagen();
  $(".datetimepicker").datetimepicker({
    format: 'YYYY-MM-DD HH:mm:ss',
    ignoreReadonly: true,

      });

</script>
@endsection
