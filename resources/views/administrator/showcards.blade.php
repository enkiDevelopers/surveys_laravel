
<?php foreach ($propias as $plantilla) { ?>
  <!--Publicaciones -->
<div class="col-md-2 card" id="{{$plantilla->id}}">

  <div class="left_buttons">
<!-- boton duplicar -->
<div class="row">
  <a onclick="DuModal({{$plantilla->id}},{{$plantilla->creador}});" class="btn btn-default" data-toggle="tooltip" data-placement="top" title="Duplicar" id="btn_dup">
                    <span class="glyphicon glyphicon-copy"></span>
              </a>
</div>
<!-- fin boton duplicar-->

<!-- boton editar -->
<div class="row">

<a href="{{url('administrator/edit')}}/{{$plantilla->id}}" id="btn_edit"
          class="btn btn-default" data-toggle="tooltip" data-placement="top" title="Editar">
              <span class="glyphicon glyphicon-pencil"></span>
          </a>
</div>
  </div>

<!-- fin boton editar -->
<!--Titulo encuesta -->
<div class="row">
  <div  id="title">
    <div id="title2">


<h4>


 <?php echo $plantilla->tituloEncuesta;  ?></h4>
     </div>
  </div>
</div>
<!--icono encuesta -->
<div class="row">
<div class="pub-icon">
  <img id="marco" class="card-img-top"
                alt="Card image cap" src="/img/iconos/<?php echo $plantilla->imagePath;?>"
                onerror="this.src='/img/iconos/default.png'">
</div>
</div>
<!--creador encuesta -->
<div class="row">
  <div class="creador">
<b><p>Creado por: <span class="template-creator"> {{$plantilla->nombre}}</span></p></b>
  </div>

</div>

<div class="right_buttons">
  <a onclick="alerta({{$plantilla->id}},{{$plantilla->creador}})"
                class="btn btn-default" data-toggle="tooltip" data-placement="top" id="btn_delete"
                title="Eliminar">
                  <span class="glyphicon glyphicon-trash"></span>
              </a>

              <a href="{{url('administrator/previewtem')}}/{{$plantilla->id}}" class="btn btn-default" target="_blank"
                id="btn_prev" title="Vista previa">
                               <span class="glyphicon glyphicon-eye-open" ></span>
                           </a>

                           <a onclick="openModal({{$plantilla->id}});" class="popup-link btn btn-default"  id="btn_pub" title="Publicar" >
                <span class="glyphicon glyphicon-send"></span>
            </a>
</div>


<!-- div termino -->
</div>

<?php } ?>
<div class="col-md-12">
<center>
  <h5><b>plantillas creadas por otros administradores</b></h5>
  </center>
<hr />
</div>
<?php foreach ($agenas as $plantilla) { ?>

  <div class="col-md-2 card" id="{{$plantilla->id}}">

    <div class="left_buttons">
  <!-- boton duplicar -->
  <div class="row">
    <a onclick="DuModal({{$plantilla->id}},{{$plantilla->creador}});" class="btn btn-default" data-toggle="tooltip" data-placement="top" title="Duplicar" id="btn_dup">
                      <span class="glyphicon glyphicon-copy"></span>
                </a>
  </div>
  <!-- fin boton duplicar-->

  <!-- boton editar -->
  <div class="row">

  <a id="btn_edit" disabled
            class="btn btn-default" data-toggle="tooltip" data-placement="top" title="Editar">
                <span class="glyphicon glyphicon-pencil"></span>
            </a>
  </div>
    </div>

  <!-- fin boton editar -->
  <!--Titulo encuesta -->
  <div class="row">
    <div  id="title">
      <div id="title2">


  <h4>
   <?php echo $plantilla->tituloEncuesta;  ?></h4>
       </div>
    </div>
  </div>
  <!--icono encuesta -->
  <div class="row">
  <div class="pub-icon">
    <img id="marco" class="card-img-top"
                  alt="Card image cap" src="/img/iconos/<?php echo $plantilla->imagePath;?>"
                  onerror="this.src='/img/iconos/default.png'">
  </div>
  </div>
  <!--creador encuesta -->
  <div class="row">
    <div class="creador">
  <b><p>Creado por: <span class="template-creator"> {{$plantilla->nombre}}</span></p></b>
    </div>

  </div>

  <div class="right_buttons">
    <a disabled class="btn btn-default" data-toggle="tooltip" data-placement="top" id="btn_delete"
                  title="Eliminar">
                    <span class="glyphicon glyphicon-trash"></span>
                </a>

                <a href="{{url('administrator/previewtem')}}/{{$plantilla->id}}" class="btn btn-default" target="_blank"
                  id="btn_prev" title="Vista previa">
                                 <span class="glyphicon glyphicon-eye-open" ></span>
                             </a>

             <a  class="popup-link btn btn-default"  id="btn_pub" title="Publicar" disabled >
                  <span class="glyphicon glyphicon-send"></span>
              </a>
  </div>


  <!-- div termino -->
  </div>





<?php } ?>



<?php foreach ($publicadas as $plantilla) { ?>

  <div class="col-md-2 card" id="{{$plantilla->id}}">

    <div class="left_buttons">
  <!-- boton duplicar -->
  <div class="row">
    <a onclick="DuModal({{$plantilla->id}},{{$plantilla->creador}});" class="btn btn-default" data-toggle="tooltip" data-placement="top" title="Duplicar" id="btn_dup">
                      <span class="glyphicon glyphicon-copy"></span>
                </a>
  </div>
  <!-- fin boton duplicar-->

  <!-- boton editar -->
  <div class="row">

  <a id="btn_edit" disabled
            class="btn btn-default" data-toggle="tooltip" data-placement="top" title="Editar">
                <span class="glyphicon glyphicon-pencil"></span>
            </a>
  </div>
    </div>

  <!-- fin boton editar -->
  <!--Titulo encuesta -->
  <div class="row">
    <div  id="title">
      <div id="title2">


  <h4>
   <?php echo $plantilla->tituloEncuesta;  ?></h4>
       </div>
    </div>
  </div>
  <!--icono encuesta -->
  <div class="row">
  <div class="pub-icon">
    <img id="marco" class="card-img-top"
                  alt="Card image cap" src="/img/iconos/<?php echo $plantilla->imagePath;?>"
                  onerror="this.src='/img/iconos/default.png'">
  </div>
  </div>
  <!--creador encuesta -->
  <div class="row">
    <div class="creador">
  <b><p>Creado por: <span class="template-creator"> {{$plantilla->nombre}}</span></p></b>
    </div>

  </div>

  <div class="right_buttons">
    <a disabled class="btn btn-default" data-toggle="tooltip" data-placement="top" id="btn_delete"
                  title="Eliminar">
                    <span class="glyphicon glyphicon-trash"></span>
                </a>

                <a href="{{url('administrator/previewtem')}}/{{$plantilla->id}}" class="btn btn-default" target="_blank"
                  id="btn_prev" title="Vista previa">
                                 <span class="glyphicon glyphicon-eye-open" ></span>
                             </a>

             <a  class="popup-link btn btn-default"  id="btn_pub" title="Publicar" disabled >
                  <span class="glyphicon glyphicon-send"></span>
              </a>
  </div>


  <!-- div termino -->
  </div>
<?php } ?>
