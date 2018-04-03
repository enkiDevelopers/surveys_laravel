@extends('layouts.admin')
@section('content')
  <style type="text/css">
    .progress {
    display: block;
    text-align: center;
    width: 0;
    height: 3px;
    background: red;
    transition: width .3s;
}
.progress.hide {
    opacity: 0;
    transition: opacity 1.3s;
}
  .procesando {
    position: fixed;
    left: 0px;
    top: 0px;
    width: 100%;
    height: 100%;
    z-index: 9999;
    background: url('/img/load/cargando2.gif') 50% 50% no-repeat rgb(249,249,249);
    opacity: .8;
}

  </style>
      <link href="/css/surveys.css" rel="stylesheet"/>
      <link href="/css/files.css" rel="stylesheet"/>

<div class="progress"></div>
  <div id="AgregarLista" class="modal fade" role="dialog">
   <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Agregar Nueva lista de Encuestados</h4>
      </div>
      <div class="modal-body" >
        <form  method="post" id="formuploadajax" action="/ingresar" onsubmit="return checkSubmit();">
          <hr>
          {{ csrf_field() }}

            <label for="exampleInputFile">Nombre de la Lista</label>
              <input class="form-control" id="nombre" name="nombre" type="text" required>
      <div class="modal-footer">
            <!--  <input type="submit" class="btn btn-default" value="Crear Lista">-->
    <input type="submit" class="btn btn-default" id="btsubmit" value="Crear Lista" />

        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
      </div>
        </form>


      </div>

    </div>

  </div>
</div>

<div id="AgregarDatos" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Agregar Datos</h4>
      </div>
      <div class="modal-body" >
      <div class="row">
      <div class="col-md-7">
        <form  method="post" id="agregardatos" action="/agregarRegistros" enctype="multipart/form-data">
        {{ csrf_field() }}
          <p>Agregar datos en la lista existente.</p>
            <label for="exampleInputFile">Subir documento</label>
              <input class="form-control-file"  id="datos" name="datos" type="file" value="Subir archivo"accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet" required>
                 <input type="hidden" id="listaid" name="listaid" value="">
                 <!-- <strong>Maximo por archivo 5MB</strong> -->
          <hr>
        </form>
      </div>
      <div class="col-md-4">
                <h4>Archivos subidos</h4>
                <div id="data"></div>

      </div>
</div>

    </div>
      <div class="modal-footer">
            <button type="button" id="btnsubir2" onclick="data();" class="btn btn-default"> Subir Archivo</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
      </div>




    </div>

  </div>
</div>




<div id="AgregarIncidentes" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Agregar Nueva lista de Incidencias</h4>
      </div>
      <div class="modal-body" >
        <form  method="post" id="formincidentes" enctype="multipart/form-data">
                  {{ csrf_field() }}

          <hr>
          <p>Los registros que suba seran marcados como incidentes dentro de la lista seleccionada.</p>
            <label for="exampleInputFile">Subir documento</label>
              <input class="form-control-file"  id="incidentes" name="incidentes" type="file" accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet">
                 <input type="hidden" id="idlista" name="idlista" value="">

              <div class="modal-footer">

                <input type="submit" class="btn btn-default" value="Subir archivos"  />
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
              </div>
        </form>


      </div>

    </div>

  </div>
</div>


  <div class="procesando" id="procesando"></div>



  <div class="sep">

        <div class="supSide" style="left: 60%;">
          <div class="circle" style=" <?php $nombre_fichero = './img/avatar/'.$info->imagenPerfil;if (file_exists($nombre_fichero)) {echo "background-image: url('/img/avatar/$info->imagenPerfil');";} else {echo "background-image: url('/img/avatar/default.png');";}  ?> "
