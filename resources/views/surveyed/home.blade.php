@extends('layouts.surveyed')

@section('content')



    <div class="col-md-8 col-md-offset-2">

            <div class="panel panel-default">
                <div class="barraGris">Encuestas Pendientes</div>

                <div class="panel-body">
                  <?php 
                    $fecha=date('Y-m-d H:m:s');
                    $fecha=str_replace("T"," ",$fecha);
                    foreach ($datos as $dato) {
                        $date = $dato->fechat;
                        $createDate = new DateTime($date);
                        $strip = $createDate->format('Y-m-d H:s');
                  ?>
                      <div class='col-md-4 tarjetas'>
                        <div class='card well' >
                         <img src="\img/iconos/{{$dato->imagePath}}"   width='100%' height='100px' style="margin-top:5%" onerror="this.src='/img/iconos/default.png'">
                          <div class='card-body'>
                                        <h4 class='card-title'><?php echo $dato->tituloEncuesta ?></h4>
                                        <p class='card-text'><strong>Fecha Límite: </strong><?php echo $strip; ?></p>

                  <?php                  
                    if($fecha >= $dato->fechai  and $fecha <= $dato->fechat){
                        $valorA= "<a  class='btn btn-red' href=/surveyed/previewtem/".$dato->idE.">Responder</a>";
                    }else{
                      if($fecha >= $dato->fechai){
                        $valorA= "<a  class='btn btn-red' href='#' disabled>Encuesta Cerrada</a>";
                        }else{
                        }
                    }
                    echo $valorA;
                    ?>
                          </div>
                        </div>
                      </div>

              <?php 
                }
              ?>
              </div>
            </div>


            <div class="panel panel-default">
                <div class="barraGris">Encuestas Realizadas</div>
                  <div class="row">

                <div class="panel-body">
                  <?php
                    foreach ($contestado as $constestados) {

                        $date = $constestados->fechat;
                        $createDate = new DateTime($date);
                        $strip = $createDate->format('Y-m-d H:s');
                  ?>
                      <div class='col-md-4 tarjetas'>
                        <div class='card well' >
                         <img src="\img/iconos/{{$dato->imagePath}}"   width='100%' height='100px' style="margin-top:5%" onerror="this.src='/img/iconos/default.png'">
                          <div class='card-body'>
                                        <h4 class='card-title'><?php echo $dato->tituloEncuesta ?></h4>
                                        <p class='card-text'><strong>Fecha Límite: </strong><?php echo $strip; ?></p>
                                    <a href='contestado' target="_blank" class='btn btn-primary'>Gracias</a>
                                </div>
                            </div>
                        </div>
                <?php
                    }
                  ?>                        
                  </div>
                  </div>

@endsection
