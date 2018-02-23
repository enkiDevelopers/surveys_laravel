@extends('layouts.admin')
@section('content')
  <style type="text/css">
    .progress {
    display: block;
    text-align: center;
    width: 0;
    height: 3px;
    background: red;
    transition: width .3s;
}
.progress.hide {
    opacity: 0;
    transition: opacity 1.3s;
}

  </style>


<div class="progress"></div>
<div id="AgregarLista" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Agregar Nueva lista de Encuestados</h4>
      </div>
      <div class="modal-body" >
<<<<<<< HEAD
        <form  method="post" id="formuploadajax" action="/ingresar" enctype="multipart/form-data">
=======
        <form  method="get" id="formuploadajax" enctype="multipart/form-data">
>>>>>>> 047320a80454864d9ac2a8238aaf3c9987b4eb08
          <hr>
          {{ csrf_field() }}

            <label for="exampleInputFile">Nombre de la Lista</label>
              <input class="form-control" id="nombre" name="nombre" type="text">
            <label for="exampleInputFile">Subir documento</label>
              <input class="form-control-file"  id="archivo" name="archivo" type="file" accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet">
              <a id="boton" data-toggle="tooltip" title="Ayuda"><span class="glyphicon glyphicon-question-sign"></span>.xlsx</a>
          <hr>
            <input type="submit" class="btn btn-default" value="Subir archivos"  />
        </form>


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
      </div>
    </div>

  </div>
</div>


<div id="AgregarIncidentes" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Agregar Nueva lista de Incidencias</h4>
      </div>
      <div class="modal-body" >
        <form  method="post" id="formincidentes" enctype="multipart/form-data">
          <hr>
          <p>Los registros que suba seran marcados como incidentes dentro de la lista seleccionada.</p>
            <label for="exampleInputFile">Subir documento</label>
              <input class="form-control-file"  id="incidentes" name="incidentes" type="file" accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet">
                 <input type="hidden" id="idlista" name="idlista" value="">
        
          <hr>
            <input type="submit" class="btn btn-default" value="Subir archivos"  />
        </form>

 
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
      </div>
    </div>

  </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>

<style type="text/css">
  .procesando {
    position: fixed;
    left: 0px;
    top: 0px;
    width: 100%;
    height: 100%;
    z-index: 9999;
    background: url('/img/load/cargando2.gif') 50% 50% no-repeat rgb(249,249,249);
    opacity: .8;
}
</style>

<script type="text/javascript">
  $(window).load(function() {
    $(".procesando").fadeOut("slow");
});
</script>


  <div class="procesando" id="procesando"></div>
<div class="container">
    <div class="row" id="divid">
      <hr/>
        <div class="col-md-12 ">
            <div class="panel panel-default">
                <div class="panel-heading">Listas Creadas</div>
                    <div class="row">


                          <div class="col-md-4">
                            <div class="card well card-new-survey" >
                                <div class="card-body text-center">
                                    <h3 class="card-title" id="Atitle">Añadir Nueva Lista</h3>
                                    <p class="card-text"></p><br>
                                        <p>
                                            <a data-toggle="modal" data-target="#AgregarLista" class="btn btn-default btn-lg btn-new-survey">
                                              <span class="glyphicon glyphicon-plus text-center"></span>
                                            </a>
                                        </p>
                                </div>
                            </div>
                        </div>

