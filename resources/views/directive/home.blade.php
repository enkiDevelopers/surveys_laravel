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
                        <div class="col-md-4">
                            <div class="card well" >
                                

                                <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6"><img class="card-img-top" alt="Card image cap" src="\img/iconos/<?php echo $encuesta->Image_path;?>" width="100%" height="90px"> </div>
                                    <div class="col-md-6">
                                    <h4 class="card-title">  <?php echo $encuesta->Titulo_encuesta;  ?></h4>
                                    <p class="card-text">Creada por <span class="template-creator">Administrador1</span></p>
                                    </div>
                                </div>
                                <hr>
                                    <div class="btn-group " role="group" aria-label="...">
                                    <button type="button" class="btn btn-default" data-toggle="modal" data-cliente="{{$encuesta->id}}" data-target="#MdReporte" data-toggle="tooltip" data-placement="top" title="Reporte disponible">
                                            <span class="glyphicon glyphicon-eye-open" ></span>
                                    </button>

                                    </div>
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