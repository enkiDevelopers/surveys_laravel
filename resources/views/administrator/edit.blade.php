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
			                	<img src="\img/iconos/<?php echo $nombre;?>" width="10%" height="10%"> 
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

				@include('administrator.saveQuestionsTemplate')

				<div style="overflow-x: hidden; overflow-y: auto; height: 54%;position: relative;width: 90%" id="container-questions">
				</div>
        	</div>
    	</div>
	</div>
</div>

				@include('administrator.modalTitle')

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

    function saveQuestion(){

	    var action = document.getElementById("saveQuestionForm").action;
	    var questionInput = $("#questionInput").val();
	    var questionType= $("#questionType").val();
        var token = $("#token").val();

       $.ajax({
	        type: "post",
	        url: action,
            headers: {'X-CSRF-TOKEN': token},
	        dataType: 'json',
	        data: {questionInput: questionInput, questionType: questionType },
	        success: function(data) {
	        	if (data == 1) {
	        		alertify.alert("Pregunta Guardada correctamente ", function(){
					    alertify.message('OK');
					  });
	        	}
	        },
	        error: function (textStatus, errorThrown) {
				alert("No se ha podido agregar la pregunta");
	        }
	    });
    }
</script>