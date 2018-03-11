<?php foreach ($actuales as $publicacion) {
if($publicacion->creador == $id)
{
  ?>
  <div class="card" id="{{$publicacion->idPub}}"
    style="
    <?php
    $nombre_fichero = './img/iconos/'.$publicacion->imagePath;

    if (file_exists($nombre_fichero)) {
    echo "background-image: url('/img/iconos/$publicacion->imagePath');";
    } else {
    echo "background-image: url('/img/iconos/default.png');";
    }
    ?>

    "

    >
    <div id="nombre">
          <div id="ver">
            <div  id="title">

        <?php echo $publicacion->tituloEncuesta;  ?></h5>

            </div>
            </div>
  <div class="pull-right survey-status survey-status__active">&nbsp</div>
        <a id="btn_prevPub" target="_blank" href="{{ url('/administrator/previewtem') }}/{{$publicacion->idTemplate}}" type="button" class="btn btn-default"  data-toggle="tooltip" data-placement="top" title="Vista previa">
                            <span class="glyphicon glyphicon-eye-open ic"></span>
                          </a>

  <a id="btn_rec" onclick="reminder({{$publicacion->idPub}})" class="btn btn-default"  data-toggle="tooltip" data-placement="top" title="Enviar recordatorio">
  <span class="glyphicon glyphicon-time ic"></span>
  </a>


  <a id="btn_edit" onclick="editPub({{$publicacion->idTemplate}});" class="btn btn-default" data-toggle="tooltip" data-placement="top" title="editar">
  <span class="glyphicon glyphicon-edit ic"></span>
  </a>


    </div>

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


  <div class="card" id="{{$publicacion->idPub}}"   style="
    <?php
    $nombre_fichero = './img/iconos/'.$publicacion->imagePath;

    if (file_exists($nombre_fichero)) {
    echo "background-image: url('/img/iconos/$publicacion->imagePath');";
    } else {
    echo "background-image: url('/img/iconos/default.png');";
    }
    ?>

    ">
    <div id="nombre">
          <div id="ver">
            <div  id="title">

        <?php echo $publicacion->tituloEncuesta;  ?></h5>

            </div>
            </div>
            <div class="pull-right survey-status survey-status__active">&nbsp</div>
        <a id="btn_prevPub" target="_blank" href="{{ url('/administrator/previewtem') }}/{{$publicacion->idTemplate}}" type="button" class="btn btn-default"  data-toggle="tooltip" data-placement="top" title="Vista previa">
                            <span class="glyphicon glyphicon-eye-open ic"></span>
                          </a>






    </div>

    </div>


  <?php } ?>


<?php } ?>


<?php foreach ($finalizadas as $publicacion) {?>




  <div class="card" id="{{$publicacion->idPub}}"   style="
    <?php
    $nombre_fichero = './img/iconos/'.$publicacion->imagePath;

    if (file_exists($nombre_fichero)) {
    echo "background-image: url('/img/iconos/$publicacion->imagePath');";
    } else {
    echo "background-image: url('/img/iconos/default.png');";
    }
    ?>

    ">
    <div id="nombre">
          <div id="ver">
            <div  id="title">

        <?php echo $publicacion->tituloEncuesta;  ?></h5>

            </div>
            </div>
            <div class="pull-right survey-status survey-status__finished">&nbsp</div>
        <a id="btn_prevPub" target="_blank" href="{{ url('/administrator/previewtem') }}/{{$publicacion->idTemplate}}" type="button" class="btn btn-default"  data-toggle="tooltip" data-placement="top" title="Vista previa">
                            <span class="glyphicon glyphicon-eye-open ic"></span>
                          </a>





    </div>

    </div>

<?php } ?>

<script src="{{asset('js/app.js')}}"></script>
<script src="/js/label_better.min.js"></script>
<script src="/js/administratorPreviewTem.js"></script>