onclick="return principal();">
          </div>
          <div class="cuadroPerfilSup">

  <div class="eng">
  <span class="glyphicon glyphicon-cog">&nbsp</span>
  </div>
  <div id="content">
  <div style="margin-top: 1%;">
  <div class="nombre">  {{$info->nombre}} {{$info->apPaterno}} {{$info->apMaterno}}
   </div>
  </div>

  <div style="margin-top: 2%;">
  <div class="correo"> {{$info->email}} </div>
  </div>
  </div>


          </div>
        </div>

  </div>



<div class="container"  >
    
      <!--
                          <div class="col-sm-0">
                      </div>
      -->
      

                              <div style="display:none;" id="datain">
                                    <p class="text-center parrafo">Procesando Lista</p>
                                    <center><img src="/img/load/load.gif"></center>
                              </div>



      <div class="col-md-12 text-center" id="titulo">
         <div class="col-md-6">Listas</div>
         <div class="col-md-6">
              <a  class="btn glyphicon glyphicon-plus btnLista" data-toggle="modal" data-target="#AgregarLista"> Crear </a>
         </div>
       </div>

      
        <div class="col-md-12" style="overflow:auto;">
            <table class="table table-striped table-bordered tablaListas">
                <thead>
                  <tr class="headerFont">                    
                    <th class="descrHeaderTbl">Nombre Lista</th>
                    <th class="iconoHeaderTbl">Estado</th>
                    <th class="descrHeaderTbl">Encuesta Asociada</th>
                    <th class="iconoHeaderTbl">Subir Archivos</th>
                    <th class="iconoHeaderTbl">Procesar Lista</th>
                    <th class="iconoHeaderTbl">Ver Lista</th>
                    <th class="iconoHeaderTbl">Cargar Incidencias</th>
                    <th class="iconoHeaderTbl">Ver incidencias</th>
                    <th class="iconoHeaderTbl">Eliminar Lista</th>
                  </tr>
                </thead>
                
                <tbody id="tabla">
                  <?php
                    $hoy = date("Y-m-d H:i:s");
                    foreach ($listas as $lista) {
                      $eliminarD="";
                      $nombreLista=$lista->nombre;
                      $estado="src='/img/listo.jpg' data-toggle='tooltip' data-placement='top' title='Nombre de lista Creado'";
                      $encuestaAsociada="";                         
                      $subirArchivos="data-target='#AgregarDatos' id='$lista->idLista' onClick='reply_click(this.id)' data-toggle='tooltip' data-placement='top'";
                      $procesarLista="disabled='disabled'";
                      $verLista="disabled='disabled'";
                      $cargarIncidencias="disabled='disabled'";
                      $verIncidencias="disabled='disabled'";
                      
                      switch ($lista->carga) {
                        case '0': 
                          $encuestaAsociada="Ninguna";
                          break;
                        case '2': //caso donde se suben los archivos
                          $encuestaAsociada="Caso 2";
                          $nombreLista=$lista->nombre;                
                          $estado="src='/img/listo.jpg' data-toggle='tooltip' data-placement='top' title='Archivo(s) de Excel Subido(s)'";
                          $encuestaAsociada=" Caso 2";
                          $procesarLista= "onClick='creardato(this.id)' data-toggle='tooltip' data-placement='top' title='Cargar Datos'"; 
                          $subirArchivos="data-target='#AgregarDatos' id='$lista->idLista' onClick='reply_click(this.id)' data-toggle='tooltip' data-placement='top'";
                          //$procesarLista="title='Agregar Datos' disabled='disabled'";
                          $verLista="disabled='disabled'";
                          $cargarIncidencias="disabled='disabled'";
                          $verIncidencias="disabled='disabled'";
                          break;
                        case '1': //caso predeterminado sucede después de crear una lista
                            $estado="src='/img/listo.jpg' data-toggle='tooltip' data-placement='top' title='Lista subida en Base de Datos'";
                            $encuestaAsociada="Caso 1";
                            $subirArchivos="disabled='disabled'";
                            $verLista="type='button' href='/administrator/file/open/$lista->idLista'  data-toggle='tooltip' data-placement='top'  target='_black'";
                            $cargarIncidencias="data-target='#AgregarIncidentes' id='$lista->idLista' onClick='reply_click2(this.id)' data-toggle='tooltip' data-placement='top'";
                            $verIncidencias="href='/administrator/file/incidentes/$lista->idLista' target='_black'"; 
                            if($lista->usado== 0){
                            }else{
                              $encuestaAsociada=$lista->titulo;
                              if($hoy>=$lista->fechat){
                                $cargarIncidencias="disabled='disabled'";
                              }
                            $eliminarD="disabled='disabled'";
                          }
                          break;
                        case '3': //caso predeterminado sucede después de crear una lista
                          $nombreLista=$lista->nombre;
                          $estado="src='/img/cargando.png' data-toggle='tooltip' data-placement='top' title='Agregando archivos a Base de Datos'";
                          $encuestaAsociada="Caso 3";
                          $subirArchivos="disabled='disabled'";
                          $procesarLista="disabled='disabled'";
                          $cargarIncidencias="disabled='disabled'";
                          $verIncidencias="disabled='disabled'";
                          break;
                        case '4': // sucede después de cargar una lista en Base de Datos
                          $encuestaAsociada="Caso 4";
                          $nombreLista=$lista->nombre;
                          $estado="src='/img/cargando.png' data-toggle='tooltip' data-placement='top' title='Agregando Incidentes'";
                          $encuestaAsociada="";  
                          $subirArchivos="disabled='disabled'";
                          $procesarLista="disabled='disabled'";
                          $cargarIncidencias="disabled='disabled'";
                          $verIncidencias="disabled='disabled'";        
                         break; 
                        default:
                         break;
                      }
                      ?>
                      <tr>
                        <td >
                          <?php echo $nombreLista ?>
                        </td>
                        <td>
                          <img <?php echo $estado ?> width="30px" height="30px">
                        </td>
                        <td>
                          <?php echo $encuestaAsociada ?>
                        </td> 

                        <td  class="lisSub">
                          <a class="btn btn-default" title="Agregar Datos" <?php echo $subirArchivos ?>>
                            <span class="glyphicon glyphicon-edit"></span>
                          </a>
                        </td>

                        <td class="lisSub"> 
                          <a id="<?php echo $lista->idLista; ?>" type="button" class="btn btn-default" <?php echo $procesarLista; ?>>
                            <span class="glyphicon glyphicon-play-circle"></span>
                          </a>
                        </td>

                        <td class="lisSub">
                          <a class="btn btn-default"  title="Vista previa" <?php echo $verLista; ?>>
                            <span class="glyphicon glyphicon-eye-open"></span>
                          </a>
                        </td>

                        <td class="IncSub">
                          <a class="btn btn-default" data-toggle="tooltip" data-placement="top" title="Agregar Incidencias"  <?php echo $cargarIncidencias; ?>>
                            <span class="glyphicon glyphicon-plus"></span>
                          </a>
                        </td>

                        <td class="IncSub">
                          <a type="button" class="btn btn-default"  data-toggle="tooltip" data-placement="top" title="Mostrar incidencias"  <?php echo $verIncidencias; ?>>
                            <span class="glyphicon glyphicon-alert"></span>
                          </a>
                        </td>


                        <td>
                          <a class="btn btn-default" data-toggle="modal" data-target="#deleteFileModal" onclick="deleteFile({{$lista->idLista}});" class="btn btn-default" data-toggle="tooltip" data-placement="top" title="Eliminar lista" <?php echo $eliminarD; ?> >
                            <span class="glyphicon glyphicon-trash"></span>
                          </a>
                        </td>

                      </tr>

                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>


      
    
</div>

<!--Versión3.3.1 NO BORRAR-->  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<!--Versión2.2.4 NO BORRAR-->  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
                               <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
                               <script src="/js/file.js"></script>
                              <script>
                              function principal()
                              {
                              location.href ="/";
                              }
                              </script>
@endsection