<?php
try{
  foreach ($listas as $lista) {
    if($lista->carga==1){
      if($lista->usado== 0){
?>
                        <div class="col-md-4" id="delete_{{$lista->idLista}}">
                            <div class="card well text-center" >
                                <img class="card-img-top" id="icono"  src="/img/lista.png" width="100px" height="100px">
                                <div class="card-body">
                                    <h4 class="card-title"> <?php echo $lista->nombre; ?></h4>
                                      <input type="hidden" id="idlista" name="idlista" value="<?php echo $lista->idLista ?>">

                                        <div class="btn-group" role="group" aria-label="...">
                                        <a type="button" href="/administrator/file/open/<?php echo $lista->idLista ?>" class="btn btn-default"  data-toggle="tooltip" data-placement="top" title="Vista previa" target="_black">
                                            <span class="glyphicon glyphicon-eye-open"></span>
                                        </a>
                                        <a data-toggle="modal" data-target="#deleteFileModal" onclick="deleteFile({{$lista->idLista}});" class="btn btn-default" data-toggle="tooltip" data-placement="top" title="Eliminar lista">
                                            <span class="glyphicon glyphicon-trash"></span>
                                        </a>
                                        <a data-toggle="modal" data-target="#AgregarIncidentes" id="<?php echo $lista->idLista; ?>" onClick="reply_click(this.id)" class="btn btn-default" data-toggle="tooltip" data-placement="top" title="Agregar Incidencias" >
                                            <span class="glyphicon glyphicon-plus"></span>
                                        </a>
                                        <a type="button" href="/administrator/file/incidentes/<?php echo $lista->idLista ?>" class="btn btn-default"  data-toggle="tooltip" data-placement="top" title="Mostrar incidencias" target="_black">
                                            <span class="glyphicon glyphicon-alert"></span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
<?php
              }else{
?>
                        <div class="col-md-4" id="delete_{{$lista->idLista}}">
                            <div class="card well text-center" >
                                <img class="card-img-top" id="icono"  src="/img/lista.png" width="100px" height="100px">
                                <div class="card-body">
                                    <h4 class="card-title"> <?php echo $lista->nombre; ?></h4>
                                      <input type="hidden" id="idlista" name="idlista" value="<?php echo $lista->idLista ?>">

                                        <div class="btn-group" role="group" aria-label="...">
                                        <a type="button" href="/administrator/file/open/<?php echo $lista->idLista ?>" class="btn btn-default"  data-toggle="tooltip" data-placement="top" title="Vista previa" target="_black">
                                            <span class="glyphicon glyphicon-eye-open"></span>
                                        </a>
                                        <a data-toggle="modal" data-target="#deleteFileModal" onclick="deleteFile({{$lista->idLista}});" class="btn btn-default" data-toggle="tooltip" data-placement="top" title="Eliminar lista" disabled>
                                            <span class="glyphicon glyphicon-trash"></span>
                                        </a>
                                        <a data-toggle="modal" data-target="#AgregarIncidentes" id="<?php echo $lista->idLista; ?>" onClick="reply_click(this.id)" class="btn btn-default" data-toggle="tooltip" data-placement="top" title="Agregar Incidencias" >
                                            <span class="glyphicon glyphicon-plus"></span>
                                        </a>
                                        <a type="button" href="/administrator/file/incidentes/<?php echo $lista->idLista ?>" class="btn btn-default"  data-toggle="tooltip" data-placement="top" title="Mostrar incidencias" target="_black">
                                            <span class="glyphicon glyphicon-alert"></span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>


<?php
}
}else{
  ?>
                        <div class="col-md-4" id="delete_{{$lista->idLista}}">
                            <div class="card well text-center" >
                                <img class="card-img-top" id="icono"  src="/img/lista.png" width="100px" height="100px">
                                <div class="card-body">
                                    <h4 class="card-title"> <?php echo $lista->nombre; ?></h4>
                                      <input type="hidden" id="idlista" name="idlista" value="<?php echo $lista->idLista ?>">

                                        <div class="btn-group" role="group" aria-label="...">
                                        <a type="button" href="/administrator/file/open/<?php echo $lista->idLista ?>" class="btn btn-default"  data-toggle="tooltip" data-placement="top" title="Vista previa" target="_black" disabled>
                                            <span class="glyphicon glyphicon-eye-open"></span>
                                        </a>
                                        <a data-toggle="modal" data-target="#deleteFileModal" onclick="deleteFile({{$lista->idLista}});" class="btn btn-default" data-toggle="tooltip" data-placement="top" title="Eliminar lista" disabled>
                                            <span class="glyphicon glyphicon-trash"></span>
                                        </a>
                                        <a data-toggle="modal" data-target="#AgregarIncidentes" id="<?php echo $lista->idLista; ?>" onClick="reply_click(this.id)" class="btn btn-default" data-toggle="tooltip" data-placement="top" title="Agregar Incidencias" disabled>
                                            <span class="glyphicon glyphicon-plus"></span>
                                        </a>
                                        <a type="button" href="/administrator/file/incidentes/<?php echo $lista->idLista ?>" class="btn btn-default"  data-toggle="tooltip" data-placement="top" title="Mostrar incidencias" target="_black" disabled>
                                            <span class="glyphicon glyphicon-alert"></span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>


  <?php
}
            }

                      }catch (Exception $e){}
?>

<!-- FIN FOR EACH -->





<!--NO BORRAR  -->
                   <!--    <div class="col-md-3">
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
                    </div>-->
<!--hasta aqui termina el cuerpo del panel de archivos creados-->
                </div>

<hr />
          <!--  <div class="panel panel-default">
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
           </div>-->

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
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script type="text/javascript">

