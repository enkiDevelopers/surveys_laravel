@extends('layouts.surveyed')

@section('content')


  <div class="content-all">
            <div class="panel panel-default">
                <div class="panel-heading">
                  <div class="row">
                    <div class="col-md-6" style="padding: 1rem;">
                        <b>Encuestas Pendientes</b>
                    </div>
                    <div class="col-md-6" style="text-align: right;">
                      <input type="checkbox"
                        checked data-toggle="toggle" data-on="Ocultar"
                        data-off="Mostrar" data-onstyle="danger" data-offstyle="success"
                           id="btnO" onchange="ocultar();"
                        >
                    </div>
                  </div>

                </div>

                <div class="panel-body" id="pEncuestas">
                  <div class="cont-cards">


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

                            <div class="horizontal">
                                <div class="vertical">
<img class="img-responsive" src="\img/iconos/{{$dato->imagePath}}"  style="border-radius: 5px;  max-height: 100px;" onerror="this.src='/img/iconos/default.png'">
                                </div>
                            </div>



                          <div class='card-body'>
                                        <h5 class='card-title text-center'><?php echo $dato->tituloEncuesta ?></h5>
                                        <p class='card-text text-center'><strong>Fecha Límite: </strong><?php echo $strip; ?></p>

                  <?php
                    if($fecha >= $dato->fechai  and $fecha <= $dato->fechat){
                        $valorA= "<a  class='btn btn-red' href=/surveyed/previewtem/".$dato->idE.">Responder</a>";
                    }else{
                      if($fecha >= $dato->fechai){
                        $valorA= "<a  class='btn btn-red' href='#' disabled>Encuesta Cerrada</a>";
                        }else{
                        }
                    }
                    echo "<div class='text-center'>
                  ".$valorA."</div>";
                    ?>
                          </div>
                        </div>
                      </div>

              <?php
                }
              ?>
                </div>
              </div>
            </div>


            <div class="panel panel-default">


                <div class="panel-heading">
                  <div class="row">

                  <div class="col-md-6" style="padding: 1rem;">
                     <b>  Encuestas Realizadas </b>
                  </div>
                  <div class="col-md-6" style="text-align:right">
                    <input type="checkbox"
                      checked data-toggle="toggle" data-on="Ocultar"
                      data-off="Mostrar" data-onstyle="danger" data-offstyle="success"
                         id="btnO" onchange="ocultar2();"
                      >
                  </div>
                  </div>


                </div>




                  <div class="row">

                <div class="panel-body" id="pEncuestas2">

<div class="cont-cards">

                  <?php
                    foreach ($contestado as $constestados) {

                        $date = $constestados->fechat;
                        $createDate = new DateTime($date);
                        $strip = $createDate->format('Y-m-d H:s');
                  ?>
                      <div class='tarjetas'>
                        <div class='card well' >
                         <img class="img-responsive" src="\img/iconos/{{$dato->imagePath}}" style="border-radius: 5px; margin-top:5%; max-height: 200px;" onerror="this.src='/img/iconos/default.png'">
                          <div class='card-body'>
                                        <h4 class='card-title'><?php echo $dato->tituloEncuesta ?></h4>
                                        <p class='card-text'><strong>Fecha Límite: </strong><?php echo $strip; ?></p>
                                    <div class="text-center">


                                    <a href='contestado' target="_blank" class='btn btn-primary'>Gracias</a>
                                    </div>
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


                  <script>

                  function ocultar()
                  {

                  $('#pEncuestas').slideToggle("slow");
                  }

                  function ocultar2()
                  {
                  //$("#pBody").toggle();
                  $('#pEncuestas2').slideToggle("slow");
                  }


                  </script>

@endsection
