<?php foreach ($publicaciones as $publicacion) {?>
  <div class="col-md-3" >
      <div class="card well" >
<img class="card-img-top" id="marco" src="/img/iconos/<?php echo $publicacion->imagen;?>"
width="100px" height="100px" onerror="this.src='/img/iconos/default.png'"
>
          <div class="card-body">
              <h4 class="card-title">{{$publicacion->titulo}}</h4>
              <p class="card-text"></p>
             <div class="btn-group " role="group" aria-label="...">
                  <a href="{{ url('/surveyed/solve') }}" type="button" class="btn btn-default"  data-toggle="tooltip" data-placement="top" title="Vista previa">
                      <span class="glyphicon glyphicon-eye-open"></span>
                  </a>
              </div>
              <div class="pull-right survey-status survey-status__finished">&nbsp</div>
          </div>
      </div>
  </div>
<?php } ?>
