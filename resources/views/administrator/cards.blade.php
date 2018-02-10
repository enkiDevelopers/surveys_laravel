<?php foreach ($actuales as $publicacion) {
if($publicacion->creador == $id)
{
  ?>
  <div class="col-md-3" id="{{$publicacion->idPub}}">
      <div class="card well" >
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
<?php }else{?>
    <div class="col-md-3" id="{{$publicacion->idPub}}">
        <div class="card well" >
  <img class="card-img-top" id="marco" src="/img/iconos/<?php echo $publicacion->imagePath;?>"
  width="100px" height="100px" onerror="this.src='/img/iconos/default.png'"
  >            <div class="card-body">
                <h4 class="titleA">{{$publicacion->tituloEncuesta}}</h4>
                <p class="card-text"></p>
               <div class="btn-group " role="group" aria-label="...">
                    <a target="_blank" href="{{ url('/administrator/previewtem') }}/{{$publicacion->idTemplate}}" type="button" class="btn btn-default"  data-toggle="tooltip" data-placement="top" title="Vista previa">
                        <span class="glyphicon glyphicon-eye-open"></span>
                    </a>
                </div>
              <div class="pull-right survey-status survey-status__active">&nbsp</div>
            </div>
        </div>
    </div>
  <?php } ?>


<?php } ?>


<?php foreach ($finalizadas as $publicacion) {?>
  <div class="col-md-3" >
      <div class="card well" >
<img class="card-img-top" id="marco" src="/img/iconos/<?php echo $publicacion->imagePath;?>"
width="100px" height="100px" onerror="this.src='/img/iconos/default.png'"
>
          <div class="card-body">
              <h4 class="titleA">{{$publicacion->tituloEncuesta}}</h4>
              <p class="card-text"></p>
             <div class="btn-group " role="group" aria-label="...">
                  <a target="_blank" href="{{ url('/administrator/previewtem') }}/{{$publicacion->idTemplate}}"  type="button" class="btn btn-default"  data-toggle="tooltip" data-placement="top" title="Vista previa">
                      <span class="glyphicon glyphicon-eye-open"></span>
                  </a>
              </div>
              <div class="pull-right survey-status survey-status__finished">&nbsp</div>
          </div>
      </div>
  </div>
<?php } ?>
