﻿$(document).ready(function(){

    /* Abrimos modal para agregar pregunta********************************************/
    $("#addQuestion").click(function(){
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
                    eliminarOpcionMultiple();
                    tieneOpMul = true;
                    var options = $(".multi-options-template").length;
                        if( options <= '3'){ //3
                           $(".delete-question-to-yes-no").attr("disabled","disabled");    
                    }
                    agregarOpcionMultiple($(this).parent().parent().parent());
            break;
            case "3": //Seleccionó pregunta de opción múltiple
                    eliminarOpcionMultiple();
                    tieneOpMul = true;
                    var options = $(".multi-options-template").length;
                        if( options <= '3'){ //3
                           $(".delete-question-to-yes-no").attr("disabled","disabled");    
                    }
                    agregarOpcionMultiple($(this).parent().parent().parent());
            break;
        }
    });
    /*********************************************************************************/


    /**** Cancelar Agregar Pregunta***************************************************/
    $("#ModalQuestion").on("click", "#cancelarAgregarPreg", function(){
       $("#ModalQuestion").modal('hide').find("input").val("").find(".yes-no-question").val('1');//ocultamos el modal
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

    // Agrega una nueva opcion a un bloque de preguntas de opción múltiple  --MODAL EDIT--
    $("#ModalQuestionEdit").on("click", ".add-question-to-yes-no", function(e){
        // Habilitar-Deshabilitar Botón de eliminar de opción de bloque de preguntas de opción
        var options = $(".multi-options-template-edit").length;
        agregarOpcionEdit(options);
        $(".delete-question-to-yes-no").removeAttr("disabled");
    });
    /*********************************************************************************/

    function agregarOpcionEdit(num){
        var elem2 = $("#optionEdit").clone().removeClass("hidden");
        elem2.attr({
            class: 'form-group options-edit'
        });
        $("#optionsMultEdit").append(elem2);
    }

    /**** Se tiene que cuidar que siempre haya al menos dos opciones de pregunta******/
    $("#ModalQuestion").on("click", ".delete-question-to-yes-no", function(){
        $(this).parent().parent().parent().remove();
        var options = $(".multi-options-template").length;
        if( options <= '3'){ //3
            $(".delete-question-to-yes-no").attr("disabled","disabled");    
        }
    });
    /*********************************************************************************/

    /**** Se tiene que cuidar que siempre haya al menos dos opciones de pregunta******/
    $("#ModalQuestionEdit").on("click", ".delete-question-to-yes-no", function(){
        $(this).parent().remove();
        var options = $(".options-edit").length;
        if( options <= '2'){ //3
            $(".delete-question-to-yes-no").attr("disabled","disabled");
        }
    });

    //Contar todos los divs de todas la preguntas y mostrarlas en el select, enviar salto a la pregunta siguiente
    $("#container-questions").on('mousedown','.selectNumPreg',function(){
        var max = $(".numPregs").length;
        var act = parseInt($(this).attr('order')) + 1;
        $(this).empty();
        $(this).append('<option value="N/A" selected disabled>Pregunta</option>');

        for (var i = act; i <= max; i++) {
             $(this).append('<option value="'+i+'">'+i+'</option>');
        }
        $(this).append('<option value="'+i+'">Fin</option>');
    });

    $("#container-questions").on('change', '.selectNumPreg', function() {
        var salto = $(this, ".selectNumPreg").val();
        var idQuestion = parseInt($(this).attr('id'));
        var idOption = parseInt($(this).attr('idOption'));

        $.ajax({
            url: '/administrator/addSalto',
            type: 'POST',
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            dataType: 'json',
            data: {salto: salto, idQuestion: idQuestion, idOption:idOption },
           beforeSend: function( xhr ) {
                $("#loader").appendTo('body').modal();
            },
        })
        .done(function(data) {
            alertify.alert("Se ha redireccionado a la pregunta : "+ salto+ " satisfactoriamente.", function(){});
        })
        .fail(function() {
            alertify.alert("No se ha podido redireccionar la opción a la pregunta deseada.", function(){});
        })
        .always(function() {
            $("#loader").modal('hide');
        });

    });
    /*********************************************************************************/


    //Contar todos los divs de todas la preguntas y mostrarlas en el select, enviar salto a la pregunta siguiente   (Pregunta Abierta)
    $("#container-questions").on('mousedown','.selectNumPregParent',function(){
        var max = $(".numPregs").length;
        var act = parseInt($(this).attr('order')) + 1;
        $(this).empty();
        $(this).append('<option value="N/A" selected disabled>Pregunta</option>');


        for (var i = act; i <= max; i++) {
             $(this).append('<option value="'+i+'">'+i+'</option>');
        }
        $(this).append('<option value="'+i+'">Fin</option>');
    });

    $("#container-questions").on('change', '.selectNumPregParent', function() {
        var salto = $(this, ".selectNumPregParent").val();
        var idQuestion = parseInt($(this).attr('id'));

        $.ajax({
            url: '/administrator/addSaltoParent',
            type: 'POST',
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            dataType: 'json',
            data: {salto: salto, idQuestion: idQuestion},
           beforeSend: function( xhr ) {
                $("#loader").appendTo('body').modal();
            },
        })
        .done(function(data) {
            alertify.notify('Se ha redireccionado a la pregunta : '+ salto+ ' satisfactoriamente.', 'success', 3, function(){});
        })
        .fail(function() {
            alertify.notify('No se ha podido redireccionar la opción a la pregunta deseada.', 'error', 3, function(){});
        })
        .always(function() {
            $("#loader").modal('hide');
        });

    });
    /*********************************************************************************/


    //Eliminar una pregunta
    $('#container-questions').on('click', '.delete-question__control--delete-question',function() {
        var idQuestion = $(this).attr('id');
        var idTemplate = $(this).attr('idTemplate');
        var orden =$(this).attr('orden');
        var typeQuestion = parseInt($(this).attr('typeQuestion'));

        alertify.confirm("¿Desea eliminar la pregunta?",function(){
            eliminarPregunta(idQuestion,typeQuestion,orden,idTemplate);
          },
          function(){

          });
    });
    /*********************************************************************************/


    function eliminarPregunta(idQuestion,typeQuestion,orden,idTemplate){
        $.ajax({
            url: '/administrator/deleteQuestion',
            type: 'POST',
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            dataType: 'json',
            data: {idQuestion: idQuestion, typeQuestion: typeQuestion, orden:orden,idTemplate:idTemplate },
            beforeSend: function( xhr ) {
                $(".new-question__control--edit-question").attr('disabled','true');
                $(".delete-question__control--delete-question").attr('disabled','true');
                $("#addQuestion").attr('disabled','true');
            },
            })
            .done(function() {
                alertify.notify('Pregunta Eliminada correctamente.', 'error', 3, function(){});
                    $("#container-questions").load(" #container-questions");
            })
            .fail(function() {
                alertify.notify('No se ha podido eliminar la pregunta.', 'warning', 3, function(){});
            })
            .always(function() {
                $(".new-question__control--edit-question").attr('disabled','false');
                $(".delete-question__control--delete-question").attr('disabled','false');
                setTimeout('$("#addQuestion").removeAttr("disabled")', 3000);
            });
    }


    //Abrir modal QuestionEdit
    $('#container-questions').on('click', '.new-question__control--edit-question', function() {
        var idQuestion = $(this).attr('id');
        var orden =$(this).attr('orden');
        var title = $(this).parent().parent().parent().children('.col-md-6').children().find('input').val();
        var typeQuestion = parseInt($(this).attr('typeQuestion'));
        var opciones= $($(this).parent().parent().parent().children('.yes-no-question-block').children().find('input')).map(function() {
            return $(this).val();
        }).get().join("¬").split('¬');
        var salto = parseInt(orden) + 1;

           $("#questionInputEdit").val(title);
           $("#numPregSigEdit").val(orden);
           $("#questionTypeEdit").val(typeQuestion);
           $("#idQuestion").val(idQuestion);

           $(".edit-question__control--edit-question").removeAttr('disabled');
           $(".edit-question__control--delete-question").removeAttr('disabled');
           $(".delete-question-to-yes-no").removeAttr("disabled");


           $(".options-edit").remove();  //estaba en empty
           if (typeQuestion == 2 || typeQuestion == 3) {
            $(".add-question-to-yes-no").removeClass('hidden');
               for (var i = 0; i < opciones.length; i++) {
                   $("#optionsMultEdit").append('<div class="form-group options-edit"><label for="exampleInputEmail1">Opción Respuesta</label><button class="btn btn-danger delete-question-to-yes-no pull-right" style="margin-bottom: 4px;margin-top: 2px;"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></button> <input type="text" class="form-control text-black-body questionOptionInputsEdit" id="questionOptionInputEdit" aria-describedby="emailHelp" placeholder="¿Cual es la pregunta?" value="'+opciones[i]+'" maxlength="200"></div>');
               }
           }else{
            $(".add-question-to-yes-no").addClass('hidden');
           }
           $("#ModalQuestionEdit").appendTo('body').modal();
    });
    /*********************************************************************************/


    $("#sortableQuestions").on('click', function(event) {
        var clase = $(this).children().attr('class');
        console.log(clase);
            if (clase == "glyphicon glyphicon-th-list icon-mobile"){
            alertify.confirm("Si continua se eliminarán todos los saltos de las opciones múltiples",
            function(){
               var idQuestion =  $(".title").map(function() {
                    return $(this).attr('id');
                }).get().join('¬').split('¬');
                var idTemplate = parseInt($(".new-question__control--edit-question").attr('idTemplate'));

                $.ajax({
                    url: '/administrator/deleteOptions',
                    type: 'POST',
                    dataType: 'json',
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    data: {idQuestion: idQuestion},
                })
                .done(function(data) {
                    console.log(data);
                })
                .fail(function() {
                    console.log("error");
                })
                .always(function(data) {
                    console.log(data);
                });


                $("#sortableQuestions").children('span').toggleClass('glyphicon-ok').toggleClass('glyphicon-th-list');

                $(".yes-no-question-block, .btn-control, #addQuestion, #dataTemplateContainer").hide('400');
                $("#questionSaved").css('height', '73rem');

                $("#container-questions").sortable({
                    placeholder: "placeholder-sort",
                    forcePlaceholderSize: true,
                    forceHelperSize: true,
                    update: function(){
                        var opciones = $(".numPregs").map(function() {
                            return $(this).val();
                        }).get().join("¬").split('¬');

                        for (var i = 0; i <= $(".numPregs").length; i++) {
                            var sizeOp = sizeOp +'¬'+ i;
                        }

                        size = sizeOp.split('¬');
                        newOrden = size.splice(2,325);

                        var idQuestion =  $(".title").map(function() {
                            return $(this).attr('id');
                        }).get().join( "¬" ).split('¬');

                        $.ajax({
                            url: '/administrator/updateOrderQuestion',
                            type: 'POST',
                            dataType: 'json',
                            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                            data: {idQuestion: idQuestion,newOrden: newOrden},
                        })
                        .done(function(data) {
                        })
                        .fail(function() {
                            console.log("error");
                        })
                        .always(function(data) {
                            console.log(data);
                        });


                    },
                    revert: true,
                    disabled:false
                });
                $("#container-questions").disableSelection();

            },function(){
            });

        }else{
            $("#container-questions").load(" #container-questions");
            $("#sortableQuestions").children('span').toggleClass('glyphicon-ok').toggleClass('glyphicon-th-list');

            $(".yes-no-question-block, .btn-control, #addQuestion, #dataTemplateContainer").show('400');
            $("#questionSaved").css('height', '50rem');

         }


    });

    $("#updateDataTemplateForm").on('submit',function(e) {
        e.preventDefault();
        var titleInput = $('#ModalTitleInput').prop('value');
        var descInput = $('#ModalDescInput').prop('value');

         $.ajax({
            url: "/updateDataTemplate", // Url to which the request is send
            type: "POST",             // Type of request to be send, called as method
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            data: new FormData(this), // Data sent to server, a set of key/value pairs (i.e. form fields and values)
            contentType: false,       // The content type used when sending data to the server.
            cache: false,             // To unable request pages to be cached
            processData:false,        // To send DOMDocument or non processed data file it is set to false
            beforeSend: function( xhr ) {
                $(".btn").attr('disabled','true');
            },
            complete: function(e, xhr, settings){
                        if(e.status === 200){
                            alertify.notify('Datos Guardados correctamente.', 'success', 2, function(){
                                $("#exampleInputEmail1").val(titleInput);
                                $("#inputDesc").val(descInput);
                                $("#ModalTitle").modal('hide');
                            });
                            $("#dataTemplateContainer").load(" #dataTemplateContainer");
                        }else{
                            alertify.notify('No se han podido guardar los cambios.', 'error', 2, function(){});
                        }
                $(".btn").removeAttr('disabled');
            },
                    error: function (textStatus, errorThrown) {
                            alertify.notify('No se han podido guardar los cambios.', 'error', 2, function(){});
                    }

        });
    });

    $("#dataTemplateContainer").on('click', '#minDataTemplate', function() {
       $("#dataContainer").toggle('400');
       $("#minDataTemplate").toggleClass('btn-primary').toggleClass('btn-info');
       $("#minDataTemplate").children().toggleClass('glyphicon-minus').toggleClass('glyphicon-plus');
       $("#questionSaved").css('height','55rem');

    });

});

    window.onload = function() {
        $("#home").addClass('active');
    }
/*
    function publish(id){

        var titleInput = $('#ModalTitleInput').prop('value');
        var descInput = $('#ModalDescInput').prop('value');

        var formData = new FormData();
        formData.append('icon_survey', document.getElementById("icon_survey").files[0].name);
        formData.append('titulo', titleInput);
        formData.append('descripcion', descInput);
        formData.append('idTemplate', id);


        for (var key of formData.entries()) {
            console.log(key[0] + ', ' + key[1]);
        }


        if (titleInput.length != 0 && titleInput != " ") {
            if (descInput.length != 0 && descInput != " ") {

                $.ajax({
                    url: "/updateDataTemplate",
                    type: 'POST',
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    cache: false,
                    contentType: false,
                    processData: false,
                    data: formData,
                    complete: function(e, xhr, settings){
                        if(e.status === 200){
                            alertify.alert("Datos Guardados correctamente.", function(){
                                $("#exampleInputEmail1").val(titleInput);
                                $("#inputDesc").val(descInput);
                                $("#ModalTitle").modal('hide');
                              });
                        }else{
                            alertify.alert("No se han podido guardar los cambios.", function(){
                            });
                        }
                    },
                    error: function (textStatus, errorThrown) {
                        alertify.alert("No se ha podido agregar la pregunta.", function(){
                         });                    }
                });
            }else{
                alert("Ingrese una descripción para la encuesta");
            }
            }else{
                alert("Ingrese un Título para la encuesta");
        }
    }
*/
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

        $("#addQuestion").attr('disabled','true');


        for (var i = 0; i < questionOptionInputsA.length; i++)  {
            optionsResult = optionsResult + '¬' + questionOptionInputsA[i].value;
        }

       optionsResult = optionsResult.split('¬');
       optionsResult = optionsResult.splice(2,325);

        if (questionInput.length == 0 || questionOptionInput.length == 0) {
            alertify.alert("Ingrese una pregunta.", function(){

          });
        }else if (questionInput.length < 250 || questionOptionInput.length < 250){
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
                        $("#loader").modal('hide');
                            alertify.notify('Pregunta Añadida', 'success', 3, function(){
                                $("#ModalQuestion").modal('hide').find("input").val("");
                            });
                            $("#container-questions").load(" #container-questions");
                            setTimeout('$("#addQuestion").removeAttr("disabled")', 1000);
                    }else{
                        alertify.notify('No se ha podido agregar la pregunta.', 'error', 3, function(){
                            console.log(e.status);
                        });

            //                 $("#ModalQuestion").modal('hide').find("input").val("");

                        setTimeout('$("#addQuestion").removeAttr("disabled")', 1000);
                    }
                },
