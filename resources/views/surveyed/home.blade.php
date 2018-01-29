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
                  $date1 = new DateTime("now");
                  foreach ($datos as $dato) {
                    if($date1 <= $dato->fechat){

                            echo"<div class='col-md-2'>
                                <div class='card well' >
                                    <img class='card-img-top' src=\img/iconos/$dato->imagen alt='Card image cap' width='100%' height='90px'>
                                    <div class='card-body'>
                                        <h4 class='card-title'>{$dato->titulo}</h4>
                                        <p class='card-text'></p>
                                        <a  class='btn btn-red' href='#' disabled data-toggle='tooltip' data-placement='bottom' title='Periodo de respuesta terminado'>Bloqueado</a>
                                    </div>
                                </div>
                            </div>";


                    }else{
                                                    echo"<div class='col-md-2'>
                                <div class='card well' >
                                    <img class='card-img-top' src=\img/iconos/$dato->imagen alt='Card image cap' width='100%' height='90px'>
                                    <div class='card-body'>
                                        <h4 class='card-title'>{$dato->titulo}</h4>
                                        <p class='card-text'></p>
                                        <a  class='btn btn-red' href='#'>Responder</a>
                                    </div>
                                </div>
                            </div>";

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
                        <div class="col-md-2">
                            <div class="card well" >
                                <img class="card-img-top" src="..." alt="Card image cap">
                                <div class="card-body">
                                    <h4 class="card-title">Titulo de la encuesta</h4>
                                    <p class="card-text"></p>
                                    <a href="#" class="btn btn-primary">Ver encuesta</a>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-2">
                            <div class="card well">
                                <img class="card-img-top" src="..." alt="Card image cap">
                                <div class="card-body">
                                    <h4 class="card-title">Titulo de la encuesta</h4>
                                    <p class="card-text"></p>
                                    <a href="#" class="btn btn-primary">Ver encuesta</a>
                                </div>
                            </div>
                        </div>
                        
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