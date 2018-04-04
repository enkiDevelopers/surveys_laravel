
<?php foreach ($propias as $plantilla) { ?>
  <div class="col-md-3 col-md-offset-3 text-center cont" >
  <div class="btnC">
  		<div class="btnIcon" style="margin-left: 2%;">
  				</div>
  		<div class="btnIcon">
  		</div>

  		<div class="btnIcon">
  		</div>
  		<div class="btnIcon">
  		</div>
  		<div class="btnIcon" style="margin-right: 0%;">
  		</div>
  </div>

  				<div class="horizontal">
  		<div class="vertical">
  			<img src="/img/iconos/{{$plantilla->imagePath}}" class="img-responsive center-block img"
  			  onerror="this.src='/img/iconos/default.png';"/>
  		</div>
  	</div>

  	<div class="title">

  	</div>
  				</div>


<!--

  <div class="card" id="{{$plantilla->id}}"
     style="
     <?php
     $nombre_fichero = './img/iconos/'.$plantilla->imagePath;

     if (file_exists($nombre_fichero)) {
     echo "background-image: url('/img/iconos/$plantilla->imagePath');";
     } else {
     echo "background-image: url('/img/iconos/default.png');";
     }
     ?> "


     >
    <div id="nombre">


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

    <div id="ver">
      <div  id="title">

    <h5><?php echo $plantilla->tituloEncuesta;  ?></h5>

      </div>
      </div>

    </div>

    </div>
-->
<?php } ?>


<?php foreach ($agenas as $plantilla) { ?>
  <div class="card" id="{{$plantilla->id}}"
    style="
    <?php
    $nombre_fichero = './img/iconos/'.$plantilla->imagePath;

    if (file_exists($nombre_fichero)) {
    echo "background-image: url('/img/iconos/$plantilla->imagePath');";
    } else {
    echo "background-image: url('/img/iconos/default.png');";
    }
    ?>" >
    <div id="nombre">

            <a onclick="DuModal({{$plantilla->id}},{{$plantilla->creador}});" class="btn btn-default" data-toggle="tooltip" data-placement="top" title="Duplicar"
               id="btn_dup">
              <span class="glyphicon glyphicon-duplicate ic"></span>
            </a>
      <a id="btn_edit" disabled
        class="btn btn-default" data-toggle="tooltip" data-placement="top" title="Editar">
            <span class="glyphicon glyphicon-edit ic"></span>
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

                  <div id="ver">
                    <div  id="title">

                  <h5><?php echo $plantilla->tituloEncuesta;  ?></h5>

                    </div>
                    </div>

    </div>

    </div>





<?php } ?>





<?php foreach ($publicadas as $plantilla) { ?>
  <div class="card" id="{{$plantilla->id}}"  style="
   <?php
   $nombre_fichero = './img/iconos/'.$plantilla->imagePath;

   if (file_exists($nombre_fichero)) {
   echo "background-image: url('/img/iconos/$plantilla->imagePath');";
   } else {
   echo "background-image: url('/img/iconos/default.png');";
   }
   ?>">
    <div id="nombre">

            <a onclick="DuModal({{$plantilla->id}},{{$plantilla->creador}});" class="btn btn-default" data-toggle="tooltip" data-placement="top" title="Duplicar"
               id="btn_dup">
              <span class="glyphicon glyphicon-duplicate ic"></span>
            </a>
      <a id="btn_edit" disabled
        class="btn btn-default" data-toggle="tooltip" data-placement="top" title="Editar">
            <span class="glyphicon glyphicon-edit ic"></span>
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


                  <div id="ver">
                    <div  id="title">

                  <h5><?php echo $plantilla->tituloEncuesta;  ?></h5>

                    </div>
                    </div>
    </div>

    </div>


<?php } ?>