/*                error: function (textStatus, errorThrown) {
                    alertify.notify('No se ha podido agregadr la pregunta.', 'error', 5, function(){
                        console.log(textStatus,errorThrown);
                    });
                setTimeout('$("#addQuestion").removeAttr("disabled")', 1000);
                } */
            });
        }
        else {
            alertify.alert("Máximo 250 carácteres", function(){

            });
        }
    }

    function editQuestion(id) {
        var idTemplate = id;
        var idQuestion = $("#idQuestion").val();
        var typeQuestion = $("#questionTypeEdit").val();
        var salto = parseInt($("#numPregSigEdit").val()) + 1;
          var titleEdit = $("#questionInputEdit").val();
        var optionsResult = "";
        var questionOptionInputsA = document.getElementsByClassName('questionOptionInputsEdit');
        for (var i = 0; i < questionOptionInputsA.length; i++)  {
                    optionsResult = optionsResult + '¬' + questionOptionInputsA[i].value;
                }

               optionsResult = optionsResult.split('¬');
               optionsResult = optionsResult.splice(2,325);
        if (titleEdit.length == 0){
            alertify.alert("Ingrese una pregunta.", function(){});
        }else{
            $.ajax({
            url: '/administrator/editEliminarQuestion',
            type: 'POST',
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            dataType: 'json',
            beforeSend: function( xhr ) {
                $(".edit-question__control--edit-question").attr('disabled','true');
                $(".edit-question__control--delete-question").attr('disabled','true');
            },
            data: {idQuestion: idQuestion, typeQuestion: typeQuestion,titleEdit: titleEdit,salto: salto,optionsResult: optionsResult},
            })
            .done(function() {
                alertify.notify('Pregunta Editada correctamente.', 'success', 3, function(){
                    $("#ModalQuestionEdit").modal('hide').find("input").val("");
                });
                $("#container-questions").load(" #container-questions");

            })
            .fail(function(data) {
                console.log(data);
            })
            .always(function(data) {
                console.log(data);
            });
        }
    }

    function limpiar(){
    $("#imgSalida").css('display', 'inline');
    $("#previewcanvascontainer").css('display', 'none');

        document.getElementById("updateDataTemplateForm").reset();
    }

    function imagen(){
        $('#icon_survey').change(function(e) {
        addImage(e);
    });

        function addImage(e){
            var file = e.target.files[0],
            imageType = /image.*/;

            if (!file.type.match(imageType)){
                swal({
                title: "Su archivo no es una imagen",
                type: "error",
                });
                return;
            }
            var reader = new FileReader();
            reader.onload = fileOnload;
            reader.readAsDataURL(file);
        }

        function fileOnload(e) {
            var result=e.target.result;
            $('#imgSalida').attr("src",result);
        }

    }


//verificaciones de la carga de una imagen en la creacion de la plantilla
    function ShowImagePreview( files ){

    $("#imgSalida").css('display', 'none');


    if( !( window.File && window.FileReader && window.FileList && window.Blob ) ){
      alert('Por favor Ingrese un archivo de Imagen');
      document.getElementById("myForm").reset();
      return false;
    }

    if( typeof FileReader === "undefined" ){
        alert( "El archivo no es una imagen por favor ingrese una" );
        document.getElementById("myForm").reset();
        return false;
    }

    var file = files[0];

    if( !( /image/i ).test( file.type ) ){
        alert( "El archivo no es una imagen" );
          document.getElementById("myForm").reset();
        return false;
    }

    reader = new FileReader();
    reader.onload = function(event)
            { var img = new Image;
              img.onload = UpdatePreviewCanvas;
              img.src = event.target.result;  }
    reader.readAsDataURL( file );
}



//cargar el preview de la imagen de la encuesta
function UpdatePreviewCanvas(){
    var img = this;
    $("#img_survey").hide();
    $("#previewcanvascontainer").css('display', 'inline');
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
