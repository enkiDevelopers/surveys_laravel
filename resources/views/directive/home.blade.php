@extends('layouts.directive')
@section('content')



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