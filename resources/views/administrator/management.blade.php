@extends('layouts.admin')
@section('content')

<link rel="stylesheet" href="/css/normalize.css">
<link rel="stylesheet" href="/css/style.css">


<div class="procesando" id="procesando" >
</div>

<div class=" container">
  <div class="row">
      <div class="col-sm-12">
        <div class="header ">Administradores registrados
  <a  class="btn btn-primary" data-toggle="modal" data-target="#administrador">Añadir</a>
        </div>

         <table cellspacing="0">
            <tr>
               <th class="text-center">Imagen</th>
               <th class="text-center">Nombre</th>
               <th class="text-center">E-mail</th>
               <th class="text-center" width="230">Acciones</th>
            </tr>

            <?php foreach ($usuarios as $usuario) { ?>
              <tr>
                  <td class="text-center"><img src="/img/avatar/{{$usuario->imagenPerfil}}"></td>
                 <td class="text-center">{{$usuario->nombre}}</td>
                 <td class="text-center"> {{$usuario->email}}</td>
                <td class="text-center" width="230">
                  <center>
<div class="col-md-6">
  <a onclick="eliminar({{$usuario->idUsuario}});">
 <span class="glyphicon glyphicon-remove"></span>
 </a>
</div>

<div class="col-md-6">
  <a onclick="decrypt({{$usuario->idUsuario}})">
  <span class="glyphicon glyphicon-lock"></span>
  </a>

</div>

               </center>
      </td>
              </tr>



          <?php  } ?>
         </table>
      </div>
    </div>







    <div class="row">
        <div class="col-sm-12">
          <div class="header ">Directivos registrados
            <a  class="btn btn-primary" data-toggle="modal" data-target="#directivos">Añadir</a>
          </div>

           <table cellspacing="0">
              <tr>
                 <th class="text-center">Imagen</th>
                 <th class="text-center">Nombre</th>
                 <th class="text-center">E-mail</th>
                 <th class="text-center" width="230">Acciones</th>
              </tr>

              <?php foreach ($directivos as $directivo) { ?>
                <tr>
                    <td class="text-center"><img src="/img/avatar/{{$directivo->imagenPerfil}}"></td>
                   <td class="text-center">{{$directivo->nombre}}</td>
                   <td class="text-center"> {{$directivo->email}}</td>
                  <td class="text-center" width="230">
                    <center>

                      <div class="col-md-6">
                        <a onclick="decrypt({{$directivo->idUsuario}});">
                        <span class="glyphicon glyphicon-lock"></span>
                        </a>

<div class="col-md-6">
  <a onclick="eliminar({{$directivo->idUsuario}});">
 <span class="glyphicon glyphicon-remove"></span>
 </a>
</div>






                 </div>
                 </center>
        </td>
                </tr>



            <?php  } ?>
           </table>
        </div>
      </div>



      <div class="modal" role="dialog" id="administrador" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Registrar Administrador</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="limpiar();">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
                  <form id="adminForm" onsubmit="return send();">
            <div class="modal-body">

                <input type="hidden" value="{{$id}}"  id="addBy"/>
<div class="container" style="margin-left: 0; position:relative; width: 100%;">
          <div class="form-group">
              <label for="nombre">Nombre(s)</label>
              <input type="text" name="nombre" id="nombre" class="form-control"  required/>
            </div>

      <div class="form-group">
          <label for="aPaterno">Apellido Paterno</label>
          <input type="text" name="aPaterno" id="aPaterno" class="form-control" required  />
  </div>

  <div class="form-group">
      <label for="aMaterno">Apellido Materno</label>
      <input type="text" name="aMaterno" class="form-control" id="aMaterno" required />
</div>

<div class="form-group">
    <label for="correo">Coreo</label>
    <input type="email" name="email" class="form-control" id="correo" required />
</div>

</div>


            </div>
            <div class="modal-footer">
              <button onclick="limpiar();" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
              <button type="submit" class="btn btn-primary">Registrar</button>
            </div>
                </form>
          </div>
        </div>
      </div>

<!--Directivos -->
      <div class="modal fade bd-example-modal-lg" role="dialog" id="directivos" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Registrar Directivos</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="limpiar2();">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
                  <form id="directForm" onsubmit="return send2();">
            <div class="modal-body">
                <input type="hidden" value="{{$id}}"  id="addBy"/>
                <div class="container" style="margin-left: 0; position:relative; width: 100%;">
          <div class="form-group col-md-6">
              <label for="dNombre">Nombre(s)</label>
              <input type="text" name="dNombre" id="dNombre" class="form-control"  required/>
            </div>

      <div class="form-group col-md-6">
          <label for="daPaterno">Apellido Paterno</label>
          <input type="text" name="daPaterno" id="daPaterno" class="form-control" required  />
  </div>

  <div class="form-group col-md-6">
      <label for="daMaterno">Apellido Materno</label>
      <input type="text" name="daMaterno" class="form-control" id="daMaterno" required />
</div>

<div class="form-group col-md-6">
    <label for="correo">Coreo</label>
    <input type="email" name="demail" class="form-control" id="dCorreo" required />
</div>

<div class="form-group">
    <label for="tipo">Tipo</label>
    <select name="tipo" required id="tipo" class="form-control text-black-body" onchange="sRegs();">
      <option value="1">Directivo corporativo</option>
      <option value="2">Directivo regional</option>
      <option value="3">Directivo campus</option>
    </select>
</div>

