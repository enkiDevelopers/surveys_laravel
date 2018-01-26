$(document).ready(function(){

    /* Abrimos modal para agregar pregunta********************************************/
    $("#addQuestion").click(function(){
        //alert("Hola");
        $("#ModalQuestion").appendTo('body').modal();
        $("#numPregSig").val($(".numPregs").length+1);
        $(".new-question__control--add-question").removeAttr('disabled'); 
        $(".new-question__control--delete-question").removeAttr('disabled');        
        setOpenQuestionAsDefault();
    });    
    /*********************************************************************************/


    /*Colocamos la pregunta abierta como default**************************************/
    var tieneOpMul=false;  //de forma predeterminada lo colocamos en falso
    function setOpenQuestionAsDefault(){
       if (tieneOpMul){
            eliminarOpcionMultiple();
        }
        $('#questionType').val(1); //colocamos la pregunta abierta como default               
        $('select option[value="1"]').attr("selected"); //colocamos la pregunta abierta como default                       
    }
    /*********************************************************************************/


    /**********Funciones para agregar o eliminar la Opción múltiple*******************/
    function agregarOpcion(num){
        var elem2 = $("#multi-options").clone();
        elem2.attr("id", "option"+num);
        $("#optionsFather").append(elem2);
    }


    function agregarOpcionMultiple(donde){
        var elem = $("#options-template").clone().removeClass("hide");
        elem.attr("id", "options-template1");
        elem.children().first().children().first().attr("id", "option1");
        donde.append(elem);
        $("#options-template1").children().first().attr("id", "optionsFather");
        agregarOpcion(2);
    }

    function eliminarOpcionMultiple(){
        $("#options-template1").remove();
    }
    /*********************************************************************************/

    // Habilitar opción para cambiar entre pregunta abierta u opción múltiple
      $("#ModalQuestion").on("change", "#questionType", function(){
        switch($(this).val()){
            case "1": //Seleccionó pregunta abierta
                    eliminarOpcionMultiple();
                    tieneOpMul = false;
                break;
            case "2": //Seleccionó pregunta de opción múltiple
                    tieneOpMul = true;
                    agregarOpcionMultiple($(this).parent().parent().parent());//el parámetro me genera dudas
            break;
        }
    });
    /*********************************************************************************/      


    /**** Cancelar Agregar Pregunta***************************************************/
    $("#ModalQuestion").on("click", "#cancelarAgregarPreg", function(){
       $("#ModalQuestion").modal('hide').find("input").val("").find(".yes-no-question").val('1');//ocultamos el modal
    });
    /*********************************************************************************/      


    /**** Se tiene que cuidar que siempre haya al menos dos opciones de pregunta******/
    $("#ModalQuestion").on("click", ".delete-question-to-yes-no", function(){
        $(this).parent().parent().parent().remove();
        var options = $(".multi-options-template").length;
        if( options <= '3'){ //3
            $(".delete-question-to-yes-no").attr("disabled","disabled");    
        }
    });
    /*********************************************************************************/          


    // Agrega una nueva opcion a un bloque de preguntas de opción múltiple
    $("#ModalQuestion").on("click", ".add-question-to-yes-no", function(e){
        // Habilitar-Deshabilitar Botón de eliminar de opción de bloque de preguntas de opción
        var options = $(".multi-options-template").length;
        agregarOpcion(options);
        $(".delete-question-to-yes-no").removeAttr("disabled");
    });
    /*********************************************************************************/      

/*
    //Eliminar una opcion multiple
    var parentYesNo;
    $("#ModalQuestion").on('click',".delete-question-to-yes-no", function(e){
        
    

        if (classCount() <= '4') { //4
            $(".delete-question-to-yes-no").attr("disabled", "true");
        }
        e.preventDefault();
        parentYesNo = $(this).parent().parent();
        parentYesNo.remove();
        //var elem = $("#multi-options").clone().appendTo(".new-survey__question-container");
        //parentYesNo.append(elem);
        // parentYesNo.data("questions", parentYesNo.data("multi-options") - 1 );
        //console.log(parentYesNo);
    });

*/

/*
    // Editar una pregunta
    $(".new-survey__question-container").on("click", ".new-question__control--edit-question", function(){
        $(this).parent().parent().parent().parent().remove();
        //setNumberOfQuestionsToSelect();
        //getnumberQuestion();

        //Abrrir modal
        //Copiar datos de los inputs del div
        //igualar los valores de los inputs del moda al del div
    });
*/

/*    function hasNestedQuestion(elem){
        return elem.parent().parent().parent().has('.new-satisfaction-question-template').length != 0 || elem.parent().parent().parent().has('.yes-no-question-block').length != 0;
    }

    function hasNestedQuestionOfType(elem, type){
        return elem.parent().parent().parent().has(type).length != 0;
    }
*/  
    // Agrega una nueva pregunta a un bloque de preguntas de si/no
  /*  var parentYesNo;
    $(".new-survey__question-container").on("click", ".add-question-to-yes-no", function(e){
        e.preventDefault();
        parentYesNo = $(this).parent().parent();
        var elem = $("#new-question-template").clone().removeClass("hide").appendTo(".new-survey__question-container");
        parentYesNo.append(elem);
        parentYesNo.data("questions", parentYesNo.data("questions") + 1);
       // console.log(parentYesNo.data("questions"));

    });
*/


    // Agregar una nueva pregunta a la encuesta general
    /*$("#add-question").on("click", function(){
        //Agregando número de pregunta
        if ($("#add-question").hasClass("disabled")){
            alert("Ingrese un título");
        }else{
            if ($("#add-question").hasClass('aux')){
                $("#new-question-template").clone().removeClass("hide").addClass("question").appendTo(".new-survey__question-container").find("input").val("");
                $("#add-question").removeClass('aux');
            }else{
                $("#new-question-template").clone().removeClass("hide").addClass("question").appendTo(".new-survey__question-container").find("input").val("").end();
                //("#childSupport").hide();
                //setNumberOfQuestionsToSelect();
                //getnumberQuestion();

            }
        }
    });

    function setNumberOfQuestionsToSelect(){
        var el = $(".question:not(.hide)");
        var select =  $(".questions-of-master-survey");        
        select.empty();
       
        for(var i = 1; i <= el.length; i++){
            var o = new Option("i", i);
            $(o).html(i);
            select.append(o);
        }
    }

    function getnumberQuestion(){
        var el = $(".question:not(.hide)");
        var select = $(".number-questions-survey");
        select.empty();

        for (var i = el.length.selected; i <= el.length; i++) {
            var o = new Option("i", i);
            $(o).html(i);
            select.append(o);
        }
    }
    */
    $("#idSaveQuestion").click(function(){
/*
        var questionOptionInputs=$(".questionOptionInputs");
        
        foreach(question as questionOptionInputs){
            options=options+valor+i:question.val();
        },
        data: {idTemplate: idTemplate, numPregSig: numPregSig, questionInput: questionInput, questionType: questionType, options: options}
*/
    });

});

    window.onload = function() {
        $("#home").addClass('active');
    }


    function publish(id){
        var action = document.getElementById("updateDataTemplateForm").action;
        var titleInput = $("#ModalTitleInput").val();
        var descInput = $("#ModalDescInput").val();
        var idTemplate = id;

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

    function saveQuestion(id){
        var action = document.getElementById("saveQuestionForm").action;
        var idTemplate = id;
        var numPregSig = $("#numPregSig").val();
        var questionInput = $("#questionInput").val();
        var questionOptionInputs=$(".questionOptionInputs");
        var questionType= $("#questionType").val();
        var token = $("#token").val();

        console.log(questionOptionInputs);

        if (questionInput.length == 0 || questionOptionInputs.length == 0) {
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
                beforeSend: function( xhr ) {   
                    $(".new-question__control--add-question").attr('disabled','true'); 
                    $(".new-question__control--delete-question").attr('disabled','true');
                },
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
