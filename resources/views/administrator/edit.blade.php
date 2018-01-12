@extends('layouts.back-survey')
@section('content')

<div class="container" style="position: fixed; margin-left: 270px; height: 95%;">
    <div class="row">
        <div class="col-md-12">
			<div class="row">
			    <div class="col-md-12 ">
			        <div>
			            <div class="col-md-10 col-sm-12  light-grey">
			                <h2 class="text-center">Plantilla de Encuesta</h2>
			            </div>
			       		<div class="col-md-10" style="margin-top:10px;">
			       			<center>
			                <!--	<img src="img/iconos/<?php echo $nombre;?>" width="10%" height="10%"> -->
			            	</center>
			            </div>
			            <div class="col-md-10 col-sm-12  " style="width:100%;">
			                <div class="form-group" style="position: fixed;"></div>
			                <label for="exampleInputEmail1" >Título de la encuesta</label>
			            </div>
			            <div class="col-md-10" style="margin-top: 5px;margin-bottom:15px;">
			                <input type="text" class="form-control text-black" disabled id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Titulo de la Encuesta" value="<?php echo $titulo; ?>">
			            </div>
			            <div class="col-md-10 col-sm-12 " style="width:100%;">
			                <div class="form-group" style="position: fixed;"></div>
			                <label for="exampleInputEmail1" >Descripión de la encuesta</label>
			            </div>
			            <div class="col-md-10" style="margin-top: 5px;">
			                <textarea rows="2" cols="50" class="form-control text-black" disabled id="inputDesc" aria-describedby="desc" placeholder="Descripción"><?php echo $descripcion; ?> </textarea>
			            </div>
			            <div class="row col-md-12">
			            	<div class="col-md-9 "></div>
					            <div class="col-md-3 pull-right" style="margin-top:10px;">
					                <a data-toggle="modal" data-target="#ModalTitle" class="btn btn-info">
						                <span class="glyphicon glyphicon-pencil"></span>
					                </a>
					            </div>
					   </div>
					    <div class="row col-md-12">
			                <div class=" new-survey__controls " > <center>
			                	<div class="col-md-4 pull-left col-md-offset-3 ">
			                        <button class="btn btn-success new-survey__control "  onclick="ModalQuestion();" id="add-question">Agregar pregunta</button>
			                    </div>
			                    <div class="col-md-1 pull-left">
				                    <a href="" class="btn btn-success">
				                    	<span class=" glyphicon glyphicon-eye-open "></span>
				                	</a>
			                    </div>
