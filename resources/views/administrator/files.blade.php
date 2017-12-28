@extends('layouts.admin')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 ">
            <div class="panel panel-default">
                <div class="panel-heading">Archivos Creados</div>

                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="card well" >
                                <img class="card-img-top"  alt="Card image cap">
                                <div class="card-body">
                                    <h4 class="card-title">Archivo 1</h4>
                                    <p class="card-text"></p>
                                    <div class="btn-group" role="group" aria-label="...">
                                        <a type="button" href="{{ url('/administrator/file/open') }}" class="btn btn-default"  data-toggle="tooltip" data-placement="top" title="Vista previa">
                                            <span class="glyphicon glyphicon-eye-open"></span>
                                        </a>
                                        <a data-toggle="modal" data-target="#deleteFileModal" type="button" class="btn btn-default" data-toggle="tooltip" data-placement="top" title="Editar">
                                            <span class="glyphicon glyphicon-trash"></span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="card well" >
                                <img class="card-img-top"  alt="Card image cap">
                                <div class="card-body">
                                    <h4 class="card-title">Archivo 2</h4>
                                    <p class="card-text"></p>
                                    <div class="btn-group " role="group" aria-label="...">
                                        <a type="button" href="{{ url('/administrator/file/open') }}" class="btn btn-default"  data-toggle="tooltip" data-placement="top" title="Vista previa">
                                            <span class="glyphicon glyphicon-eye-open"></span>
                                        </a>
                                        <a data-toggle="modal" data-target="#deleteFileModal" type="button" class="btn btn-default" data-toggle="tooltip" data-placement="top" title="Editar">
                                            <span class="glyphicon glyphicon-trash"></span>
                                        </a>
                                    </div>                                    
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="card well" >
                                <img class="card-img-top"  alt="Card image cap">
                                <div class="card-body">
                                    <h4 class="card-title">Archivo 3</h4>
                                    <p class="card-text"></p>
                                    <div class="btn-group " role="group" aria-label="...">
                                        <a type="button" href="{{ url('/administrator/file/open') }}" class="btn btn-default"  data-toggle="tooltip" data-placement="top" title="Vista previa">
                                            <span class="glyphicon glyphicon-eye-open"></span>
                                        </a>
                                        <a data-toggle="modal" data-target="#deleteFileModal" type="button" class="btn btn-default" data-toggle="tooltip" data-placement="top" title="Editar">
                                            <span class="glyphicon glyphicon-trash"></span>
                                        </a>
                                    </div>                                    
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="card well" >
                                <img class="card-img-top"  alt="Card image cap">
                                <div class="card-body">
                                    <h4 class="card-title">Archivo 4</h4>
                                    <p class="card-text"></p>
                                    <div class="btn-group " role="group" aria-label="...">
                                        <a type="button" href="{{ url('/administrator/file/open') }}" class="btn btn-default"  data-toggle="tooltip" data-placement="top" title="Vista previa">
                                            <span class="glyphicon glyphicon-eye-open"></span>
                                        </a>
                                        <a data-toggle="modal" data-target="#deleteFileModal" type="button" class="btn btn-default" data-toggle="tooltip" data-placement="top" title="Editar">
                                            <span class="glyphicon glyphicon-trash"></span>
                                        </a>
                                    </div>                                    
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="card well" >
                                <img class="card-img-top"  alt="Card image cap">
                                <div class="card-body">
                                    <h4 class="card-title">Archivo 5</h4>
                                    <p class="card-text"></p>
                                    <div class="btn-group " role="group" aria-label="...">
                                        <a type="button" href="{{ url('/administrator/file/open') }}" class="btn btn-default"  data-toggle="tooltip" data-placement="top" title="Vista previa">
                                            <span class="glyphicon glyphicon-eye-open"></span>
                                        </a>
                                        <a data-toggle="modal" data-target="#deleteFileModal" type="button" class="btn btn-default" data-toggle="tooltip" data-placement="top" title="Editar">
                                            <span class="glyphicon glyphicon-trash"></span>
                                        </a>
                                    </div>                                    
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="card well" >
                                <img class="card-img-top"  alt="Card image cap">
                                <div class="card-body">
                                    <h4 class="card-title">Archivo 6</h4>
                                    <p class="card-text"></p>
                                    <div class="btn-group " role="group" aria-label="...">
                                        <a type="button" href="{{ url('/administrator/file/open') }}" class="btn btn-default"  data-toggle="tooltip" data-placement="top" title="Vista previa">
                                            <span class="glyphicon glyphicon-eye-open"></span>
                                        </a>
                                        <a data-toggle="modal" data-target="#deleteFileModal" type="button" class="btn btn-default" data-toggle="tooltip" data-placement="top" title="Editar">
                                            <span class="glyphicon glyphicon-trash"></span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                       <div class="col-md-3">
                            <div class="card  card-new-file" >
                                <div class="card-body text-center">
                                    <h4 class="card-title">Añadir Archivos</h4>
                                    <p class="card-text"></p>
                                        <p>
                                            <a data-toggle="modal" data-target="#uploadFileModal" class="btn btn-default btn-md btn-new-file">
                                              <span class="glyphicon glyphicon-plus text-center"></span>  
                                            </a>
                                        </p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
               
            </div>

            <div class="panel panel-default">
                <div class="panel-heading">Lista de Incidentes</div>
                <div class="panel-body">

                         <div class="col-md-3">
                            <div class="card well" >
                                <img class="card-img-top"  alt="Card image cap">
                                <div class="card-body">
                                    <h4 class="card-title">Lista 1</h4>
                                    <p class="card-text"></p>
                                    <div class="btn-group " role="group" aria-label="...">
                                        <a type="button" href="{{ url('/administrator/file/open') }}" class="btn btn-default"  data-toggle="tooltip" data-placement="top" title="Vista previa">
                                            <span class="glyphicon glyphicon-eye-open"></span>
                                        </a>
                                        <a data-toggle="modal" data-target="#deleteFileModal" type="button" class="btn btn-default" data-toggle="tooltip" data-placement="top" title="Editar">
                                            <span class="glyphicon glyphicon-trash"></span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    
                       <div class="col-md-3">
                            <div class="card  card-new-file" >
                                <div class="card-body text-center">
                                    <h4 class="card-title">Añadir Lista de incidentes</h4>
                                    <p class="card-text"></p><br>
                                        <p>
                                            <a data-toggle="modal" data-target="#addExclude" class="btn btn-default btn-md btn-new-file">
                                              <span class="glyphicon glyphicon-plus text-center"></span>  
                                            </a>
                                        </p><br>
                                </div>
                            </div>
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