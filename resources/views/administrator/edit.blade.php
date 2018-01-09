@extends('layouts.back-survey')
@section('content')

<div class="container" style="position: fixed; margin-left: 270px; height: 95%;">
    <div class="row">
        <div class="col-md-11">

			<div class="row">
			    <div class="col-md-12 ">
			        <div>
			            <div class="col-md-9 col-sm-12  light-grey" style="width:100%;">
			                <h2 class="text-center">Nueva encuesta</h2>
			            </div>
			            <div class="col-md-9 col-sm-12  light-grey" style="width:100%;">
			                <div class="form-group" style="position: fixed;"></div> 
			                <label for="exampleInputEmail1" >Titulo de la encuesta</label>
			            </div>
			            <div class="col-md-9" style="margin-top: 20px;">
			                <input type="text" class="form-control text-black" disabled id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Titulo de la Encuesta" value="asdlkjsadkla">
			            </div>
			            <div class="col-md-9" style="margin-top: 20px;">
			                <textarea rows="2" cols="50" class="form-control text-black" disabled id="inputDesc" aria-describedby="desc" placeholder="Descripción de la Encuesta">sadsa</textarea>
			            </div><br><br>
			            <div class="col-md-1"  ></div>
			            <div class="col-md-2 pull-left" style="margin-top:-40px;">
			                <a data-toggle="modal" data-target="#ModalTitle" class="btn btn-info">
				                <span class="glyphicon glyphicon-pencil"></span>
			                </a>
			                <a href="" class="btn btn-success" >
			                    <span class=" glyphicon glyphicon-eye-open "></span>
			                </a>
			                <div class=" new-survey__controls" style="margin-top: 20px;margin-left: -30px;" >
			                	<div>
			                        <button class="btn btn-success col-md-11 new-survey__control " onclick="ModalQuestion();" id="add-question">Agregar pregunta</button>
			                    </div>
			                </div>
			            </div>
			        </div>
			    </div>
			</div><br><br><br><br><br>

		    <div class="new-survey__question-container" style="position: fixed;overflow: auto;height: 70%;width:75%;margin-top: 100px;">
		    </div>

		    <div class="row hide yes-no-question-block " id="yes-no-question-template">
		                            <div class="col-md-12 well" data-questions="0" id="childSupport">
		                                <div class="btn-group btn-group-sm pull-right" role="group" aria-label="...">
		                                    <button class="btn btn-success add-question-to-yes-no">
		                                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
		                                    </button>
		                                </div>
		                                <div class="col-md-12" id="multi-options">
		                                    <div class="col-md-12 " data-multioptions="0">
		                                        <div class="form-group">
		                                            <label for="exampleInputEmail1">Opción Respuesta</label>
		                                            <input type="text" class="form-control text-black-body" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="¿Cual es la pregunta?">
				                                    <button class="btn btn-danger delete-question-to-yes-no pull-right" style="margin-top: 5px;">
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

			                        <button class="btn btn-info col-md-1 pull-right new-question__control new-question__control--edit-question">
			                	        <span class="glyphicon glyphicon-floppy-saved" aria-hidden="true"></span>
			                        </button>
			                        <button class="btn btn-danger col-md-1 pull-right new-question__control new-question__control--delete-question">
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
</div>      

 @endsection
<script>

    window.onload = function() {
        $("#home").addClass('active');
     }

     function ModalQuestion(){
     	$("#ModalQuestion").appendTo('body').modal();
     }

</script>