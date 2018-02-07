@extends('layouts.admin')
@section('content')

<link rel="stylesheet" href="/css/normalize.css">
<link rel="stylesheet" href="/css/style.css">
<div class=" container">
  <div class="row">
      <div class="col-sm-12">
        <div class="header ">Administradores registrados
          <a href="#popup" class="popup-link btn btn-primary">Añadir</a>
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
                <a href="#">
               <span class="glyphicon glyphicon-remove"></span>
               </a>
               </center>
      </td>
              </tr>



          <?php  } ?>




         </table>
      </div>

      <div class="modal-wrapper" id="popup">
         <div class="popup-contenedor">


           <form class="form-horizontal">
               <div class="form-group">
                   <label for="inputEmail3" class="col-sm-2 control-label">Nombre</label>
                   <div class="col-sm-10">
                       <input type="text" class="form-control" id="inputEmail3" placeholder="Nombre">
                   </div>
               </div>
               <div class="form-group">
                   <label for="inputEmail3" class="col-sm-2 control-label">Apellido</label>
                   <div class="col-sm-10">
                       <input type="text" class="form-control" id="inputEmail3" placeholder="Apellido">
                   </div>
               </div>
               <div class="form-group">
                   <label for="inputEmail3" class="col-sm-2 control-label">Correo</label>
                   <div class="col-sm-10">
                       <input type="email" class="form-control" id="inputEmail3" placeholder="Correo">
                   </div>
               </div>
           <br>
               <div class="form-group col-md-12">
                   <div class="col-sm-1  pull-right" >
                   <button type="submit" class="btn btn-info">Registrar</button>
                   </div>
               </div>
           </form>



            <a class="popup-cerrar" href="#">X</a>



         </div>
      </div>
    </div>
</div>








<script>

    window.onload = function() {
        $("#admin-list").addClass('active');
    }
</script>

@endsection
