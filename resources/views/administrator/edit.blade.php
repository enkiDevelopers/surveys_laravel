@extends('layouts.back-survey')
@section('content')

<div class="container" style="position: fixed; margin-left: 270px; height: 95%;">
    <div class="row">
        <div class="col-md-12">
			<div class="row">

				@include('administrator.DataTemplate')
			    <div class="new-survey__question-container" style="position: fixed;overflow: auto;height: auto;width:75%;margin-top: 100px;">
			    </div>

				@include('administrator.saveQuestionsSection')

				<div style="overflow-x: hidden; overflow-y: auto; height: 54%;position: relative;width: 90%" id="">
					<div id="container-questions">
						@include('administrator.questionSaved')
					</div>
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

    function publish(){
    	var action = document.getElementById("updateDataTemplateForm").action;
    	var titleInput = $("#ModalTitleInput").val();
    	var descInput = $("#ModalDescInput").val();
    	//var nombre = $("#nombre").
	    var idTemplate = <?php echo $eid; ?>;

        if (titleInput.length != 0 && titleInput != " ") {
            if (descInput.length != 0 && descInput != " ") {

		        $.ajax({
			        type: "get",
			        url: action,
		            headers: {'X-CSRF-TOKEN': token},
			        dataType: 'json',
			        data: {idTemplate: idTemplate, titleInput: titleInput, descInput: descInput},
			        complete: function(e, xhr, settings){
					    if(e.status === 200){
					    	alertify.alert("Datos Guardados correctamente.", function(){
	  				            $("#exampleInputEmail1").val(titleInput);
				                $("#inputDesc").val(descInput);
				                $("#ModalTitle").modal('hide');
				                console.log(e);
							  });

					    }else{
							alertify.alert("No se han podido guardar los cambios.", function(){
							    alertify.message('OK');
							}); 
							console.log(e);   	
					    }
					},
			        error: function (textStatus, errorThrown) {
						alertify.alert("No se ha podido agregar la pregunta.", function(){
						    alertify.message('OK');
						 });
						console.log(textStatus);
			        }				
			    });
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
		        complete: function(e, xhr, settings){
				    if(e.status === 200){
				    	alertify.alert("Pregunta Guardada correctamente.", function(){
						    alertify.success('Pregunta Añadida');						
  				            $("#ModalQuestion").modal('hide').find("input").val("");
  				            $("#questionType").val("1").attr('selected','true');
  				            $(".new-question__control--delete-question").parent().parent().parent().prev().children().children().next().next().next().remove();
						  });
   							$("#container-questions").load(" #container-questions");

				    }else{
						alertify.alert("No se ha podido agregar la pregunta.", function(){
						    alertify.message('OK');
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

    function limpiar2(){
	  var canvas = document.getElementById("previewcanvas");
	  canvas.width=canvas.width;
	}

	function ShowImagePreview( files ){
	    if( !( window.File && window.FileReader && window.FileList && window.Blob ) )
	    {
	      alert('Por favor Ingrese un archivo de Imagen');
	      return false;
	    }
	    if( typeof FileReader === "undefined" )
	    {
	        alert( "Filereader undefined!" );
	        return false;
	    }
	    var file = files[0];

	    if( !( /image/i ).test( file.type ) )
	    {
	        alert( "El archivo no es una imagen" );
	        return false;
	    }

	    reader = new FileReader();
	    reader.onload = function(event)
	            { var img = new Image;
	              img.onload = UpdatePreviewCanvas;
	              img.src = event.target.result;  }
	    reader.readAsDataURL( file );
	}

	function UpdatePreviewCanvas()	{
	    var img = this;
	    var canvas = document.getElementById( 'previewcanvas' );

	    if( typeof canvas === "undefined"
	        || typeof canvas.getContext === "undefined" )
	        return;

	    var context = canvas.getContext( '2d' );

	    var world = new Object();
	    world.width = canvas.offsetWidth;
	    world.height = canvas.offsetHeight;

	    canvas.width = world.width;
	    canvas.height = world.height;

	    if( typeof img === "undefined" )
	        return;

	    var WidthDif = img.width - world.width;
	    var HeightDif = img.height - world.height;

	    var Scale = 0.0;
	    if( WidthDif > HeightDif )
	    {
	        Scale = world.width / img.width;
	    }
	    else
	    {
	        Scale = world.height / img.height;
	    }
	    if( Scale > 1 )
	        Scale = 1;

	    var UseWidth = Math.floor( img.width * Scale );
	    var UseHeight = Math.floor( img.height * Scale );

	    var x = Math.floor( ( world.width - UseWidth ) / 2);
	    var y = Math.floor( ( world.height - UseHeight ) / 2 );

	    context.drawImage( img, x, y, 200, 200 );
	}


</script>