<div class="form-group" id="dregion" style="display:none;">
    <label for="tipo">Región</label>
    <select name="regiones"  id="regiones" class="form-control text-black-body">
          <?php
          foreach ($regiones as $region) {?>
            <option value="E" hidden>    </option>
        <option value="{{$region->regions_id}}" > <?php echo $region->regions_name; ?>  </option>

            <?php
          }
          ?>
    </select>
</div>

<div class="form-group" id="dCamp" style="display:none;">
    <label for="tipo">Campus</label>
    <select name="campus"  id="campus" class="form-control text-black-body">
        <option value="E" hidden>    </option>
          <?php
          foreach ($campus as $campus) {?>
        <option value="{{$campus->campus_id}}" > <?php echo $campus->campus_name; ?>  </option>
            <?php
          }
          ?>
    </select>
</div>


</div>
            </div>
            <div class="modal-footer">
              <button onclick="limpiar2();" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
              <button type="submit" class="btn btn-primary">Registrar</button>
            </div>
                </form>
          </div>
        </div>
      </div>



</div>



<script>

    window.onload = function() {
        $("#admin-list").addClass('active');
    }



    function send()
    {
      event.preventDefault();
      var id = $("#addBy").val();
      var nombre = $("#nombre").val();
      var aPaterno = $("#aPaterno").val();
      var aMaterno = $("#aMaterno").val();
      var correo = $("#correo").val();

      $.ajax({
      url: "/administrator/addAdmin",
      type: 'POST',
      headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
      datatype: "json",
      data:{
            addby:id,
            nombre:nombre,
            aPaterno:aPaterno,
            aMaterno:aMaterno,
            correo:correo
      },
      beforeSend: function(){
        $("#procesando").show();
      },
      success: function( sms ) {

        swal({
           title: "Administrador agregado",
           text: "",
           type: "success",
            });

          document.getElementById("adminForm").reset();
          $('#administrador').modal('hide');
            location.reload();
          },error: function(result) {
            $("#procesando").hide();
            swal({
               title: "Error",
               text: "",
               type: "warning",
                });
                }
      });

    }


    function send2()
    {
      event.preventDefault();
      var id = $("#addBy").val();
      var nombre = $("#dNombre").val();
      var aPaterno = $("#daPaterno").val();
      var aMaterno = $("#daMaterno").val();
      var correo = $("#dCorreo").val();
      var tipos = $("#tipo").val();
      var regiones = $("#regiones").val();
      var campus = $("campus").val();

      $.ajax({
      url: "/administrator/saveDirective",
      type: 'POST',
      headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
      datatype: "json",
      data:{
            addby:id,
            nombre:nombre,
            aPaterno:aPaterno,
            aMaterno:aMaterno,
            correo:correo,
            tipos:tipos,
            regiones:regiones,
            campus:campus
      },
      beforeSend: function(){
        $("#procesando").show();
      },
      success: function( sms ) {

        swal({
           title: "Directivo agregado",
           text: "",
           type: "success",
            });

          document.getElementById("directForm").reset();
          $('#directivos').modal('hide');
            location.reload();
          },error: function(result) {
            $("#procesando").hide();
            swal({
               title: "Error",
               text: "",
               type: "warning",
                });
                }
      });

    }







      function sRegs()
      {
          var tipo = $("#tipo").val();
          if(tipo==2)
          {
            $("#dregion").show();
            $("#dCamp").hide();
          }
          else if (tipo==3) {
            $("#dregion").hide();
            $("#dCamp").show();
          }else if (tipo==1) {
            $("#dregion").hide();
            $("#dCamp").hide();
          }






      }

      function limpiar()
      {
        document.getElementById("adminForm").reset();
      }

      function limpiar2()
      {
        document.getElementById("directForm").reset();
      }


    function eliminar(id)
    {

      swal({
      title: "¿Seguro que deseas continuar?",
      text: "No podrás deshacer este paso.",
      type: "warning",
      showCancelButton: true,
      cancelButtonText: "Cancelar",
      confirmButtonColor: "#DD6B55",
      confirmButtonText: "Eliminar",
      closeOnConfirm: true },
      function(){
        $("#procesando").show();

        $.ajax({
        url: "/administrator/deleteAdmin",
        type: 'POST',
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        datatype: "json",
        data:{
              id:id,
        },
        beforeSend: function(){
          $("#procesando").show();
        },
        success: function( sms ) {

          swal({
             title: "Usuario Eliminado",
             text: "",
             type: "success",
              });

              location.reload();
            },error: function(result) {
              $("#procesando").hide();
              swal({
                 title: "Error",
                 text: "",
                 type: "warning",
                  });
                  }
        });

      });


    }


function decrypt(id)
{

  swal({
  title: "¿Desea ver la contraseña de este usuario?",
  text: "",
  type: "warning",
  showCancelButton: true,
  cancelButtonText: "Cancelar",
  confirmButtonColor: "#DD6B55",
  confirmButtonText: "Ver",
  closeOnConfirm: true },
  function(){
    $("#procesando").show();
    $.ajax({
    url: "/administrator/decrypt",
    type: 'GET',
    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
    datatype: "json",
    data:{
          id:id
    },
    beforeSend: function(){
      $("#procesando").show();
    },
    success: function( sms ) {

      swal({
         title: "La contraseña es",
         text:  sms["sms"],
         type: "success",
          });
          $("#procesando").hide();
        },error: function(jqXHR, textStatus, errorThrown) {
          $("#procesando").hide();
          swal({
             title: "Error",
             text: jqXHR.status +" "+  errorThrown,
             type: "warning",
              });
              }
    });

  });

}

</script>

@endsection
