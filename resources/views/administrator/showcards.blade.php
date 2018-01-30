<?php foreach ($propias as $plantilla) { ?>
<div class="col-md-4" id="{{$plantilla->id}}">
   <div class="card well" >
            <div class="card-body">
               <div class="col-md-2" id="resposiveCard">

              <img id="marco" class="card-img-top"
              width="100px" height="100px"
              alt="Card image cap" src="/img/iconos/<?php echo $plantilla->imagePath;?>"
              onerror="this.src='/img/iconos/default.png'">

              </div>
              <div class="col-md-3">

              </div>
               <div class="col-md-2">
           <div class="titleA">
           <h4 class="card-title"  >  <?php echo $plantilla->tituloEncuesta;  ?></h4>
           </div>
           <div class="">
           <p class="card-text responsiveText">Creada por <span class="template-creator"> {{$plantilla->Nombre}}</span></p></div>
         </div>

           <div class="btn-group centrarbtn" role="group" aria-label="...">
               <a href="{{url('administrator/previewtem')}}/{{$plantilla->id}}" class="btn btn-default"  data-toggle="tooltip" data-placement="top" title="Vista previa">
                   <span class="glyphicon glyphicon-eye-open" ></span>
               </a>
                 <a href="{{url('administrator/edit')}}/{{$plantilla->id}}"
               class="btn btn-default" data-toggle="tooltip" data-placement="top" title="Editar">

                   <span class="glyphicon glyphicon-pencil"></span>
               </a>
               <a onclick="alerta({{$plantilla->id}},{{$plantilla->creador}})"
                 class="btn btn-default" data-toggle="tooltip" data-placement="top"
                 title="Eliminar">
                   <span class="glyphicon glyphicon-trash"></span>
               </a>
             <a onclick="DuModal({{$plantilla->id}},{{$plantilla->creador}});" class="btn btn-default" data-toggle="tooltip" data-placement="top" title="Duplicar">
                   <span class="glyphicon glyphicon-copy"></span>
             </a>

               <a onclick="openModal({{$plantilla->id}});" class="popup-link btn btn-default"  data-placement="top" title="Publicar">
                   <span class="glyphicon glyphicon-send"></span>
               </a>

           </div>
       </div>
   </div>
</div>

<?php } ?>

<?php foreach ($agenas as $plantilla) { ?>
<div class="col-md-4" id="{{$plantilla->id}}">
<div class="card well" >
<div class="card-body">
<div class="col-md-2" id="resposiveCard">

<img id="marco" class="card-img-top"
width="100px" height="100px"
alt="Card image cap" src="/img/iconos/<?php echo $plantilla->imagePath;?>"
onerror="this.src='/img/iconos/default.png'">

</div>
<div class="col-md-3">

</div>
<div class="col-md-2">
<div class="titleA">
<h4 class="card-title"  >  <?php echo $plantilla->tituloEncuesta;  ?></h4>
</div>
<div class="">
<p class="card-text responsiveText">Creada por <span class="template-creator"> {{$plantilla->Nombre}}</span></p></div>
</div>
<div class="btn-group centrarbtn" role="group" aria-label="...">
  <a href="href="{{url('administrator/previewtem')}}/{{$plantilla->id}}"" class="btn btn-default"  data-toggle="tooltip" data-placement="top" title="Vista previa">
      <span class="glyphicon glyphicon-eye-open" ></span>
  </a>
<a
class="btn btn-default" data-toggle="tooltip" data-placement="top" title="Editar" disabled>
<span class="glyphicon glyphicon-pencil"></span>
</a>
<a
class="btn btn-default" data-toggle="tooltip" data-placement="top"
title="Eliminar" disabled>
<span class="glyphicon glyphicon-trash"></span>
</a>

<a onclick="DuModal({{$plantilla->id}},{{$id}});" class="btn btn-default" data-toggle="tooltip" data-placement="top" title="Duplicar">
<span class="glyphicon glyphicon-copy"></span>
</a>

<button type="button" class="btn btn-default" data-toggle="tooltip" data-placement="top" title="Publicar" disabled>
<span class="glyphicon glyphicon-send"></span>
</button>

</div>
</div>
</div>
</div>

<?php } ?>
