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
          <div class="circle" style="background-image: url('/img/avatar/{{$info->imagenPerfil}}')" onclick="return principal();">
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



<div class="container" style="margin-top: 130px;" >
    <div class="row" >
                          <div class="col-sm-0">
                      </div>
      <div class="col-md-12 top">
             <!--   <div id="btnT">


                       <div id="btn-añadir" class="col-md-12">
                             <a data-toggle="modal" data-target="#AgregarLista" >

                             <div id="content-btn">
                                <span class="glyphicon glyphicon-plus" ></span>
                             </div>
                             <div id="crearPlantilla">
                                 <h2 id="tamañoLet">Nueva Lista</h2>
                             </div>
                           </a>
                        </div>
                </div>-->
                          <div class="col-md-4 top">
                              <div style="display:none;" id="datain">
                                    <p class="text-center parrafo">Procesando Lista</p>
                                    <center><img src="/img/load/load.gif"></center>
                              </div>
                          </div>


      <div class="col-md-12 text-center" id="titulo">
         <div class="col-md-6">Agregar Nueva Lista</div>
         <div class="col-md-2">
              <a  class="btn btn-primary" data-toggle="modal" data-target="#AgregarLista">Añadir</a>
         </div>
       </div>

       <hr>
        <div class="col-md-12 marge" id="divid" style="overflow:auto;">
            <table class="table table-striped">
                <thead>
                  <tr class="info">
                    <th>Estado</th>
                    <th>Nombre Lista</th>
                    <th>Encuesta Asociada</th>
                    <th>Cargar Archivos</th>
                    <th>Crear Lista</th>
                    <th>Ver Lista</th>
                    <th>Cargar Incidencias</th>
                    <th>Ver incidencias</th>
                    <th>Eliminar Lista</th>
                  </tr>
                </thead>
                <tbody id="tabla">
                  <?php
                    $hoy = date("Y-m-d H:i:s");
                    foreach ($listas as $lista) {
                      switch ($lista->carga) {
                        case '0':
                        ?>
                                  <tr>
                                  <td>
                                    <img src="/img/listo.jpg" width="30px" height="30px">
                                  </td>
                                  <td>
                                      <?php echo $lista->nombre; ?>
                                  </td>
                                  <td>
                                  </td>
                                  <td>
                                      <a class="btn btn-default" data-toggle="modal" data-target="#AgregarDatos" id="<?php echo $lista->idLista; ?>" onClick="reply_click(this.id)" class="btn btn-default" data-toggle="tooltip" data-placement="top" title="Agregar Datos"  >
                                          <span class="glyphicon glyphicon-edit"></span>
                                      </a>
                                  </td>

                                  <td>
                                      <a type="button" class="btn btn-default" disabled="disabled">
                                          <span class="glyphicon glyphicon-play-circle"></span>
                                      </a>
                                  </td>

                                  <td>
                                      <a class="btn btn-default"  title="Vista previa"  disabled="disabled">
                                          <span class="glyphicon glyphicon-eye-open"></span>
                                      </a>
                                  </td>
                                  <td>
                                      <a class="btn btn-default" data-toggle="tooltip" data-placement="top" title="Agregar Incidencias" disabled="disabled" >
                                          <span class="glyphicon glyphicon-plus"></span>
                                      </a>
                                  </td>
                                  <td>
                                      <a type="button" class="btn btn-default"  data-toggle="tooltip" data-placement="top" title="Mostrar incidencias"  disabled>
                                          <span class="glyphicon glyphicon-alert"></span>
                                      </a>
                                  </td>
                                  <td>
                                      <a class="btn btn-default" data-toggle="modal" data-target="#deleteFileModal" onclick="deleteFile({{$lista->idLista}});" class="btn btn-default" data-toggle="tooltip" data-placement="top" title="Eliminar lista" >
                                          <span class="glyphicon glyphicon-trash"></span>
                                      </a>
                                  </td>

                                </tr>

                      <?php
                          break;
                      case '2':
                      ?>
                                <tr>
                                   <td>
                                    <img src="/img/listo.jpg" width="30px" height="30px">
                                  </td>
                                  <td>
                                      <?php echo $lista->nombre; ?>
                                  </td>
                                  <td>
                                  </td>
                                  <td>
                                      <a class="btn btn-default"  id="<?php echo $lista->idLista; ?>" onClick="reply_click(this.id)" class="btn btn-default" data-toggle="tooltip" data-placement="top" title="Agregar Datos"  >
                                          <span class="glyphicon glyphicon-edit"></span>
                                      </a>
                                  </td>

                                  <td>
                                          <a type="button"  id="<?php echo $lista->idLista; ?>" onClick="creardato(this.id)" class="btn btn-default" data-toggle="tooltip" data-placement="top" title="Cargar Datos">
                                              <span class="glyphicon glyphicon-play-circle"></span>
                                          </a>
                                  </td>
                                  <td>
                                      <a class="btn btn-default"  title="Vista previa"  disabled="disabled">
                                          <span class="glyphicon glyphicon-eye-open"></span>
                                      </a>
                                  </td>
                                  <td>
                                      <a class="btn btn-default" data-toggle="tooltip" data-placement="top" title="Agregar Incidencias" disabled="disabled" >
                                          <span class="glyphicon glyphicon-plus"></span>
                                      </a>
                                  </td>
                                  <td>
                                      <a type="button" class="btn btn-default"  data-toggle="tooltip" data-placement="top" title="Mostrar incidencias"  disabled>
                                          <span class="glyphicon glyphicon-alert"></span>
                                      </a>
                                  </td>
                                  <td>
                                      <a class="btn btn-default" data-toggle="modal" data-target="#deleteFileModal" onclick="deleteFile({{$lista->idLista}});" class="btn btn-default" data-toggle="tooltip" data-placement="top" title="Eliminar lista" >
                                          <span class="glyphicon glyphicon-trash"></span>
                                      </a>
                                  </td>

                                </tr>

                      <?php
                      break;
                      case '1':
                        if($lista->usado== 0){
                      ?>
                              <tr>
                                <td>
                                    <img src="/img/listo.jpg" width="30px" height="30px">
                                </td>
                                <td>
                                    <?php echo $lista->nombre; ?>
                                </td>
                                <td>

                                </td>
                                <td>
                                    <a class="btn btn-default" title="Agregar Datos" disabled="disabled">
                                        <span class="glyphicon glyphicon-edit"></span>
                                    </a>
                                </td>

                                <td>
                                  <a class="btn btn-default" title="Agregar Datos" disabled="disabled" >
                                        <span class="glyphicon glyphicon-play-circle"></span>
                                    </a>
                                </td>

                                <td>
                                    <a type="button" href="/administrator/file/open/<?php echo $lista->idLista ?>" class="btn btn-default"  data-toggle="tooltip" data-placement="top" title="Vista previa" target="_black">
                                        <span class="glyphicon glyphicon-eye-open"></span>
                                    </a>
                                </td>
                                <td>
                                    <a class="btn btn-default" data-toggle="modal" data-target="#AgregarIncidentes" id="<?php echo $lista->idLista; ?>" onClick="reply_click2(this.id)" class="btn btn-default" data-toggle="tooltip" data-placement="top" title="Agregar Incidencias" >
                                        <span class="glyphicon glyphicon-plus"></span>
                                    </a>
                                </td>
                                <td>
                                    <a type="button" href="/administrator/file/incidentes/<?php echo $lista->idLista ?>" class="btn btn-default"  data-toggle="tooltip" data-placement="top" title="Mostrar incidencias" target="_black">
                                        <span class="glyphicon glyphicon-alert"></span>
                                    </a>
                                </td>
                                <td>
                                    <a data-toggle="modal" data-target="#deleteFileModal" onclick="deleteFile({{$lista->idLista}});" class="btn btn-default" data-toggle="tooltip" data-placement="top" title="Eliminar lista">
                                        <span class="glyphicon glyphicon-trash"></span>
                                    </a>
                                </td>

                              </tr>

                       <?php }else{?>
                          <tr>
                             <td>
                                    <img src="/img/listo.jpg" width="10px" height="10px">
                             </td>
                            <td>
                                <?php echo $lista->nombre; ?>
                            </td>
                            <td>
                                <?php echo $lista->titulo; ?>
                            </td>
                            <td>
                                <a class="btn btn-default" title="Agregar Datos" disabled="disabled" >
                                    <span class="glyphicon glyphicon-edit"></span>
                                </a>
                            </td>

                            <td>
                                <a class="btn btn-default" data-placement="top" title="Agregar Datos" disabled="disabled" >
                                    <span class="glyphicon glyphicon-play-circle"></span>
                                </a>
                            </td>

                            <td>
                                <a type="button" href="/administrator/file/open/<?php echo $lista->idLista ?>" class="btn btn-default"  data-toggle="tooltip" data-placement="top" title="Vista previa" target="_black">
                                    <span class="glyphicon glyphicon-eye-open"></span>
                                </a>
                            </td>
                            <td>
                            <?php
                              if($hoy>=$lista->fechat){
                            ?>
                                <a class="btn btn-default" data-toggle="tooltip" data-placement="top" title="Agregar Incidencias" disabled="disabled" >
                                    <span class="glyphicon glyphicon-plus"></span>
                                </a>
                            <?php
                              }else{
                            ?>
                                <a data-toggle="modal" data-target="#AgregarIncidentes" id="<?php echo $lista->idLista; ?>" onClick="reply_click(this.id)" class="btn btn-default" data-toggle="tooltip" data-placement="top" title="Agregar Incidencias" >
                                    <span class="glyphicon glyphicon-plus"></span>
                                </a>
                            <?php
                              }
                            ?>
                            </td>
                            <td>
                                <a type="button" href="/administrator/file/incidentes/<?php echo $lista->idLista ?>" class="btn btn-default"  data-toggle="tooltip" data-placement="top" title="Mostrar incidencias" target="_black">
                                    <span class="glyphicon glyphicon-alert"></span>
                                </a>
                            </td>
                            <td>
                                <a class="btn btn-default" data-placement="top" title="Eliminar lista" disabled="disabled">
                                    <span class="glyphicon glyphicon-trash"></span>
                                </a>
                            </td>
                          </tr>
                        

                      <?php
                      }
                      break;
                      ?>
                      <?php
                      case '3':
                      ?>
                            <tr>
                                  <td>
                                    <img src="/img/cargando.png" width="30px" height="30px" data-toggle="tooltip" data-placement="top" title="Agregando datos de listas">
                                  </td>
                                  <td>
                                      <?php echo $lista->nombre; ?>
                                  </td>
                                  <td>
                                  </td>
                                  <td>
                                      <a class="btn btn-default"  disabled="disabled"  >
                                          <span class="glyphicon glyphicon-edit"></span>
                                      </a>
                                  </td>

                                  <td>
                                          <a type="button"   class="btn btn-default"  disabled="disabled" >
                                              <span class="glyphicon glyphicon-play-circle"></span>
                                          </a>
                                  </td>

                                  <td>
                                      <a class="btn btn-default"  title="Vista previa"  disabled="disabled">
                                          <span class="glyphicon glyphicon-eye-open"></span>
                                      </a>
                                  </td>
                                  <td>
                                      <a class="btn btn-default" data-toggle="tooltip" data-placement="top" title="Agregar Incidencias" disabled="disabled" >
                                          <span class="glyphicon glyphicon-plus"></span>
                                      </a>
                                  </td>
                                  <td>
                                      <a type="button" class="btn btn-default"  data-toggle="tooltip" data-placement="top" title="Mostrar incidencias"  disabled>
                                          <span class="glyphicon glyphicon-alert"></span>
                                      </a>
                                  </td>
                                  <td>
                                      <a class="btn btn-default" data-toggle="modal" data-target="#deleteFileModal" onclick="deleteFile({{$lista->idLista}});" class="btn btn-default" data-toggle="tooltip" data-placement="top" title="Eliminar lista" >
                                          <span class="glyphicon glyphicon-trash"></span>
                                      </a>
                                  </td>

                                </tr>

                      <?php
                      break;
                      case '4':
                      ?>
                            <tr>
                                  <td>
                                    <img src="/img/cargando.png" width="30px" height="30px" data-toggle="tooltip" data-placement="top" title="Agregando incidentes">
                                  </td>
                                  <td>
                                      <?php echo $lista->nombre; ?>
                                  </td>
                                  <td>
                                  </td>
                                  <td>
                                      <a class="btn btn-default"  disabled="disabled" >
                                          <span class="glyphicon glyphicon-edit"></span>
                                      </a>
                                  </td>

                                  <td>
                                          <a type="button"  class="btn btn-default" disabled="disabled"  >
                                              <span class="glyphicon glyphicon-play-circle"></span>
                                          </a>
                                  </td>

                                  <td>
                                      <a class="btn btn-default"  title="Vista previa"  disabled="disabled">
                                          <span class="glyphicon glyphicon-eye-open"></span>
                                      </a>
                                  </td>
                                  <td>
                                      <a class="btn btn-default" data-toggle="tooltip" data-placement="top" title="Agregar Incidencias" disabled="disabled" >
                                          <span class="glyphicon glyphicon-plus"></span>
                                      </a>
                                  </td>
                                  <td>
                                      <a type="button" class="btn btn-default"  data-toggle="tooltip" data-placement="top" title="Mostrar incidencias"  disabled>
                                          <span class="glyphicon glyphicon-alert"></span>
                                      </a>
                                  </td>
                                  <td>
                                      <a class="btn btn-default" data-toggle="modal" data-target="#deleteFileModal" onclick="deleteFile({{$lista->idLista}});" class="btn btn-default" data-toggle="tooltip" data-placement="top" title="Eliminar lista" >
                                          <span class="glyphicon glyphicon-trash"></span>
                                      </a>
                                  </td>

                                </tr>

                      <?php
                      break;

                        
                        default:
                          
                          break;
                      }

                    }
                    ?>

                </tbody>
            </table>
</div>


      </div>
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