</center>
			                </div>
	  				    </div>

			    	</div>
				</div><br><br><br><br><br>
																						 <!-- height: 70% -->
		    <div class="new-survey__question-container" style="position: fixed;overflow: auto;height: auto;width:75%;margin-top: 100px;">
		    </div>

		    <div class="row hide yes-no-question-block " id="yes-no-question-template">
		                            <div class="col-md-12 " data-questions="0" id="childSupport">
		                                <div class="btn-group btn-group-sm pull-right" role="group" aria-label="...">
		                                    <button class="btn btn-success add-question-to-yes-no">
		                                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
		                                    </button>
		                                </div>
		                                <div class="col-md-12" id="multi-options">
		                                    <div class="col-md-12 " data-multioptions="0" id="multi-options-template" >
		                                        <div class="form-group">
		                                            <label for="exampleInputEmail1">Opción Respuesta</label>
		                                            <input type="text" class="form-control text-black-body" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="¿Cual es la pregunta?">
				                                    <button class="btn btn-danger delete-question-to-yes-no pull-right" disabled="" style="margin-top: 5px;">
		                                        		<span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
		                                    		</button>
		                                        </div>
		                                    </div>
		                                    <div class="col-md-4">
		                                    </div>
		                                </div>
		                            </div>
		    </div>

			<div class="row new-question-template " id="new-question-template">
				<div aria-hidden="true" data-keyboard="false" data-backdrop="static" tabindex="-1" style="position: fixed;z-index: 1070;" class="modal fade" id="ModalQuestion" role="dialog" aria-labelledby="ModalQuestionLabel" >
					<div class="modal-dialog" role="document" style="width: 825px;">
				    <div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
				            <h4 class="modal-title" id="ModalQuestionLabel">Agregar Pregunta</h4>
			                	<img src="https://www.mathworks.com/content/mathworks/www/en/solutions/verification-validation/jcr:content/svg.adapt.full.high.svg/1507664300553.svg" width="10%" height="10%">
						</div>
						<div class="modal-body">
			                <div class=" col-md-12 well">
			                    <div class="col-md-2">
			                        <div class="form-group">
			                            <label for="exampleInputEmail1">Número</label>
			                                <select class="form-control questions-of-master-survey text-black-body"></select>
			                            </div>
			                    </div>
			                    <div class="col-md-6 ">
			                        <div class="form-group">
			                            <label for="exampleInputEmail1">Título de la pregunta</label>
			                            <input type="text" class="form-control text-black-body" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="¿Cual es la pregunta?">
			                        </div>
			                    </div>
			                    <div class="col-md-4">
			                        <div class=" form-group">
			                            <label for="exampleInputEmail1">Tipo</label>
			                                <select class="form-control yes-no-question text-black-body">
			                                    <option value="1">Pregunta abierta</option>
			                                    <option value="2">Pregunta de opción multiple </option>
			                                </select>
			                        </div>
			                    </div>
			                </div>
						</div>
						<div class="modal-footer">
						 <div class="row">
							<div class="col-md-12 pull-right">

			           		<!--	<button class="btn btn-info col-md-1 pull-right new-question__control
									new-question__control--edit-question"> -->
			                        <button class="btn btn-danger col-md-1 pull-right new-question__control new-question__control--add-question">
			                	        <span class="glyphicon glyphicon-floppy-saved" aria-hidden="true"></span>
			                        </button>
			                        <button class="btn btn-info col-md-1 pull-right new-question__control new-question__control--delete-question">
			                            <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
			                        </button>
			                    </div>
			                </div>

						</div>
					</div>
					</div>
				</div>
			</div>

		<div style="overflow-x: hidden; overflow-y: auto; height: 54%;position: relative;width: 90%">
            <div class="row col-md-12 new-question-template " style="margin-left: 13px;margin-top: 15px; ">
                <div class="col-md-11 well">
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Número</label>
                            <select class="form-control questions-of-master-survey text-black-body" disabled="">
                            	<option value="1">1</option>
                            	<option value="2">2</option>
                            	<option value="3">3</option>
                            	<option value="4">4</option>

                            </select>
                        </div>
                    </div>
	                <div class="col-md-6 ">
	                    <div class="form-group">
	                        <label for="exampleInputEmail1">Título de la pregunta</label>
	                        <input type="text" class="form-control text-black-body" id="exampleInputEmail1" aria-describedby="emailHelp" value="Pregunta Uno" disabled="">
	                    </div>
	                </div>
	                <div class="col-md-4">
	                                    <div class=" form-group">
	                                        <label for="exampleInputEmail1">Tipo</label>
	                                        <select class="form-control yes-no-question text-black-body" disabled="">
	                                            <option value="1">Pregunta abierta</option>
	                                            <option value="2">Pregunta de opción Multiple </option>
	                                        </select>
	                                    </div>
	                </div>
	                <div class="col-md-2 pull-right" style="margin-bottom: 15px;">
	                                    <div class="row">
	                                        <button class="btn btn-danger col-md-4  new-question__control new-question__control--edit-question">
	                                            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
	                                        </button>
	                                        <button class="btn btn-info col-md-4 new-question__control new-question__control--delete-question">
	                                            <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
	                                        </button>
	                                    </div>
	                </div>
                </div>
            </div>

            <div class="row col-md-12 new-question-template " style="margin-left: 13px;margin-top: 15px; ">
                <div class="col-md-11 well">
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Número</label>
                            <select class="form-control questions-of-master-survey text-black-body" disabled="">

                            	<option value="2">2</option>
                            	<option value="3">3</option>
                            	<option value="4">4</option>

                            </select>
                        </div>
                    </div>
	                <div class="col-md-6 ">
	                    <div class="form-group">
	                        <label for="exampleInputEmail1">Título de la pregunta</label>
	                        <input type="text" class="form-control text-black-body" id="exampleInputEmail1" aria-describedby="emailHelp" value="Pregunta Dos" disabled="">
	                    </div>
	                </div>
	                <div class="col-md-4">
	                                    <div class=" form-group">
	                                        <label for="exampleInputEmail1">Tipo</label>
	                                        <select class="form-control yes-no-question text-black-body" disabled="">
	                                            <option value="2">Pregunta de opción Multiple </option>
	                                        </select>
	                                    </div>
	                </div>
		                                <div class="col-md-12" id="multi-options">
		                                    <div class="col-md-12 " data-multioptions="0" id="multi-options-template" >
		                                        <div class="form-group">
		                                        	<div class="col-md-6">
		                                            <label for="exampleInputEmail1">Opción Respuesta</label>
		                                            <input type="text" class="form-control text-black-body" id="exampleInputEmail1" aria-describedby="emailHelp" value="Opción Uno" disabled="">
													</div>
													<div class="col-md-3 pull-right">
		                                            <label for="brincoInput">Brincar</label>
		                                            <select class="form-control text-black-body">
