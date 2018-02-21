<?php foreach ($actuales as $publicacion) {
if($publicacion->creador == $id)
{
  ?>
  <!--Publicaciones -->
<div class="col-md-2 card" id="{{$publicacion->idPub}}">
  <div class="left_buttons">
<!-- boton duplicar -->
<div class="row">

  </div>
<!-- fin boton duplicar-->

<!-- boton editar -->
<div class="row">

</div>
  </div>

<!-- fin boton editar -->
<!--Titulo encuesta -->
<div class="row">
  <div  id="title">
    <div id="title2">
<h4> <?php echo $publicacion->tituloEncuesta;  ?></h4>
     </div>
  </div>
</div>
<!--icono encuesta -->
<div class="row">
<div class="pub-icon">
  <img class="card-img-top" id="marco" src="/img/iconos/<?php echo $publicacion->imagePath;?>"
  width="100px" height="100px" onerror="this.src='/img/iconos/default.png'"
  >
</div>
</div>
<!--creador encuesta -->
<div class="row">


</div>

<div class="right_buttons">
        <div class="pull-right survey-status survey-status__active">&nbsp</div>

              <a id="btn_prevPub" target="_blank" href="{{ url('/administrator/previewtem') }}/{{$publicacion->idTemplate}}" type="button" class="btn btn-default"  data-toggle="tooltip" data-placement="top" title="Vista previa">
                                <span class="glyphicon glyphicon-eye-open"></span>
                            </a>

    <a id="btn_rec" onclick="reminder({{$publicacion->idPub}})" class="btn btn-default"  data-toggle="tooltip" data-placement="top" title="Enviar recordatorio">
    <span class="glyphicon glyphicon-time"></span>
    </a>
</div>


<!-- div termino -->
</div>

<!--Termina

  <div class="col-md-3 modificar" id="{{$publicacion->idPub}}">
      <div class="card well" id="cartaPub">
<img class="card-img-top" id="marco" src="/img/iconos/<?php echo $publicacion->imagePath;?>"
width="100px" height="100px" onerror="this.src='/img/iconos/default.png'"
>
          <div class="card-body">
              <h4 class="titleA">{{$publicacion->tituloEncuesta}}</h4>
              <p class="card-text"></p>
             <div class="btn-group " role="group" aria-label="...">
    <a target="_blank" href="{{ url('/administrator/previewtem') }}/{{$publicacion->idTemplate}}" type="button" class="btn btn-default"  data-toggle="tooltip" data-placement="top" title="Vista previa">
                      <span class="glyphicon glyphicon-eye-open"></span>
                  </a>
              </div>
              <div class="btn-group " role="group" aria-label="...">
                   <a  onclick="reminder({{$publicacion->idPub}})" class="btn btn-default"  data-toggle="tooltip" data-placement="top" title="Enviar recordatorio">
                       <span class="glyphicon glyphicon-time"></span>
                   </a>

               </div>
              <div class="pull-right survey-status survey-status__active">&nbsp</div>
          </div>
      </div>
  </div>
   -->
<?php }else{?>
  <!--Publicaciones -->
<div class="col-md-2 card" id="{{$publicacion->idPub}}">
  <div class="left_buttons">
<!-- boton duplicar -->
<div class="row">

  </div>
<!-- fin boton duplicar-->

<!-- boton editar -->
<div class="row">

</div>
  </div>

<!-- fin boton editar -->
<!--Titulo encuesta -->
<div class="row">
  <div  id="title">
    <div id="title2">
<h4> <?php echo $publicacion->tituloEncuesta;  ?></h4>
     </div>
  </div>
</div>
<!--icono encuesta -->
<div class="row">
<div class="pub-icon">
  <img class="card-img-top" id="marco" src="/img/iconos/<?php echo $publicacion->imagePath;?>"
  width="100px" height="100px" onerror="this.src='/img/iconos/default.png'"
  >
</div>
</div>
<!--creador encuesta -->
<div class="row">


</div>

<div class="right_buttons">
        <div class="pull-right survey-status survey-status__active">&nbsp</div>

              <a id="btn_prevPub" target="_blank" href="{{ url('/administrator/previewtem') }}/{{$publicacion->idTemplate}}" type="button" class="btn btn-default"  data-toggle="tooltip" data-placement="top" title="Vista previa">
                                <span class="glyphicon glyphicon-eye-open"></span>
                            </a>


</div>


<!-- div termino -->
</div>
  <?php } ?>


<?php } ?>


<?php foreach ($finalizadas as $publicacion) {?>
  <!--Publicaciones -->
<div class="col-md-2 card" id="{{$publicacion->idPub}}">
  <div class="left_buttons">
<!-- boton duplicar -->
<div class="row">

  </div>
<!-- fin boton duplicar-->

<!-- boton editar -->
<div class="row">

</div>
  </div>

<!-- fin boton editar -->
<!--Titulo encuesta -->
<div class="row">
  <div  id="title">
    <div id="title2">
<h4> <?php echo $publicacion->tituloEncuesta;  ?></h4>
     </div>
  </div>
</div>
<!--icono encuesta -->
<div class="row">
<div class="pub-icon">
  <img class="card-img-top" id="marco" src="/img/iconos/<?php echo $publicacion->imagePath;?>"
  width="100px" height="100px" onerror="this.src='/img/iconos/default.png'"
  >
</div>
</div>
<!--creador encuesta -->
<div class="row">


</div>

<div class="right_buttons">
        <div class="pull-right survey-status survey-status__finished">&nbsp</div>

              <a id="btn_prevPub" target="_blank" href="{{ url('/administrator/previewtem') }}/{{$publicacion->idTemplate}}" type="button" class="btn btn-default"  data-toggle="tooltip" data-placement="top" title="Vista previa">
                                <span class="glyphicon glyphicon-eye-open"></span>
                            </a>


</div>


<!-- div termino -->
</div>
<?php } ?>

<script src="{{asset('js/app.js')}}"></script>
<script src="/js/label_better.min.js"></script>
<script src="/js/administratorPreviewTem.js"></script>


<script type="text/javascript">

function pop(){
             swal({
              title: "Información",
              text: "Encuesta demostrativa ninguna Información será guardada",
              type: "warning",
              showCancelButton: true,
              confirmButtonClass: "btn-danger",
              confirmButtonText: "Continuar",
              cancelButtonText: "Cancelar",
              closeOnConfirm: false,
              closeOnCancel: true
            },
            function(isConfirm) {
            if (isConfirm) {

            } else {

            }
            });
}
function get_action(){

        pop();

}


</script>
