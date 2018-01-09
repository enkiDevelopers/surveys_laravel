@extends('layouts.admin')
@section('content')
<div class="container" >
    <div class="row">
        <div class="col-md-10">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-md-4">
                            Plantillas
                        </div>    
                        <div class="col-md-9 pull-right">
                            <div class="row">
                                <div class="col-md-1">&nbsp</div>  
                                <div class="col-md-2 pull-right">
                                    Ver&nbsp&nbsp<span class="glyphicon glyphicon-eye-open"></span>
                                </div> 
                                <div class="col-md-2 pull-right">
                                    Editar&nbsp&nbsp<span class="glyphicon glyphicon-pencil" ></span>
                                </div> 
                                <div class="col-md-2 pull-right">
                                    Publicar&nbsp&nbsp<span class="glyphicon glyphicon-send"></span>
                                </div> 
                                <div class="col-md-2 pull-right">
                                    Copiar&nbsp&nbsp<span class="glyphicon glyphicon-copy"></span>
                                </div>   
  
                            </div>
                        </div>
                    </div>    
                </div>

                <div class="panel-body">
                    <div class="row">
                    	 <?php foreach ($plantillas as $plantilla) { ?>
                        <div class="col-md-4">                                          
                            <div class="card well" >
                                <img class="card-img-top" alt="Card image cap">
                                <div class="card-body">
                                    <h4 class="card-title">  <?php echo $plantilla->Titulo_ecuesta;  ?></h4>
                                    <p class="card-text">Creada por <span class="template-creator">Administrador1</span></p>
                                    <div class="btn-group " role="group" aria-label="...">
                                        <button type="button" class="btn btn-default"  data-toggle="tooltip" data-placement="top" title="Vista previa">
                                            <span class="glyphicon glyphicon-eye-open" ></span>
                                        </button>
                                        <button type="button" class="btn btn-default" onclick="editar();" data-toggle="tooltip" data-placement="top" title="Editar">
                                            <span class="glyphicon glyphicon-pencil"></span>
                                        </button>
                                        <button type="button" class="btn btn-default" data-toggle="tooltip" data-placement="top" title="Publicar">
                                            <span class="glyphicon glyphicon-send"></span>
                                        </button>
                                        <button type="button" class="btn btn-default" data-toggle="tooltip" data-placement="top" title="Copiar">
                                            <span class="glyphicon glyphicon-copy"></span>
                                        </button>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>

                <?php } ?>


                        <div class="col-md-3">
                            <div class="card well card-new-survey" >
                                <div class="card-body text-center">
                                    <h4 class="card-title">Añadir Plantilla de Encuesta</h4>
                                    <p class="card-text"></p><br>
                                        <p>
                                            <a data-toggle="modal" data-target="#ModalTitle" class="btn btn-default btn-lg btn-new-survey">
                                              <span class="glyphicon glyphicon-plus text-center"></span>  
                                            </a>
                                        </p>
                                </div>
                            </div>
                        </div>
                            
                    </div>
                </div>
            </div>


            <!-- Modal publicar encuesta-->
          
            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Publicar encuesta - Titulo de la encuesta</h4>
                </div>
                <div class="modal-body">
                <div class="input-daterange input-group" id="datepicker" data-provide="datepicker">
                    <input type="text" class="input-sm form-control" name="start" placeholder="Inicio"/>
                    <span class="input-group-addon">a</span>
                    <input type="text" class="input-sm form-control" name="end" placeholder="Final"/>
                </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Publicar</button>
                </div>
                </div>
            </div>
            </div>
       

            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-md-6">
                            
                            Encuestas publicadas
                        </div>  
                        <div class="col-md-1">&nbsp</div>  
                        <div class="col-md-5 ">
                            <div class="row">
                                <div class="col-md-4">
                                    Ver&nbsp&nbsp<span class="glyphicon glyphicon-eye-open"></span>
                                </div>
                                <div class="col-md-4">
                                    Activa<div class="pull-right survey-status survey-status__active">&nbsp</div>
                                </div> 
                                <div class="col-md-4">
                                    Finalizada<div class="pull-right survey-status survey-status__finished">&nbsp</div>
                                </div>      
                            </div>
                        </div>
                    </div>    
                    <!-- <div class=" bg-dark-red simbo">
                        <div class="row">
                            <div class="col-md-4">

                            </div>
                        </div>

                    clos<div class=" survey-status survey-status__finished">&nbsp</div></div> -->

                    </div>
                    
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="card well" >
                                <img class="card-img-top"  alt="Card image cap">
                                <div class="card-body">
                                    <h4 class="card-title">Titulo de la encuesta</h4>
                                    <p class="card-text"></p>
                                   <div class="btn-group " role="group" aria-label="...">
                                        <a href="{{ url('/surveyed/solve') }}" type="button" class="btn btn-default"  data-toggle="tooltip" data-placement="top" title="Vista previa">
                                            <span class="glyphicon glyphicon-eye-open"></span>
                                        </a>
                                    </div>                                    
                                    <div class="pull-right survey-status survey-status__finished">&nbsp</div>
                                 
                                    <!-- <a  class="" href="{{ url('/surveyed/solve') }}">Editar</a> -->
                                   
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="card well" >
                                <img class="card-img-top"  alt="Card image cap">
                                <div class="card-body">
                                    <h4 class="card-title">Titulo de la encuesta</h4>
                                    <p class="card-text"></p>
                                    <div class="btn-group"   role="group" aria-label="...">
                                        <a href="{{ url('/surveyed/solve') }}" type="button"  class="btn btn-default"  data-toggle="tooltip" data-placement="top" title="Vista previa">
                                            <span class="glyphicon glyphicon-eye-open"></span>
                                        </a>
                                    </div>
                                    <div class="pull-right survey-status survey-status__active">&nbsp</div>
                                    <!-- <a  class="" href="">Editar</a> -->
                                 
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
				 <form method="post" action="/save">
            	  {{ csrf_field() }}
        <div class="modal fade" id="ModalTitle" aria-hidden="true" data-keyboard="false" data-backdrop="static" tabindex="-1" style="z-index: 1050;" role ="dialog" aria-labelledby="myModalLabel1">
            <div class="modal-dialog" role="document">

                <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" onclick="window.history.back();" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel1">Datos principales de la plantilla de encuesta</h4>
                </div>
                <div class="modal-body">
                    <h5>Título de la encuesta:</h5>
                    <input type="text" class="form-control text-black " id="ModalTitleInput" aria-describedby="emailHelp" placeholder="Ingrese el titulo " name="titulo"><br>
                    <h5> Descripción de la encuesta:</h5>
                    <textarea class="form-control text-black" cols="10" rows="5" name="descripcion" id="ModalDescInput" aria-describedby="desc" placeholder="Ingrese la Descripción "></textarea>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal" onclick="window.history.back();">Cancelar</button>
                    <button type="submit" class="btn btn-primary" onclick="publish();" >Guardar</button>
                </div>


                </div>
            </div>
        </div>
   		  </form>
<script>
    
    window.onload = function() {
        $("#home").addClass('active');
    }

    function editar(){
        window.location = "{{ url('/administrator/edit') }}";
    }

        function verificar(){
        if ($("#exampleInputEmail1").val() != "") {
            $("#add-question").removeClass('disabled');
            window.location ="{{ url('/administrator/edit') }}";
        }else{

        }
    }

    function publish(){
        if ($("#ModalTitleInput").val() != "" && $("#ModalTitleInput").val() != " ") {
            if ($("#ModalDescInput").val() != "" && $("#ModalDescInput").val() != " ") {
                $("#exampleInputEmail1").val($("#ModalTitleInput").val());
                $("#inputDesc").val($("#ModalDescInput").val());
                $("#ModalTitle").modal('hide');
                verificar();
            }else{
                alert("Ingrese una descripción para la encuesta");
            }
            }else{
       alert("Ingrese un Título para la encuesta");
        }

    }

</script>
@endsection

