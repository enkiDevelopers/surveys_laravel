@extends('layouts.admin')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-11 col-md-offset-1">
<div class="row">
  <div >
      <img src="/img/avatar/default.png"  class="img-thumbnail img-principal  img-responsive">
      <a href=""  data-toggle="modal" data-target="#editarImagen" class="glyphicon glyphicon-pencil editarImagen" data-keyboard="false" data-backdrop="static" >
      </a>
  </div>
</div>
            <div>
                <label for="name">Nombre: </label><br>
                <label for=""> Rafael Alberto Martínez Méndez</label><br><br>
                <label for="email">Correo: </label><br>
                <label for="">Administrador@gmail.com</label><br><br>
                <label for="cellphone">Telefono: </label><br>
                <label for="">04489798128</label>
            </div>
        </div>
    </div>
</div>


<!-- #############################################################  Modal editar Imagen perfil #####################################3-->


<div class="modal fade" id="editarImagen"  role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
<form id="cambioImagen">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Cambiar imagen de perfil</h5>
        <button type="button" class="close" onclick="borrar();" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <label for="imageInput">Seleccione una imagen</label>
        <input type="file" name="imageInput" value="">

      </div>
      <div class="modal-footer">
        <button type="button" onclick="borrar();"class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" onclick="borrar();">Save changes</button>
      </div>
    </div>
    </form>
  </div>
</div>

<script>
function borrar() {
    document.getElementById("cambioImagen").reset();
}

</script>








@endsection