/*$(function(){
      $("#formuploadajax").on("submit", function(e){

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
});

          e.preventDefault();
          var f = $(this);
          var formData = new FormData($(this)[0]);


       $.ajax({
              type : 'post',
              url : '/ingresar',
              processData: false,
              contentType: false,
              data : formData,
              enctype: 'multipart/form-data',
              async:true,
              cache:false,

              beforeSend: function () { 
                $("#procesando").show();

              },
              success : function(response){
                $("#divid").load(" #divid");
                $('#nombre').val('');
                $('#archivo').val('');

                $("#procesando").hide();
              },
              error : function(error) {
                $("#procesando").hide();
                 swal({
                      title: "Información",
                      text: "Verifique la estructura de su documento",
                      type: "warning",
                      showCancelButton: true,
                      confirmButtonColor: '#DD6B55',
                      confirmButtonText: 'Continuar',
                      closeOnConfirm: true,
                   })

              }

          });
       $('#AgregarLista').hide();
      $('.modal-backdrop').hide();

     });
<<<<<<< HEAD
});*/
=======

>>>>>>> 047320a80454864d9ac2a8238aaf3c9987b4eb08


});

$(function(){
      $("#formincidentes").on("submit", function(e){

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
});
setTimeout(function(){checkData()}, 5000);
          e.preventDefault();
          var f = $(this);
          var formData = new FormData($(this)[0]);


       $.ajax({
              type : 'post',
              url : '/incidente',
              processData: false,
              contentType: false,
              data : formData,
              enctype: 'multipart/form-data',
              async:true,
              cache:false,

              beforeSend: function () { 
                $("#procesando").show();

              },
              success : function(response){

              $("#divid").load(" #divid");

                $('#nombre').val('');
                $('#archivo').val('');
                $("#procesando").hide();
     

              },
              error : function(error) {
                console.log(error);
                                $("#procesando").hide();

              }

          });
       $('#AgregarIncidentes').hide();
      $('.modal-backdrop').hide();

     };
   });
  });
  </script>

    <script>
    function limpiar()
    {
        document.getElementById("myForm").reset();
    }
        function addExclude(){
            $("#loadingExclude").removeClass('invisible');
        }

      function deleteFile(id){
 $.ajaxSetup({
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
          });
         swal({
              title: "Confirmación",
              text: "Desea eliminar esta Lista, se perdera los registros que contiene",
              type: "warning",
              showCancelButton: true,
              confirmButtonColor: '#DD6B55',
              confirmButtonText: 'Continuar',
              cancelButtonText: 'Cancelar',
              closeOnConfirm: true,
              closeOnCancel: true
           },
           function(isConfirm){
             if (isConfirm){
                        $.ajax({
              dataType : 'json',
              type : 'post',
              url : '/eliminarlista',
              data : {"id": id},
              async:true,
              cache:false,
              beforeSend: function () { 
                $("#procesando").show();

              },
              success : function(response){
                $("#procesando").hide();

                    swal({
                      title: "Información",
                      text: "Lista Eliminada",
                      type: "info",
                      confirmButtonText: 'Continuar',
                   })
                $("#divid").load(" #divid");
                //console.log(response);
              },
              error : function(error) {
                console.log(error);
                $("#procesando").hide();

              }
          });
              } else {

              }
           });
          
                 
      }

        function uploadFile(){
                    $("#loadingUploadFile").removeClass('invisible');

        }

function reply_click(clicked_id)
{
document.getElementById("idlista").value = clicked_id;
}






document.getElementById("boton").onclick = function() {myFunction()};

function myFunction(){
                      swal({
                      title: "Información",
                      text: "Tener cuidado que los nombres de los campos sean exactamente a los siguientes: \n region, ciclo, campus, tipo_ingreso, linea_negocio, modalidad, no_cuenta, nombre_general, fecha_nacimiento, direccion, correo_electronico, telefono_casa, carrera, programacv, programa_desc, semestre, vertical, es_intercambio.\n Nota: El orden no es relevante.",
                      type: "info",
                      showCancelButton: true,
                      confirmButtonColor: '#DD6B55',
                      confirmButtonText: 'Continuar',
                      closeOnConfirm: true,
                   })
        /*  Tener cuidado que los nombres de los campos sean exactamente a los siguientes:

campo1, campo2, etc.

Nota: El orden no es relevante.*/
        }
        window.onload = function() {
            $("#files").addClass('active');
        }


    </script>
@endsection
