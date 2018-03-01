
<?php foreach ($propias as $plantilla) { ?>
  <!--Publicaciones -->
<div class="col-md-2 card" id="{{$plantilla->id}}" style="background-image: url('/img/iconos/{{$plantilla->imagePath}}'), url('/img/iconos/default.png')">

  <div class="left_buttons">
<!-- boton duplicar -->
<div class="row">
  <a onclick="DuModal({{$plantilla->id}},{{$plantilla->creador}});" class="btn btn-default" data-toggle="tooltip" data-placement="top" title="Duplicar" id="btn_dup">
                    <span class="glyphicon glyphicon-duplicate"></span>
              </a>
</div>
<!-- fin boton duplicar-->

<!-- boton editar -->
<div class="row">

<a href="{{url('administrator/edit')}}/{{$plantilla->id}}" id="btn_edit"
          class="btn btn-default" data-toggle="tooltip" data-placement="top" title="Editar">
              <span class="glyphicon glyphicon-edit"></span>
          </a>
</div>
  </div>

<!-- fin boton editar -->
<!--Titulo encuesta -->
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
<!--icono encuesta -->
<div class="row">

<div class="pub-icon">

</div>

</div>
<!--creador encuesta -->
<div class="row">

  <div id="ver2">
    </div>

    <div  id="title">
      <div id="title2">
  <h5>
   <?php echo $plantilla->nombre;  ?></h5>
       </div>
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


<?php foreach ($agenas as $plantilla) { ?>

  <div class="col-md-2 card" id="{{$plantilla->id}}" style="background-image: url('/img/iconos/{{$plantilla->imagePath}}'), url('/img/iconos/default.png')">

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


  </div>
  </div>
  <!--creador encuesta -->
  <div class="row">


    <div id="ver2">
      </div>

      <div  id="title">
        <div id="title2">
    <h5>
     <?php echo $plantilla->nombre;  ?></h5>
         </div>
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

  <div class="col-md-2 card" id="{{$plantilla->id}}" style="background-image: url('/img/iconos/{{$plantilla->imagePath}}'), url('/img/iconos/default.png')">

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
    <div id="ver">

    </div>
    <div  id="title">
      <div id="title2">


  <h5>
   <?php echo $plantilla->tituloEncuesta;  ?></h5>
       </div>
    </div>
  </div>
  <!--icono encuesta -->
  <div class="row">
  <div class="pub-icon">

  </div>
  </div>
  <!--creador encuesta -->
  <div class="row">
    <div id="ver2">
      </div>

      <div  id="title">
        <div id="title2">
    <h5>
     <?php echo $plantilla->nombre;  ?></h5>
         </div>
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
