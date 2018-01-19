@extends('layouts.back-survey')
@section('content')

<div class="container" style="position: fixed; margin-left: 270px; height: 95%;">
    <div class="row">
        <div class="col-md-12">
			<div class="row">

				@include('administrator.DataTemplate')
																						 <!-- height: 70% -->
			    <div class="new-survey__question-container" style="position: fixed;overflow: auto;height: auto;width:75%;margin-top: 100px;">
			    </div>

				@include('administrator.saveQuestionsSection')

				<div style="overflow-x: hidden; overflow-y: auto; height: 54%;position: relative;width: 90%" id="container-questions">
				@include('administrator.questionSaved')
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
	    var idTemplate = <?php echo $eid; ?>;
	    var questionInput = $("#questionInput").val();
	    //var questionOptionInput = $("#questionOptionInput").text();
	    var questionType= $("#questionType").val();
        var token = $("#token").val();

        if (questionInput.length == 0 || questionOptionInput.length == 0) {
       		alertify.alert("Ingrese una pregunta.", function(){
			    alertify.message('OK');
		  });
        }else if (questionInput.length < 200 || questionOptionInput.length < 50){
	        $.ajax({
		        type: "post",
		        url: action,
	            headers: {'X-CSRF-TOKEN': token},
		        dataType: 'json',
		        data: {idTemplate: idTemplate, questionInput: questionInput, questionType: questionType },
		        success: function(data) {
		        	if (data != 1) {
		        		alertify.alert("Pregunta Guardada correctamente.", function(){
						    alertify.success('Pregunta Añadida');						
  				            $("#ModalQuestion").modal('hide').find("input").val("");
  				            $("#questionType").val("1").attr('selected','true');
  				            $(".new-question__control--delete-question").parent().parent().parent().prev().children().children().next().next().next().remove();

  				            console.log(data);

						  });
		        	}
		        },
		        error: function (textStatus, errorThrown) {
					alertify.alert("No se ha podido agregar la pregunta.", function(){
					    alertify.message('OK');
					 });
		        }
		    });
		}
		else {
		    alertify.alert("Máximo 200 carácteres", function(){
			    alertify.message('OK');
			});
		}        
    }
</script>
