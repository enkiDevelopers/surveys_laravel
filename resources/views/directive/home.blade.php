@extends('layouts.directive')
@section('content')
<link rel="stylesheet" href="/css/direct.css" />
<!--modal section -->
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
        <p id="variable" name="variable" style='display:none'></p>
        </div>
        <fieldset>
          <a class='btn btn-default' href="javascript:getURLGeneral()" >
            Reporte General
          </a>
        </fieldset>
        <fieldset>
          <legend>Reporte regional</legend>
            <select class="form-control text-black" id="cmbregioncorp" name="cmbregioncorp" value="Zonas Disponibles" selected="selected" onchange="selecciona(this.value)">
            <option>Seleccione una opción</option>
            <?php
              foreach ($regionestotal as $regionestotales) {
                echo "<option value=".$regionestotales->regions_id.">".$regionestotales->regions_name."</option>";
              }
            ?>
            </select>
              <p id="cargar" name="cargar"></p>
            <a class='btn btn-default' href="javascript:getURLRegionCorp()" >Ver Reporte</a>
        </fieldset>
        <fieldset>
          <legend>Reporte Campus</legend>
          <select class="form-control text-black"  value="Seleccione Zona" id="regionescorp" name="regionescorp"></select>
          <a class='btn btn-default' href="javascript:getURLCorp()" >Ver Reporte</a>
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
        <p id="idencues" name="idencues" style='display:none'></p>

        </div>
        <fieldset>
          <legend>Reporte regional</legend>
            <select id="cmbregion" name="cmbregion" class="form-control text-black" disabled>
            <?php
                foreach ($regiones as $region) {
                    echo "<option value={$region->regions_id}>{$region->regions_name}</option>";
                }
            ?>
            </select>
                <a class='btn btn-default' href="javascript:getURLRegion()" target="_blank">
                    Ver Reporte
                </a>
        </fieldset>
     <fieldset>
          <legend>Reporte Campus</legend>

                <select id="cmbcampus" name="cmbcampus" class="form-control text-black">
                <?php
                    foreach ($campus as $campuss) {
                        echo "<option value={$campuss->campus_id}>{$campuss->campus_name}</option>";
                    }
                ?>
                </select>
                <a class='btn btn-default' href="javascript:getURL()" >
                    Ver Reporte
                </a>
        </fieldset>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
      </div>
    </div>

  </div>
</div>
<!--end modal section-->

<div class="sep">

      <div class="supSide" style="left: 60%">
        <div class="circle" style="background-image: url('/img/avatar/{{$info->imagenPerfil}}')">
        </div>
        <div class="cuadroPerfilSup">

<div class="eng">
<span class="glyphicon glyphicon-bookmark icon">&nbsp</span>
</div>
<div id="content" style="height: 85%;">
<div style="margin-top: 1%;">
<div class="nombre" style="white-space: pre;margin-left: 0px;">  {{$info->nombre}} {{$info->apPaterno}} {{$info->apMaterno}}
 </div>
</div>

<div style="margin-top: -9%;">
<div class="correo"> {{$info->email}} </div>
 
  <div style="margin-top: -3%">
        <?php
          foreach ($datosdirective as $datosdirectives) {
            switch ($datosdirective[0]->type) {
              case '1':
                echo "<div style='height: auto;text-align: right;margin-left: 15%;color: white;font-size: 18px;}'>Directivo Corporativo</div>";
                break;
              case '2': 
                echo "<div style='height: auto;text-align: right;margin-left: 15%;color: white;font-size: 18px;white-space: pre; }'>Directivo Regional ".$datosdirective[0]->regions_name."</div>";
                break;
              case '3':
                echo "<div style='height: auto;text-align: right;margin-left: 0%;color: white;font-size: 15px;white-space: pre;font-weight:bold;}'>Directivo Campus ".$campus[0]->campus_name."</div>";
                break;    
              default:
                echo "<p>Sin Asignar</p>";
                break;
            }
          }
        ?>
        </div>
</div>
</div>

      

        </div>
      </div>

</div>




<div class="container" style="width:93%;margin-top:140px;" >
  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="table-width-no-border">
          <table class="table table-striped table-hover table-bordered">
            <thead>
              <tr style="background-color: #cdcdcd; color: black;">
                <th>Encuesta</th>
                <th>Título</th>
                <th>Descripción</th>
                <th>Informe</th>
              </tr>
            </thead>
            <tbody>
          <?php foreach ($encuestas as $encuesta) { ?>

              <tr>
                <td>
                  <img src="\img/iconos/{{$encuesta->imagePath}}" width="55px" height="50px" onerror="this.src='/img/Por_Ti_EXPERIENCIA_UVM.png'">
                </td>
                <td class="descripcion"><p style="color: black;">{{$encuesta->tituloEncuesta}}</p></td>
                <td class="descripcion"><p style="color: black;">{{$encuesta->descripcion}}</p></td>
                <td>
                 <?php
                  switch ($datosdirective[0]->type) {
                    case '1':
                ?>
                <div class="btn-group " role="group" aria-label="...">
                  <button type="button" id="{{$encuesta->id}}" class="btn btn-default" onclick="corporativoModal(this)" name="btn_datos"  data-toggle="tooltip" data-placement="top" title="Reportes disponibles">
                    <span class="glyphicon glyphicon-signal" ></span>
                  </button>
                </div>
                <?php
                    break;
                    case '2':
                ?>
                <div class="btn-group " role="group" aria-label="...">
                  <button type="button"  id="{{$encuesta->id}}" class="btn btn-default" onclick="regionalModal({{$encuesta->id}},{{$datosdirective[0]->idUsuario}})" name="btn_datos" data-toggle="tooltip" data-placement="top" title="Reporte Regional">
                    <span class="glyphicon glyphicon-signal"></span>
                  </button>
                </div>
                <?php
                  break;
                  case '3':
                ?>
                <div class="btn-group">
                  <a class='btn btn-default' href="{{url('campus',array('id'=>$encuesta->id,'idcampus'=>$datosdirective[0]->campus_id))}}" target="_blank">
                    <span class="glyphicon glyphicon-signal" ></span>
                  </a>
                </div>
                <?php
                    break;
                    default:
                        echo "<p>Sin Asignar</p>";
                    break;
                  }
                ?>


                </td>
              </tr>
                      <?php } ?>

            </tbody>
          </table>

        </div>
    </div>
  </div>
</div>
</div>


	@endsection
