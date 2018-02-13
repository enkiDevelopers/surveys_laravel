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

                  foreach ($datos as $dato) {

                             echo"<div class='col-md-2'>
                                <div class='card well' >"
                  ?>
                     <img src="\img/iconos/{{$dato->imagePath}}"  width='100%' height='90px' style="margin-top:5%" onerror="this.src='/img/iconos/default.png'">

                  <?php                  
                            echo"<div class='card-body'>
                                        <h4 class='card-title'>{$dato->tituloEncuesta}</h4>
                                        <p class='card-text'></p>
                                        <a  class='btn btn-red' href=/surveyed/previewtem/".$dato->idE.">Responder</a>
                                    </div>
                                </div>
                            </div>";

                           /* echo"<div class='col-md-2'>
                                <div class='card well' >
                                    <img class='card-img-top' src=\img/iconos/$dato->imagePath alt='Card image cap' width='100%' height='90px'>
                                    <div class='card-body'>
                                        <h4 class='card-title'>{$dato->tituloEncuesta}</h4>
                                        <a  class='btn btn-red' href='#' disabled data-toggle='tooltip' data-placement='bottom' title='Periodo de respuesta terminado'>Bloqueado</a>
                                    </div>
                                </div>
                            </div>";*/
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
                              <div class='card well'>";
                        ?>
                     <img src="\img/iconos/{{$constestados->imagePath}}"  width='100%' height='90px' style="margin-top:5%" onerror="this.src='/img/iconos/default.png'">

                                <div class='card-body'>
                                    <h4 class='card-title'>{{$constestados->tituloEncuesta}}</h4>
                                    <a href='contestado' target="_blank" class='btn btn-primary'>Ver encuesta</a>
                                </div>
                            </div>
                        </div>;
                <?php
                    }
                  ?>                        
                  </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip(); 
});
</script>
@endsection