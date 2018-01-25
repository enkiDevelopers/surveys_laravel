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
	</div>
</div><br><br><br><br><br>
<script>

    window.onload = function() {
        $("#home").addClass('active');
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
        var numPregSig = $("#numPregSig").val();
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
                data: {idTemplate: idTemplate, numPregSig: numPregSig, questionInput: questionInput, questionType: questionType },
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

    function UpdatePreviewCanvas()  {
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