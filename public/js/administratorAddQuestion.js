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

    //Contar todos los divs de todas la preguntas
    $(".selectNumPreg").mousedown(function(){
        var max = $(".numPregs").length;
        var act = parseInt($(this).attr('order')) + 1;
        $(this).empty();
        $(this).append('<option value="N/A" selected disabled>Selecciona la pregunta</option>');
 
        for (var i = act; i <= max; i++) {
             $(this).append('<option value="'+i+'">'+i+'</option>');
        } 
    }).change(function() {

        var salto = $(this, ".selectNumPreg").val();
        var idQuestion = parseInt($(this).attr('id'));
        var idOption = parseInt($(this).attr('idOption'));

        $.ajax({
            url: '/administrator/addSalto/',
            type: 'POST',
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            dataType: 'json',
            data: {salto: salto, idQuestion: idQuestion, idOption:idOption },
        })
        .done(function() {
            console.log("success");
        })
        .fail(function() {
            console.log("error");
        })
        .always(function() {
            console.log("complete");
        });        
    });

    $('.new-question__control--delete-question').click(function() {
        var idQuestion = $(this).attr('id');
        //var idOption = parseInt($(this).attr('idOption'));
        var typeQuestion = parseInt($(this).attr('typeQuestion'));

        alertify.confirm("¿Desea eliminar la pregunta?",function(){
            $.ajax({
                url: '/administrator/deleteQuestion',
                type: 'POST',
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                dataType: 'json',
                data: {idQuestion: idQuestion, typeQuestion: typeQuestion },
                beforeSend: function( xhr ) {   
                    $(".new-question__control--edit-question").attr('disabled','true'); 
                    $(".new-question__control--delete-question").attr('disabled','true');
                },
            })
            .done(function() {
                alertify.alert("Pregunta Eliminada correctamente.", function(){
                    alertify.error('Pregunta Eliminada');
                  });
                    $("#container-questions").load(" #container-questions");
            })
            .fail(function() {
               alertify.alert("No se ha podido eliminar la pregunta.", function(){});
            })
            .always(function() {
                $(".new-question__control--edit-question").attr('disabled','false'); 
                $(".new-question__control--delete-question").attr('disabled','false');
            });            
          },
          function(){
            
          });
    });

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
        var optionsResult = "";
        var numPregSig = $("#numPregSig").val();
        var questionInput = $("#questionInput").val();
        var questionOptionInputsA = document.getElementsByClassName('questionOptionInputs');
        var questionType= $("#questionType").val();
        var salto = parseInt(numPregSig) + 1;
        var token = $("#token").val();

        for (var i = 0; i < questionOptionInputsA.length; i++)  {
            optionsResult = optionsResult + "," + questionOptionInputsA[i].value;
        }

       optionsResult = optionsResult.split(',');
       optionsResult = optionsResult.splice(2,25);
       //console.log(optionsResult);

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
                data: {idTemplate: idTemplate, numPregSig: numPregSig, questionInput: questionInput, questionType: questionType, optionsResult: optionsResult,salto: salto},
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
                    
                     console.log(e);
         
                    }else{
                        alertify.alert("No se ha podido agregar la pregunta.", function(){
                            alertify.message('OK');
                        });
                     console.log(e);
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
