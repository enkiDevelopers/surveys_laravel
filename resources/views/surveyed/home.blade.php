@extends('layouts.surveyed')

@section('content')


    <div class="col-md-8 col-md-offset-2">

            <div class="panel panel-default">
                <div class="panel-heading">Encuestas Pendientes</div>

                <div class="panel-body">
                  <?php 
                    $fecha=date('Y-m-d H:m:s');
                    $fecha=str_replace("T"," ",$fecha);
                    foreach ($datos as $dato) {
                    if($fecha >= $dato->fechai  and $fecha <= $dato->fechat){

                       echo"<div class='col-md-4'>
                                <div class='card well' >"
                  ?>
                     <img src="\img/iconos/{{$dato->imagePath}}"   width='100%' height='100px' style="margin-top:5%" onerror="this.src='/img/iconos/default.png'">

                  <?php                  
                            echo"<div class='card-body'>
                                        <h4 class='card-title'><p>{$dato->tituloEncuesta}</p></h4>
                                        <p class='card-text'><strong>Fecha Límite: {$dato->fechat}</strong></p>
                                        <a  class='btn btn-red' href=/surveyed/previewtem/".$dato->idE.">Responder</a>
                                    </div>
                                </div>
                              </div>";

                    }else{
                      if($fecha >= $dato->fechai){
                    ?>

                      <div class='col-md-4'>
                          <div class='card well' >
                              <img src="\img/iconos/{{$dato->imagePath}}"  width='100%' height='100px' style="margin-top:5%" onerror="this.src='/img/iconos/default.png'">
                          <div class='card-body'>
                                        <h4 class='card-title'><?php echo $dato->tituloEncuesta ?></h4>
                                        <p class='card-text'><strong>Fecha Límite: </strong><?php echo $dato->fechat ?></p>
                                        <a  class='btn btn-red' href="#" disabled>Responder</a>
                          </div>
                          </div>
                      </div>
                  <?php 
                    }else{

                    }
                    
                  }
                }
                
                    ?>


                        
                  </div>
            </div>


            <div class="panel panel-default">
                <div class="panel-heading">Encuestas Realizadas</div>
                  <div class="row">

                <div class="panel-body">
                  <?php
                    foreach ($contestado as $constestados) {
                        echo "<div class='col-md-4'>
                              <div class='card well'>"
                        ?>
                     <img src="\img/iconos/{{$constestados->imagePath}}"   width='100%' height='100px' style="margin-top:5%" onerror="this.src='/img/iconos/default.png'">

                                <div class='card-body'>
                                    <h4 class='card-title'>{{$constestados->tituloEncuesta}}</h4>
                                    <p class='card-text'><strong>Fecha Límite: </strong><?php echo $constestados->fechat ?></p>
                                    <a href='contestado' target="_blank" class='btn btn-primary'>Ver encuesta</a>
                                </div>
                            </div>
                        </div>
                <?php
                    }
                  ?>                        
                  </div>
                  </div>

@endsection