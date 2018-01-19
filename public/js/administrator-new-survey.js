$(document).ready(function(){

    // Agregar una nueva pregunta a la encuesta general
    $("#add-question").on("click", function(){
        if ($("#add-question").hasClass("disabled")){
            alert("Ingrese un título");
        }else{
            if ($("#add-question").hasClass('aux')){
                $("#new-question-template").clone().removeClass("hide").addClass("question").appendTo(".new-survey__question-container").find("input").val("");
                setNumberOfQuestionsToSelect();
                getnumberQuestion();
                $("#add-question").removeClass('aux');
            }else{
                $("#new-question-template").clone().removeClass("hide").addClass("question").appendTo(".new-survey__question-container").find("input").val("").end();
                //("#childSupport").hide();
                setNumberOfQuestionsToSelect();
                getnumberQuestion();

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

    // Eliminar una pregunta
    $("#ModalQuestion").on("click", ".new-question__control--delete-question", function(){
       //var a = $(this).parent().parent().parent().prev().children().children().next().next().next().remove();
       $("#ModalQuestion").modal('hide').find("input").val("").find(".yes-no-question").val('1');
       var a = $(this).parent().parent().parent().prev().children().children().next().next().next().remove();
       
       console.log(a);
       setNumberOfQuestionsToSelect();
       getnumberQuestion();
    });

    // Editar una pregunta
    $(".new-survey__question-container").on("click", ".new-question__control--edit-question", function(){
        $(this).parent().parent().parent().parent().remove();
        setNumberOfQuestionsToSelect();
        getnumberQuestion();

        //Abrrir modal
        //Copiar datos de los inputs del div
        //igualar los valores de los inputs del moda al del div
    });

    // Crear un bloque de preguntas si/no para la pregunta en cuestion
    //    $(".new-survey__question-container").on("change", ".yes-no-question", function(){
    $("#ModalQuestion").on("change", ".yes-no-question", function(){

        switch($(this).val()){
            case "1":
                //var o = $(this).parent().parent().next().next().remove();
                //console.log(o);
                var a = $(this).parent().parent().next().remove();
                console.log(a);
                break;
            case "2":
                $(this).parent().parent().next().next().remove();
                if(!hasNestedQuestion($(this))){
                    var elem = $("#yes-no-question-template").clone().removeClass("hide");
                    var elem1 = $("#multi-options").clone();
                    $(this).parent().parent().parent().append(elem);

                    $(this).parent().parent().parent().append(elem1);
                }
                break;
            /*      case "3":
                        $(this).parent().parent().next().next().remove();
                        if(!hasNestedQuestion($(this))){
                            var elem = $("#satisfaction-question-template").clone().removeClass("hide");
                            $(this).parent().parent().parent().append(elem);
                        }
                        break;
            */            
        }
    });

    function hasNestedQuestion(elem){
        return elem.parent().parent().parent().has('.new-satisfaction-question-template').length != 0 || elem.parent().parent().parent().has('.yes-no-question-block').length != 0;
    }

    function hasNestedQuestionOfType(elem, type){
        return elem.parent().parent().parent().has(type).length != 0;
    }
  
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

    // Agrega una nueva opcion a un bloque de preguntas de si/no
    var parentYesNo;
    //  $(".new-survey__question-container").on("click", ".add-question-to-yes-no", function(e){
    $("#ModalQuestion").on("click", ".add-question-to-yes-no", function(e){

        // Habilitar / Deshabilitar Botón de eliminar de opción de bloque de preguntas de si/no 
        if(classCount() >= '3'){ //3
            
            $(".delete-question-to-yes-no").removeAttr("disabled");

        }

        e.preventDefault();
        parentYesNo = $(this).parent().parent();
        var elem = $("#multi-options").clone().appendTo(".new-survey__question-container");
        parentYesNo.append(elem);
        parentYesNo.data("questions", parentYesNo.data("multi-options") + 1 );
       // console.log(parentYesNo.data("questions"));

           });

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

    function classCount(){
        var divs = $('div');
        var numDivs = divs.length; 
        var contador = 0; 

        for(var i = 0; i < numDivs; i++) 
            if(divs[i].id == "multi-options-template") contador++; 

        return contador;
    }

});
