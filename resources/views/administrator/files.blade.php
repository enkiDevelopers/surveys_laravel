@extends('layouts.admin')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-11 ">
            <div class="panel panel-default">
                <div class="panel-heading">Archivos Creados <a style="cursor:pointer" data-toggle="modal" data-target="#uploadFileModal" class="pull-right">Crear</a></div>

                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="card well" >
                                <img class="card-img-top" src="..." alt="Card image cap">
                                <div class="card-body">
                                    <h4 class="card-title">Archivo 1</h4>
                                    <p class="card-text"></p>
                                    <a  class="" href="{{ url('/administrator/file/open') }}">Ver</a>
                                    <a  class="" data-toggle="modal" data-target="#deleteFileModal">Eliminar</a>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="card well" >
                                <img class="card-img-top" src="..." alt="Card image cap">
                                <div class="card-body">
                                    <h4 class="card-title">Archivo 2</h4>
                                    <p class="card-text"></p>
                                    <a  class="" href="{{ url('/administrator/file/open') }}">Ver</a>
                                    <a  class="" data-toggle="modal" data-target="#deleteFileModal">Eliminar</a>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="card well" >
                                <img class="card-img-top" src="..." alt="Card image cap">
                                <div class="card-body">
                                    <h4 class="card-title">Archivo 3</h4>
                                    <p class="card-text"></p>
                                    <a  class="" href="{{ url('/administrator/file/open') }}">Ver</a>
                                    <a  class="" data-toggle="modal" data-target="#deleteFileModal">Eliminar</a>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="card well" >
                                <img class="card-img-top" src="..." alt="Card image cap">
                                <div class="card-body">
                                    <h4 class="card-title">Archivo 4</h4>
                                    <p class="card-text"></p>
                                    <a  class="" href="{{ url('/administrator/file/open') }}">Ver</a>
                                    <a  class="" data-toggle="modal" data-target="#deleteFileModal">Eliminar</a>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="card well" >
                                <img class="card-img-top" src="..." alt="Card image cap">
                                <div class="card-body">
                                    <h4 class="card-title">Archivo 5</h4>
                                    <p class="card-text"></p>
                                    <a  class="" href="{{ url('/administrator/file/open') }}">Ver</a>
                                    <a  class="" data-toggle="modal" data-target="#deleteFileModal">Eliminar</a>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="card well" >
                                <img class="card-img-top" src="..." alt="Card image cap">
                                <div class="card-body">
                                    <h4 class="card-title">Archivo 6</h4>
                                    <p class="card-text"></p>
                                    <a  class="" href="{{ url('/administrator/file/open') }}">Ver</a>
                                    <a  class="" data-toggle="modal" data-target="#deleteFileModal">Eliminar</a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
               
            </div>

            <div class="panel panel-default">
                <div class="panel-heading">Lista de Incidentes <a style="cursor:pointer" class="pull-right" data-toggle="modal" data-target="#addExclude">Añadir</a></div>
                <div class="panel-body">
                    <div class="row">
                        <ul class="list-group">
                          <li class="list-group-item text-primary"><center><em><strong>Sin excepciones todavía</strong></em></center></li>

                        </ul>
                    </div>
                </div>
           </div>

        </div>
    </div>
</div>

    <div class="modal fade" id="addExclude" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <h5 class="modal-title" id="exampleModalLabel">Excluir Usuario</h5>
          </div>
          <div class="modal-body">
            <center>
                <div class="invisible" id="loadingExclude">
                    <img src="http://smartmo.unl.edu/portal_includes/images/loading_circle.gif" alt="Cargando..." width="150px" height="100px">
                </div>
            </center>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
       <!--     <button type="button" class="btn btn-primary" onclick="addExclude()">Guardar Cambios</button> -->
            <button class="btn btn-primary" onclick="addExclude()">Conectar a la Base de Datos remota UVM</button>

          </div>
        </div>
      </div>
    </div>

    <div class="modal fade" id="uploadFileModal" tabindex="-1" role="dialog" aria-labelledby="uploadFileModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            <h5 class="modal-title" id="uploadFileModalLabel">Subir Archivo</h5>

          </div>
          <div class="modal-body">
            <center>
                <div class="invisible" id="loadingUploadFile">
                    <img src="http://smartmo.unl.edu/portal_includes/images/loading_circle.gif" alt="Cargando..." width="150px" height="100px">
                </div>
            </center>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <!--  <button type="button" class="btn btn-primary" onclick="uploadFile()">Subir Archivos</button> -->
            <button class="btn btn-primary" onclick="uploadFile()">Conectar a base de datos remota UVM</button>

          </div>
        </div>
      </div>
    </div>

    <div class="modal fade" id="deleteFileModal" tabindex="1" role="dialog" aria-labelledby="deleteFileModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            <h5 class="modal-title" id="deleteFileModalLabel">Eliminar Archivo</h5>

          </div>
          <div class="modal-body">
            <span>Está seguro que desea elimnar esté archivo?</span>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            <button type="button" class="btn btn-primary" onclick="deleteFile()">Eliminar Archivo</button>
          </div>
        </div>
      </div>
    </div>
@endsection

<script>
    function addExclude(){
        $("#loadingExclude").removeClass('invisible');
    }

    function deleteFile(){

    }     

    function uploadFile(){
                $("#loadingUploadFile").removeClass('invisible');


    }
</script>