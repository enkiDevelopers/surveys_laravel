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
        <div class="circle" style="background-image: url('/img/avatar/{{$info->imagenPerfil}}')" data-toggle="modal" data-target="#editarImagen">
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
          $regional="";
          $campusz="";
          foreach ($datosdirective as $datosdirectives) {
            $divHeader="<div style='height: auto;text-align: right;margin-left: 15%;color: white;font-size: 18px;}'>";
            switch ($datosdirective[0]->type) {
              case '1': //Directivo corporativo
                echo $divHeader . "Líder Corporativo</div>";
                break;
              case '2':
                $regional=$datosdirective[0]->regions_name;
                echo $divHeader . "Líder Regional ".$regional."</div>";
                break;
              case '3':
                $regional=$regiones[0]->regions_name;
                $campusz=$campus[0]->campus_name;
                echo $divHeader . "Líder Campus ".$campusz."</div>";
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
                  <img src="\img/iconos/{{$encuesta->imagePath}}" width="70px" onerror="this.src='/img/Por_Ti_EXPERIENCIA_UVM.png'">
                </td>
                <td class="descripcion"><p style="color: black;">{{$encuesta->tituloEncuesta}}</p></td>
                <td class="descripcion"><p style="color: black;">{{$encuesta->descripcion}}</p></td>
                <td>
                 <?php
                  switch ($datosdirective[0]->type) {
                    case '1':
                ?>
                <div class="btn-group " role="group" aria-label="...">
                  <a class='btn btn-default glyphicon glyphicon-signal' href="javascript:getURLGeneral({{$encuesta->id}})" > </a>
                  <!--
                  <button type="button" id="{{$encuesta->id}}" class="btn btn-default" onclick="corporativoModal(this)" name="btn_datos"  data-toggle="tooltip" data-placement="top" title="Reportes disponibles">
                    <span class="glyphicon glyphicon-signal" ></span>
                  </button>
                -->
                </div>
                <?php
                    break;
                    case '2':
                ?>
                <div class="btn-group " role="group" aria-label="...">
                  <a class='btn btn-default glyphicon glyphicon-signal' href="javascript:getURLRegionCorp({{$encuesta->id}},'{{$regional}}')" ></a>
                  <!--
                  <button type="button"  id="{{$encuesta->id}}" class="btn btn-default" onclick="regionalModal({{$encuesta->id}},{{$datosdirective[0]->idUsuario}})" name="btn_datos" data-toggle="tooltip" data-placement="top" title="Reporte Regional">
                    <span class="glyphicon glyphicon-signal"></span>
                  </button>
                  -->
                </div>
                <?php
                  break;
                  case '3':
                ?>
                <div class="btn-group " role="group" aria-label="...">
                  <a class='btn btn-default glyphicon glyphicon-signal' href="javascript:getURLCorp({{$encuesta->id}},'{{$regional}}','{{$campusz}}')" ></a>
                </div>
                <!--
                <div class="btn-group">
                  <a class='btn btn-default' href="{{url('campus',array('id'=>$encuesta->id,'idcampus'=>$datosdirective[0]->campus_id))}}" target="_blank">
                    <span class="glyphicon glyphicon-signal" ></span>
                  </a>
                </div>
                -->
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



<div class="modal fade" id="editarImagen"  role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="limpiar();">
          <span aria-hidden="true">&times;</span>
        </button>
        <h5 class="modal-title" id="exampleModalLongTitle">Cambiar imagen de perfil</h5>
      </div>
      <div class="modal-body">
<form enctype="multipart/form-data" method="post" id="actualizar" action="/uploadimage2">
    {{ csrf_field() }}
    <div class="col-md-12"style="margin-left:10%; width: 80%;">
      <label class="btn btn-info btn-file">
          Seleccione su imagen
          <input type="file" id="file-input" name="file-input">
      </label>
    </div>

      <br />
<br />
<br />
            <img id="imgSalida2" src="/img/avatar/{{$info->imagenPerfil}}" onerror="this.src='/img/iconos/default.png';"/>






      <br />
      <br />

      <div class="modal-footer">
        <input type="reset" data-dismiss="modal" class="btn btn-warning" onclick="limpiar();" value="Cancelar"/>
        <input type="submit" class="btn btn-success" value="Cambiar" />
      </div>

</form>
      </div>

    </div>
  </div>
</div>



<script>
  function limpiar(){
        document.getElementById("actualizar").reset();
        $('#imgSalida2').attr("src","/img/avatar/{{$info->imagenPerfil}}");
    }


    function imagen(){
         $('#file-input').change(function(e) {
             addImage(e);
            });

            function addImage(e){
             var file = e.target.files[0],
             imageType = /image.*/;

             if (!file.type.match(imageType))
             {
               swal({
                  title: "Su archivo no es una imagen",
                  type: "error",
                   });

                   return;
             }
             var reader = new FileReader();
             reader.onload = fileOnload;
             reader.readAsDataURL(file);
            }

            function fileOnload(e) {
             var result=e.target.result;
             $('#imgSalida2').attr("src",result);
            }

         }



</script>

<script>
  imagen();
</script>
	@endsection
