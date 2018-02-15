@extends('layouts.admin')
@section('content')
<script src="/js/homeAdministrator.js"></script>
<div class="container">
  <div class="row">
    <div class="col-md-11 col-md-offset-1">
      <div class="row">
        <div >
          <img href="#" src="/img/avatar/default.png" class="img-thumbnail img-principal img-responsive" data-toggle="modal" data-target="#editarImagen" data-keyboard="false" data-backdrop="static">
        </div>
      </div>
      <div>
        <label for="name">Nombre: </label><br>
        <label> Rafael Alberto Martínez Méndez</label><br><br>
        <label for="email">Correo: </label><br>
        <label>Administrador@gmail.com</label><br><br>
        <label for="cellphone">Telefono: </label><br>
        <label>04489798128</label>
      </div>
    </div>
  </div>
</div>


<!-- ##################################  Modal editar Imagen perfil ################################## -->
<div class="modal fade" id="editarImagen"  role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <form id="updateImageProfile">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h5 class="modal-title" id="exampleModalLongTitle">Cambiar imagen de perfil</h5>
      </div>
      <div class="modal-body">
        <label class="btn btn-info btn-file" for="imageInput">
           Actualice su imagen <input type="file" name="imageInput" onchange="return ShowImagePreview( this.files );" name="icon_survey" onclick="limpiar2();">
        </label><br><br>
        <div id="previewcanvascontainer" style="height 200px; width 200px;display: none;">
          <canvas id="previewcanvas"></canvas>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary"  onclick="limpiar()" data-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btn-primary" >Actualizar</button>
      </div>
    </div>
    </form>
  </div>
</div>

@endsection