>
		                                            </select>
													</div>

		                                        </div>
		                                    </div>
		                                    <div class="col-md-4">
		                                    </div>
		                                </div>

		                                <div class="col-md-12" id="multi-options">
		                                    <div class="col-md-12 " data-multioptions="0" id="multi-options-template" >
		                                        <div class="form-group">
		                                        	<div class="col-md-6">
		                                            <label for="exampleInputEmail1">Opción Respuesta</label>
		                                            <input type="text" class="form-control text-black-body" id="exampleInputEmail1" aria-describedby="emailHelp" value="Opción Uno" disabled="">
													</div>
													<div class="col-md-3 pull-right">
		                                            <label for="brincoInput">Brincar</label>
		                                            <select class="form-control text-black-body">
		                                            	<option value="3">3</option>
		                                            	<option value="4">4</option>
		                                            </select>
													</div>

		                                        </div>
		                                    </div>
		                                    <div class="col-md-4">
		                                    </div>
		                                </div>

		                                <div class="col-md-12" id="multi-options">
		                                    <div class="col-md-12 " data-multioptions="0" id="multi-options-template" >
		                                        <div class="form-group">
		                                        	<div class="col-md-6">
		                                            <label for="exampleInputEmail1">Opción Respuesta</label>
		                                            <input type="text" class="form-control text-black-body" id="exampleInputEmail1" aria-describedby="emailHelp" value="Opción Tres" disabled="">
													</div>
													<div class="col-md-3 pull-right">
		                                            <label for="brincoInput">Brincar</label>
		                                            <select class="form-control text-black-body" >
		                                            	<option value="4">4</option>
		                                            	<option value="3">3</option>
		                                            </select>
													</div>

		                                        </div>
		                                    </div>
		                                    <div class="col-md-4">
		                                    </div>
		                                </div>
	                <div class="col-md-2 pull-right" style="margin-bottom: 15px;">
	                                    <div class="row">
	                                        <button class="btn btn-danger col-md-4  new-question__control new-question__control--edit-question">
	                                            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
	                                        </button>
	                                        <button class="btn btn-info col-md-4 new-question__control new-question__control--delete-question">
	                                            <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
	                                        </button>
	                                    </div>
	                </div>
                </div>
            </div>

            <div class="row col-md-12 new-question-template " style="margin-left: 13px;margin-top: 15px; ">
                <div class="col-md-11 well">
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Número</label>
                            <select class="form-control questions-of-master-survey text-black-body" disabled="">
                            	<option value="3">3</option>
                            	<option value="4">4</option>
                            </select>
                        </div>
                    </div>
	                <div class="col-md-6 ">
	                    <div class="form-group">
	                        <label for="exampleInputEmail1">Título de la pregunta</label>
	                        <input type="text" class="form-control text-black-body" id="exampleInputEmail1" aria-describedby="emailHelp" value="Preunta Tres" disabled="">
	                    </div>
	                </div>
	                <div class="col-md-4">
	                                    <div class=" form-group">
	                                        <label for="exampleInputEmail1">Tipo</label>
	                                        <select class="form-control yes-no-question text-black-body" disabled="">
	                                            <option value="1">Pregunta abierta</option>
	                                        </select>
	                                    </div>
	                </div>
	                <div class="col-md-2 pull-right" style="margin-bottom: 15px;">
	                                    <div class="row">
	                                        <button class="btn btn-danger col-md-4  new-question__control new-question__control--edit-question">
	                                            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
	                                        </button>
	                                        <button class="btn btn-info col-md-4 new-question__control new-question__control--delete-question">
	                                            <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
	                                        </button>
	                                    </div>
	                </div>
                </div>
            </div>

            <div class="row col-md-12 new-question-template " style="margin-left: 13px;margin-top: 15px; ">
                <div class="col-md-11 well">
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Número</label>
                            <select class="form-control questions-of-master-survey text-black-body" disabled="">
                            	<option value="4">4</option>

                            </select>
                        </div>
                    </div>
	                <div class="col-md-6 ">
	                    <div class="form-group">
	                        <label for="exampleInputEmail1">Título de la pregunta</label>
	                        <input type="text" class="form-control text-black-body" id="exampleInputEmail1" aria-describedby="emailHelp" value="Pregunta Cuatro" disabled="">
	                    </div>
	                </div>
	                <div class="col-md-4">
	                                    <div class=" form-group">
	                                        <label for="exampleInputEmail1">Tipo</label>
	                                        <select class="form-control yes-no-question text-black-body" disabled="">
	                                            <option value="1">Pregunta abierta</option>
	                                        </select>
	                                    </div>
	                </div>
	                <div class="col-md-2 pull-right" style="margin-bottom: 15px;">
	                                    <div class="row">
	                                        <button class="btn btn-danger col-md-4  new-question__control new-question__control--edit-question">
	                                            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
	                                        </button>
	                                        <button class="btn btn-info col-md-4 new-question__control new-question__control--delete-question">
	                                            <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
	                                        </button>
	                                    </div>
	                </div>
                </div>
            </div>
		</div>
        </div>
    </div>
</div>
</div>


          <div class="modal fade" id="ModalTitle" aria-hidden="true" data-keyboard="false" data-backdrop="static" tabindex="-1" style="z-index: 1050;" role ="dialog" aria-labelledby="myModalLabel1">
            <div class="modal-dialog" role="document">

                <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
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
                    <button type="button" class="btn btn-default" data-dismiss="modal" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary" onclick="publish();" >Guardar</button>
                </div>


                </div>
            </div>
        </div>

 @endsection
<script>

    window.onload = function() {
        $("#home").addClass('active');
     }

     function ModalQuestion(){
     	$("#ModalQuestion").appendTo('body').modal();
     }

         function verificar(){
        if ($("#exampleInputEmail1").val() != "") {
            $("#add-question").removeClass('disabled');
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
