@extends('layouts.surveyed')

@section('content')
<div class="row">
<div class="container">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Encuestas Pendientes</div>

                <div class="panel-body ">
                  <div class="row">
                  <?php 
                    $fecha=date('Y-m-d H:m:s');
                    $fecha=str_replace("T"," ",$fecha);
                    foreach ($datos as $dato) {
    
                    if($fecha >= $dato->fechai  and $fecha <= $dato->fechat){

                             echo"<div class='col-md-2'>
                                <div class='card well' >"
                  ?>
                     <img src="\img/iconos/{{$dato->imagePath}}"  width='100%' height='90px' style="margin-top:5%" onerror="this.src='/img/iconos/default.png'">

                  <?php                  
                            echo"<div class='card-body'>
                                        <h4 class='card-title'>{$dato->tituloEncuesta}</h4>
                                        <p class='card-text'><strong>Fecha: {$dato->fechat}</strong></p>
                                        <a  class='btn btn-red' href=/surveyed/previewtem/".$dato->idE.">Responder</a>
                                    </div>
                                </div>
                              </div>";

                    }else{
                      if($fecha >= $dato->fechai){
                    ?>

                      <div class='col-md-2'>
                          <div class='card well' >
                              <img src="\img/iconos/{{$dato->imagePath}}"  width='100%' height='90px' style="margin-top:5%" onerror="this.src='/img/iconos/default.png'">
                          <div class='card-body'>
                                        <h4 class='card-title'><?php echo $dato->tituloEncuesta ?></h4>
                                        <p class='card-text'><strong>Fecha: </strong><?php echo $dato->fechat ?></p>
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
            </div>


            <div class="panel panel-default">
                <div class="panel-heading">Encuestas Realizadas</div>

                <div class="panel-body">
                  <div class="row">
                  <?php
                    foreach ($contestado as $constestados) {
                        echo "<div class='col-md-2'>
                              <div class='card well'>"
                        ?>
                     <img src="\img/iconos/{{$constestados->imagePath}}"  width='100%' height='90px' style="margin-top:5%" onerror="this.src='/img/iconos/default.png'">

                                <div class='card-body'>
                                    <h4 class='card-title'>{{$constestados->tituloEncuesta}}</h4>
                                    <p class='card-text'><strong>Fecha: </strong><?php echo $constestados->fechat ?></p>
                                    <a href='contestado' target="_blank" class='btn btn-primary'>Ver encuesta</a>
                                </div>
                            </div>
                        </div>
                <?php
                    }
                  ?>                        
                  </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection