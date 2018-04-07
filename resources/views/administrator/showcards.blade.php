
<?php foreach ($propias as $plantilla) { ?>

  <div class="col-md-3 col-md-offset-3 text-center cont" id="{{$plantilla->id}}">
    <div class="title">
<h5><?php echo $plantilla->tituloEncuesta;  ?></h5>
    </div>
  <div class="btnC">

    <a href="{{url('administrator/edit')}}/{{$plantilla->id}}"
        class="btn btn-icon text-center " data-toggle="tooltip" data-placement="top" title="Editar">
      <span class="glyphicon glyphicon-edit "></span>
    </a>
    <a class="btn btn-icon text-center" onclick="DuModal({{$plantilla->id}},{{$plantilla->creador}});"
        data-toggle="tooltip" data-placement="top" title="Duplicar"
      >
      <span class="glyphicon glyphicon-duplicate"></span>
    </a>


    <a class="btn btn-icon text-center" onclick="alerta({{$plantilla->id}},{{$plantilla->creador}})"
     data-toggle="tooltip" data-placement="top"
    title="Eliminar">
    <span class="glyphicon glyphicon-trash "></span>
    </a>

    <a href="{{url('administrator/previewtem')}}/{{$plantilla->id}}"  target="_blank"
     title="Vista previa" class="btn btn-icon text-center">
      <span class="glyphicon glyphicon-eye-open" ></span>
    </a>

    <a onclick="openModal({{$plantilla->id}});" class="popup-link btn btn-icon text-center" title="Publicar" >
    <span class="glyphicon glyphicon-send"></span>
    </a>


  </div>

  				<div class="horizontal">
  		<div class="vertical">
  			<img src="/img/iconos/{{$plantilla->imagePath}}" class="img-responsive center-block img"
  			  onerror="this.src='/img/iconos/default.png';"/>
  		</div>
  	</div>


  				</div>

<?php } ?>


<div class="col-md-12 text-center">
    <hr style="height: 2px; background-color: black;"/>
  <h3>Plantillas de otros administradores </h3>
    <hr style="height: 2px; background-color: black;"/>
</div>


<?php foreach ($agenas as $plantilla) { ?>


  <div class="col-md-3 col-md-offset-3 text-center cont" id="{{$plantilla->id}}">
    <div class="title">
  <h5><?php echo $plantilla->tituloEncuesta;  ?></h5>
    </div>
  <div class="btnC">

    <a disabled
        class="btn btn-icon text-center " data-toggle="tooltip" data-placement="top" title="Editar">
      <span class="glyphicon glyphicon-edit "></span>
    </a>
    <a class="btn btn-icon text-center" onclick="DuModal({{$plantilla->id}},{{$id}});"
        data-toggle="tooltip" data-placement="top" title="Duplicar"
      >
      <span class="glyphicon glyphicon-duplicate"></span>
    </a>


    <a class="btn btn-icon text-center" disabled
     data-toggle="tooltip" data-placement="top"
    title="Eliminar">
    <span class="glyphicon glyphicon-trash "></span>
    </a>

    <a href="{{url('administrator/previewtem')}}/{{$plantilla->id}}"  target="_blank"
     title="Vista previa" class="btn btn-icon text-center">
      <span class="glyphicon glyphicon-eye-open" ></span>
    </a>

    <a  disabled   class="popup-link btn btn-icon text-center" title="Publicar" >
    <span class="glyphicon glyphicon-send"></span>
    </a>


  </div>

          <div class="horizontal">
      <div class="vertical">
        <img src="/img/iconos/{{$plantilla->imagePath}}" class="img-responsive center-block img"
          onerror="this.src='/img/iconos/default.png';"/>
      </div>
    </div>


          </div>









<?php } ?>


<div class="col-md-12 text-center">
  <hr style="height: 2px; background-color: black;"/>
  <h3>Plantillas Publicadas </h3>
  <hr style="height: 2px; background-color: black;"/>
</div>



<?php foreach ($publicadas as $plantilla) { ?>

  <div class="col-md-3 col-md-offset-3 text-center cont" id="{{$plantilla->id}}">
    <div class="title">
  <h5><?php echo $plantilla->tituloEncuesta;  ?></h5>
    </div>
  <div class="btnC">

    <a disabled
        class="btn btn-icon text-center " data-toggle="tooltip" data-placement="top" title="Editar">
      <span class="glyphicon glyphicon-edit "></span>
    </a>
    <a class="btn btn-icon text-center" onclick="DuModal({{$plantilla->id}},{{$id}});"
        data-toggle="tooltip" data-placement="top" title="Duplicar"
      >
      <span class="glyphicon glyphicon-duplicate"></span>
    </a>


    <a class="btn btn-icon text-center" disabled
     data-toggle="tooltip" data-placement="top"
    title="Eliminar">
    <span class="glyphicon glyphicon-trash "></span>
    </a>

    <a href="{{url('administrator/previewtem')}}/{{$plantilla->id}}"  target="_blank"
     title="Vista previa" class="btn btn-icon text-center">
      <span class="glyphicon glyphicon-eye-open" ></span>
    </a>

    <a  disabled   class="popup-link btn btn-icon text-center" title="Publicar" >
    <span class="glyphicon glyphicon-send"></span>
    </a>


  </div>

          <div class="horizontal">
      <div class="vertical">
        <img src="/img/iconos/{{$plantilla->imagePath}}" class="img-responsive center-block img"
          onerror="this.src='/img/iconos/default.png';"/>
      </div>
    </div>


          </div>












<?php } ?>
