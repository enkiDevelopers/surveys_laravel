@extends('layouts.admin')
@section('content')

  <link rel="stylesheet" href="/css/surveys.css">
  <link href="css/input/fileinput.min.css" media="all" rel="stylesheet" type="text/css" />
  <script src="/js/input/jquery-3.2.1.min.js"></script>
  <script src="/js/input/piexif.min.js" type="text/javascript"></script>
  <script src="/js/input/sortable.min.js" type="text/javascript"></script>
  <script src="/js/input/purify.min.js" type="text/javascript"></script>
  <script src="/js/input/popper.min.js"></script>
  <script src="/js/input/bootstrap.min.js" type="text/javascript"></script>
  <script src="/js/input/fileinput.min.js"></script>
  <script src="/js/input/es.js"></script>

<script src="/js/homeAdministrator.js"></script>
<div class="container">
  <div class="row">
    <div class="col-md-11 col-md-offset-1 col-infoUser">
      <div class="row">
          <div class="col-md-11 col-md-offset-3">
            <div class="col-md-1">
            <img  src="/img/avatar/{{$info->imagenPerfil}}" class="img-thumbnail circle img-principal img-responsive" data-toggle="modal" data-target="#editarImagen" data-keyboard="false" data-backdrop="static"
          style="cursor: pointer;">
            </div>
            <div class="col-md-5 infoUser">
              <span class="glyphicon glyphicon-cog pull-left" style="padding-left: 100px;"></span>
              <label style="padding-top: -10px">{{$info->nombre}} {{$info->apPaterno}} {{$info->apMaterno}}</label>   
              <label>{{$info->email}}</label>
            </div>
          </div>
      </div>
    </div>
  </div>
</div>


<!-- ##################################  Modal editar Imagen perfil ################################## -->
<div class="modal fade" id="editarImagen"  role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="limpiar();">
          <span aria-hidden="true">&times;</span>
        </button>
        <h5 class="modal-title" id="exampleModalLongTitle">Cambiar imagen de perfil</h5>
      </div>
      <div class="modal-body">
<form enctype="multipart/form-data"method="post" id="actualizar" action="/uploadimage">
    {{ csrf_field() }}
    <label class="btn btn-info btn-file">
        Seleccione su imagen
        <input type="file" id="file-input" name="file-input" >
    </label>
      <br />
<br />
<br />

      <img id="imgSalida" width="200px" height="200px" src="/img/avatar/{{$info->imagenPerfil}}"/>
      <br />
      <br />

      <div class="modal-footer">
        <input type="reset" data-dismiss="modal" class="btn btn-warning" onclick="limpiar();" value="Cancelar"/>
        <input type="submit" class="btn btn-success" value="Cambiar" />
      </div>

</form>
      </div>

    </div>
  </div>
</div>

<script>
  function limpiar(){
        document.getElementById("actualizar").reset();
        $('#imgSalida').attr("src","/img/avatar/{{$info->imagenPerfil}}");
    }
  imagen();
</script>



@endsection
