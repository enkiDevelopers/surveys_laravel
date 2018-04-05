<div class="col-md-12 text-center">
    <hr style="height: 2px; background-color: black;"/>
  <h3>Encuestas activas </h3>
    <hr style="height: 2px; background-color: black;"/>
</div>

<?php foreach ($actuales as $publicacion) {
if($publicacion->creador == $id)
{
  ?>

  <div class="col-md-3 col-md-offset-3 text-center cont" id="{{$publicacion->idPub}}">
    <div class="title">
<h5><?php echo $publicacion->tituloEncuesta;  ?></h5>
    </div>
  <div class="btnC">

    <a target="_blank" href="{{ url('/administrator/previewtem') }}/{{$publicacion->idTemplate}}" type="button" class="btn btn-icon text-center"  data-toggle="tooltip" data-placement="top" title="Vista previa">
                        <span class="glyphicon glyphicon-eye-open"></span>
                      </a>

<a  onclick="reminder({{$publicacion->idPub}})" class="btn btn-icon text-center"  data-toggle="tooltip" data-placement="top" title="Enviar recordatorio">
<span class="glyphicon glyphicon-time ic"></span>
</a>


<a  onclick="editPub({{$publicacion->idTemplate}});" class="btn btn-icon text-center" data-toggle="tooltip" data-placement="top" title="editar">
<span class="glyphicon glyphicon-edit ic"></span>
</a>

  </div>

  				<div class="horizontal">
  		<div class="vertical">
  			<img src="/img/iconos/{{$publicacion->imagePath}}" class="img-responsive center-block img"
  			  onerror="this.src='/img/iconos/default.png';"/>
  		</div>
  	</div>


  				</div>








<!--


  <div class="card" id="{{$publicacion->idPub}}"

    >
    <div id="nombre">

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

  <div id="ver">
    <div  id="title">

<?php echo $publicacion->tituloEncuesta;  ?>

    </div>
    </div>
    </div>

    </div>
-->

<?php }else{?>
  <div class="col-md-3 col-md-offset-3 text-center cont" id="{{$publicacion->idPub}}">
    <div class="title">
<h5><?php echo $publicacion->tituloEncuesta;  ?></h5>
    </div>
  <div class="btnC">

    <a target="_blank" href="{{ url('/administrator/previewtem') }}/{{$publicacion->idTemplate}}" type="button" class="btn btn-icon text-center"  data-toggle="tooltip" data-placement="top" title="Vista previa">
                        <span class="glyphicon glyphicon-eye-open"></span>
                      </a>
  </div>

  				<div class="horizontal">
  		<div class="vertical">
  			<img src="/img/iconos/{{$publicacion->imagePath}}" class="img-responsive center-block img"
  			  onerror="this.src='/img/iconos/default.png';"/>
  		</div>
  	</div>


  				</div>




  <?php } ?>


<?php } ?>


<div class="col-md-12 text-center">
    <hr style="height: 2px; background-color: black;"/>
  <h3>Encuestas finalizadas </h3>
    <hr style="height: 2px; background-color: black;"/>
</div>

<?php foreach ($finalizadas as $publicacion) {?>

  <div class="col-md-3 col-md-offset-3 text-center cont" id="{{$publicacion->idPub}}">
    <div class="title">
<h5><?php echo $publicacion->tituloEncuesta;  ?></h5>
    </div>
  <div class="btnC">

    <a target="_blank" href="{{ url('/administrator/previewtem') }}/{{$publicacion->idTemplate}}" type="button" class="btn btn-icon text-center"  data-toggle="tooltip" data-placement="top" title="Vista previa">
                        <span class="glyphicon glyphicon-eye-open"></span>
                      </a>
  </div>

  				<div class="horizontal">
  		<div class="vertical">
  			<img src="/img/iconos/{{$publicacion->imagePath}}" class="img-responsive center-block img"
  			  onerror="this.src='/img/iconos/default.png';"/>
  		</div>
  	</div>


  				</div>


<!--
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

            <div class="pull-right survey-status survey-status__finished">&nbsp</div>
        <a id="btn_prevPub" target="_blank" href="{{ url('/administrator/previewtem') }}/{{$publicacion->idTemplate}}" type="button" class="btn btn-default"  data-toggle="tooltip" data-placement="top" title="Vista previa">
                            <span class="glyphicon glyphicon-eye-open ic"></span>
                          </a>

                          <div id="ver">
                            <div  id="title">

                        <?php echo $publicacion->tituloEncuesta;  ?></h5>

                            </div>
                            </div>



    </div>

    </div>
-->
<?php } ?>

<script src="{{asset('js/app.js')}}"></script>
<script src="/js/label_better.min.js"></script>
<script src="/js/administratorPreviewTem.js"></script>
