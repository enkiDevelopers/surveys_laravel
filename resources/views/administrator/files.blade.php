@extends('layouts.admin')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 ">
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

            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    					<span aria-hidden="true">&times;</span>
    				</button>
       <!--     <button type="button" class="btn btn-primary" onclick="addExclude()">Guardar Cambios</button> -->
            <button class="btn btn-primary" onclick="addExclude()">Conectar a la Base de Datos remota UVM</button>

          </div>
        </div>
      </div>
    </div>

    <div class="modal fade" id="uploadFileModal" tabindex="-1" role="dialog" aria-labelledby="uploadFileModalLabel"  data-backdrop="static" data-keyboard="false">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <form method="post" action="/conectar" id="myForm">
{{ csrf_field() }}

          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="limpiar();">
              <span aria-hidden="true">&times;</span>
            </button>
            <h5 class="modal-title" id="uploadFileModalLabel">Conectarse a una Base de datos</h5>

          </div>
          <div class="modal-body">

            <p> Ingrese datos de conexión</p>



<div class="row">
<div class="col-md-6">
<label for="host">Host de la base de datos</label>
  </div>
  <div class="col-md-6">
  <input type="text" name="host" value="">
        </div>
            </div>
<div class="row">
  <div class="col-md-6">
    <label for="nombre">Nombre de la base de datos</label>
  </div>
        <div class="col-md-6">
            <input type="text" name="nombre" value="">
          </div>
</div>
<div class="row">
  <div class="col-md-6">
    <label for="usuario">Usuario de la base de datos</label>
  </div>
        <div class="col-md-6">
            <input type="text" name="usuario" value="">
          </div>
</div>

<div class="row">
  <div class="col-md-6">
    <label for="pass">contraseña</label>
  </div>
        <div class="col-md-6">
            <input type="password" name="pass" value="">
          </div>
</div>
<div class="row">
  <div class="col-md-6">
    <label for="contra">Nombre de la tabla</label>
  </div>
        <div class="col-md-6">
            <input type="text" name="tabla" value="">
          </div>
</div>


          </div>
          <div class="modal-footer">
            <input type="button" class="btn btn-secondary"  data-dismiss="modal" value="cerrar" onclick="limpiar();" />
            <input type="submit" class="btn btn-primary" value="Conectar a base de datos" >
          </div>
            </form>
        </div>
      </div>
    </div>


@endsection

<script>
function limpiar()
{

    document.getElementById("myForm").reset();

}
    function addExclude(){
        $("#loadingExclude").removeClass('invisible');
    }

    function deleteFile(){

    }

    function uploadFile(){
                $("#loadingUploadFile").removeClass('invisible');

    }
    window.onload = function() {
        $("#files").addClass('active');
    }

</script>
