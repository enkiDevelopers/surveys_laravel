$(document).ready(function(){

    // Agregar una nueva pregunta a la encuesta general
    $("#add-question").on("click", function(){
        $("#new-question-template").clone().removeClass("hide").addClass("question").appendTo(".new-survey__question-container");
        setNumberOfQuestionsToSelect();
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

    // Eliminar una pregunta
    $(".new-survey__question-container").on("click", ".new-question__control--delete-question", function(){
        $(this).parent().parent().parent().parent().remove();
        setNumberOfQuestionsToSelect();
    });

    // Crear un bloque de preguntas si/no para la pregunta en cuestion
    $(".new-survey__question-container").on("change", ".yes-no-question", function(){
        switch($(this).val()){
            case "1":
                var o = $(this).parent().parent().next().next().remove();
                console.log(o);
                break;
            case "2":
                $(this).parent().parent().next().next().remove();
                if(!hasNestedQuestion($(this))){
                    var elem = $("#yes-no-question-template").clone().removeClass("hide");
                    $(this).parent().parent().parent().append(elem);
                }
                break;
            case "3":
                $(this).parent().parent().next().next().remove();
                if(!hasNestedQuestion($(this))){
                    var elem = $("#satisfaction-question-template").clone().removeClass("hide");
                    $(this).parent().parent().parent().append(elem);
                }
                break;
        }

    });

    function hasNestedQuestion(elem){
        return elem.parent().parent().parent().has('.new-satisfaction-question-template').length != 0 || elem.parent().parent().parent().has('.yes-no-question-block').length != 0;
    }
    function hasNestedQuestionOfType(elem, type){
        return elem.parent().parent().parent().has(type).length != 0;
    }
    

    // Agrega una nueva pregunta a un bloque de preguntas de si/no
    var parentYesNo;
    $(".new-survey__question-container").on("click", ".add-question-to-yes-no", function(e){
        e.preventDefault();
        parentYesNo = $(this).parent().parent();
        var elem = $("#new-question-template").clone().removeClass("hide").appendTo(".new-survey__question-container");
        parentYesNo.append(elem);
        parentYesNo.data("questions", parentYesNo.data("questions") + 1);
       // console.log(parentYesNo.data("questions"));

    });

});