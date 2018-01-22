@extends('layouts.directive')
@section('content')
<!--modal section-->
<div id="MdCorporativo" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Reportes Disponibles</h4>
      </div>
      <div class="modal-body" >
        <div class="row">
        <div id="titulo_encuesta" class="col-md-6"></div>
        <div id="imagen" class="col-md-6"></div>

        </div>
        <fieldset>
          <legend>Reporte General</legend>
            <button class="btn btn-default">
                Ver reporte
            </button>
        </fieldset>
        <fieldset>
          <legend>Reporte regional</legend>
            <select class="form-control text-black" value="Zonas Disponibles" selected="selected" onchange="selecciona(this.value)">
            <option>Seleccione una opcion</option>
            <?php 
                foreach ($regionestotal as $regionestotales) {
                    echo "<option value=".$regionestotales->regions_id.">".$regionestotales->regions_name."</option>";
                       
                }
            ?>
            </select>
            <button class="btn btn-default">
                Ver reporte
            </button>
        </fieldset>
     <fieldset>
          <legend>Reporte Campus</legend>
          <p id='cargar'></p>
            <select class="form-control text-black" value="Seleccione Zona" id="regionescorp">

            </select>
            <button class="btn btn-default">
                Ver reporte
            </button>
        </fieldset>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
      </div>
    </div>

  </div>
</div>

<div id="MdRegional" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Reportes Disponibles</h4>
      </div>
      <div class="modal-body" >
        <div class="row">
        <div id="titulo_encuestar" class="col-md-6"></div>
        <div id="imagenr" class="col-md-6">

        </div>

        </div>
        <fieldset>
          <legend>Reporte regional</legend>
            <select class="form-control text-black" disabled>
            <?php
                foreach ($regiones as $region) {
                    echo "<option value={$region->regions_id}>{$region->regions_name}</option>";     
                }
            ?>
            </select>
            <hr>
            <button class="btn btn-default">
                Ver reporte
            </button>
        </fieldset>
     <fieldset>
          <legend>Reporte Campus</legend>
            <select class="form-control text-black">
            <?php
                foreach ($campusregion as $campusregions) {
                    echo "<option value={$campusregions->campus_id}>{$campusregions->campus_name}</option>";
                       
                }
            ?>
            </select>
            <hr>
            <button class="btn btn-default">
                Ver reporte
            </button>
        </fieldset>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
      </div>
    </div>

  </div>
</div>

<div id="MdCampus" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Reportes Disponibles</h4>
      </div>
      <div class="modal-body" >
        <div class="row">
        <div id="titulo_encuestac" class="col-md-6"></div>
        <div id="imagenc" class="col-md-6"></div>

        </div>
     <fieldset>
          <legend>Reporte Campus</legend>
            <select class="form-control text-black" id="region_campus" disabled>
            <?php
                foreach ($campus as $campu) {
                    echo "<option value={$campu->campus_id}>{$campu->campus_name}</option>";  
                }
                      ?>

            </select>
            <div id="btn">
                
            </div>


        </fieldset>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
      </div>
    </div>

  </div>
</div>

<!--end modal section-->


<div class="row">
<div class="container" >
        <div class="col-md-11">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-md-4">
                            Reportes
                        </div>    
                        <div class="col-md-8 ">
                            <div class="row">
                                <div class="col-md-1">&nbsp</div>  
                                <div class="col-md-2 pull-right">
                                    Ver&nbsp&nbsp<span class="glyphicon glyphicon-eye-open"></span>
                                </div> 
                            </div>
                        </div>
                    </div>    
                </div>

                <div class="panel-body">
                    <?php foreach ($encuestas as $encuesta) { ?>
                        <div class="col-md-6">
                            <div class="card well" >
                                

                                <div class="card-body">
                                <div class="row">
                                    <div class="col-md-5"><img class="card-img-top" alt="Card image cap" src="\img/iconos/<?php echo $encuesta->Image_path;?>" width="100%" height="90px"> </div>
                                    <div class="col-md-7">
                                    <h4 class="card-title">  <?php echo $encuesta->Titulo_encuesta;  ?></h4>
                                    </div>
                                </div>
                                <hr size="30">
                                <p class="card-text">Descripción: <span class="template-creator"><?php echo $encuesta->Descripcion?></span></p>
                                <p class="card-text">Fecha: <span class="template-creator"><?php echo $encuesta->created_at?></span></p>

                                <?php
                                 switch ($datosdirective[0]->type) {
                                    case '1':
                                ?>
                                    <div class="btn-group " role="group" aria-label="...">
                                        <button type="button" id="{{$encuesta->id}}" class="btn btn-default" onclick="corporativoModal(this)" name="btn_datos"  data-toggle="tooltip" data-placement="top" title="Reportes disponibles">
                                            <span class="glyphicon glyphicon-eye-open" ></span>
                                        </button>
                                    </div>

                                <?php 
                                    break;
                                    case '2': 
                                ?>
                                        <div class="btn-group " role="group" aria-label="...">
                                        <button type="button"  id="{{$encuesta->id}}" class="btn btn-default" onclick="regionalModal({{$encuesta->id}},{{$datosdirective[0]->idDirectives}})" name="btn_datos"  data-toggle="tooltip" data-placement="top" title="Reporte Regional">
                                            <span class="glyphicon glyphicon-eye-open" ></span>
                                        </button>
                                        </div>
                                <?php
                                    break;
                                    case '3':
                                ?>
                                    <div class="btn-group " role="group" aria-label="...">
                                        <button type="button"  id="{{$encuesta->id}}" class="btn btn-default" onclick="campusModal({{$encuesta->id}},{{$datosdirective[0]->idDirectives}})" name="btn_datos"  data-toggle="tooltip" data-placement="top" title="Reporte Campus">
                                            <span class="glyphicon glyphicon-eye-open" ></span>
                                        </button>
                                    </div>
                                <?php 
                                    break;
                                    default:
                                        echo "<p>Sin Asignar</p>";
                                    break;
                                }
                                 ?>   

                                </div>
                            </div>
                        </div>

                <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>

	@endsection