
<?php foreach ($propias as $plantilla) { ?>
  <div class="card" id="{{$plantilla->id}}" style="background-image: url('/img/iconos/{{$plantilla->imagePath}}')">
    <div id="nombre">
          <div id="ver">
            <div  id="title">

          <h5><?php echo $plantilla->tituloEncuesta;  ?></h5>

            </div>
            </div>

    <a onclick="DuModal({{$plantilla->id}},{{$plantilla->creador}});" class="btn btn-default" data-toggle="tooltip" data-placement="top" title="Duplicar"
       id="btn_dup">
      <span class="glyphicon glyphicon-duplicate ic"></span>
    </a>


    <a href="{{url('administrator/edit')}}/{{$plantilla->id}}" id="btn_edit"
    class="btn btn-default" data-toggle="tooltip" data-placement="top" title="Editar">
        <span class="glyphicon glyphicon-edit ic"></span>
    </a>

    <a onclick="alerta({{$plantilla->id}},{{$plantilla->creador}})"
    class="btn btn-default" data-toggle="tooltip" data-placement="top" id="btn_delete"
    title="Eliminar">
    <span class="glyphicon glyphicon-trash ic"></span>
    </a>

    <a href="{{url('administrator/previewtem')}}/{{$plantilla->id}}" class="btn btn-default" target="_blank"
    id="btn_prev" title="Vista previa">
      <span class="glyphicon glyphicon-eye-open ic" ></span>
    </a>

    <a onclick="openModal({{$plantilla->id}});" class="popup-link btn btn-default"  id="btn_pub" title="Publicar" >
    <span class="glyphicon glyphicon-send ic"></span>
    </a>


    </div>

    </div>

  <!--

<div class="card" id="{{$plantilla->id}}" style="background-image: url('/img/iconos/{{$plantilla->imagePath}}'), url('/img/iconos/default.png')">

<div class="row">
          <a onclick="DuModal({{$plantilla->id}},{{$plantilla->creador}});" class="btn btn-default" data-toggle="tooltip" data-placement="top" title="Duplicar"
             id="btn_dup">
            <span class="glyphicon glyphicon-duplicate ic"></span>
          </a>


          <a href="{{url('administrator/edit')}}/{{$plantilla->id}}" id="btn_edit"
          class="btn btn-default" data-toggle="tooltip" data-placement="top" title="Editar">
              <span class="glyphicon glyphicon-edit ic"></span>
          </a>

          <a onclick="alerta({{$plantilla->id}},{{$plantilla->creador}})"
          class="btn btn-default" data-toggle="tooltip" data-placement="top" id="btn_delete"
          title="Eliminar">
          <span class="glyphicon glyphicon-trash ic"></span>
          </a>

          <a href="{{url('administrator/previewtem')}}/{{$plantilla->id}}" class="btn btn-default" target="_blank"
          id="btn_prev" title="Vista previa">
            <span class="glyphicon glyphicon-eye-open ic" ></span>
          </a>

          <a onclick="openModal({{$plantilla->id}});" class="popup-link btn btn-default"  id="btn_pub" title="Publicar" >
          <span class="glyphicon glyphicon-send ic"></span>
          </a>

</div>

<div class="row">
<div id="ver">
  </div>

  <div  id="title">
    <div id="title2">
<h5>
 <?php echo $plantilla->tituloEncuesta;  ?></h5>
     </div>
  </div>

</div>

<div class="row">

<div class="pub-icon">

</div>

</div>


</div>
 -->
<?php } ?>


<?php foreach ($agenas as $plantilla) { ?>
  <div class="card" id="{{$plantilla->id}}" style="background-image: url('/img/iconos/{{$plantilla->imagePath}}')">
    <div id="nombre">
          <div id="ver">
            <div  id="title">

          <h5><?php echo $plantilla->tituloEncuesta;  ?></h5>

            </div>
            </div>
            <a onclick="DuModal({{$plantilla->id}},{{$plantilla->creador}});" class="btn btn-default" data-toggle="tooltip" data-placement="top" title="Duplicar"
               id="btn_dup">
              <span class="glyphicon glyphicon-duplicate ic"></span>
            </a>
      <a id="btn_edit" disabled
        class="btn btn-default" data-toggle="tooltip" data-placement="top" title="Editar">
            <span class="glyphicon glyphicon-pencil ic"></span>
        </a>

        <a disabled class="btn btn-default" data-toggle="tooltip" data-placement="top" id="btn_delete"
                      title="Eliminar">
                        <span class="glyphicon glyphicon-trash"></span>
                    </a>
                    <a href="{{url('administrator/previewtem')}}/{{$plantilla->id}}" class="btn btn-default" target="_blank"
                    id="btn_prev" title="Vista previa">
                      <span class="glyphicon glyphicon-eye-open ic" ></span>
                    </a>


    <a  class="popup-link btn btn-default"  id="btn_pub" title="Publicar" disabled >
                      <span class="glyphicon glyphicon-send ic"></span>
                  </a>

    </div>

    </div>





<?php } ?>





<?php foreach ($publicadas as $plantilla) { ?>
  <div class="card" id="{{$plantilla->id}}" style="background-image: url('/img/iconos/{{$plantilla->imagePath}}')">
    <div id="nombre">
          <div id="ver">
            <div  id="title">

          <h5><?php echo $plantilla->tituloEncuesta;  ?></h5>

            </div>
            </div>
            <a onclick="DuModal({{$plantilla->id}},{{$plantilla->creador}});" class="btn btn-default" data-toggle="tooltip" data-placement="top" title="Duplicar"
               id="btn_dup">
              <span class="glyphicon glyphicon-duplicate ic"></span>
            </a>
      <a id="btn_edit" disabled
        class="btn btn-default" data-toggle="tooltip" data-placement="top" title="Editar">
            <span class="glyphicon glyphicon-pencil ic"></span>
        </a>

        <a disabled class="btn btn-default" data-toggle="tooltip" data-placement="top" id="btn_delete"
                      title="Eliminar">
                        <span class="glyphicon glyphicon-trash ic"></span>
                    </a>

        <a href="{{url('administrator/previewtem')}}/{{$plantilla->id}}" class="btn btn-default" target="_blank"
                    id="btn_prev" title="Vista previa">
                      <span class="glyphicon glyphicon-eye-open ic" ></span>
        </a>


    <a  class="popup-link btn btn-default"  id="btn_pub" title="Publicar" disabled >
                      <span class="glyphicon glyphicon-send ic"></span>
                  </a>

    </div>

    </div>


<?php } ?>
