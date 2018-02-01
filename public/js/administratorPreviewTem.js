$(document).ready(function(){

        var alto = (screen.availHeight) - (screen.availHeight / 10);
        var anchoP =(screen.availWidth) - (screen.availHeight / 23) + (screen.availHeight / 46);
        var anchoS =(screen.availWidth) - (screen.availHeight / 23);

        $("#sumary").height(alto).width(anchoP);
        $("#surveyContainer").height(alto).width(anchoS);

        $("#btnStart").click(function(){
            $("#sumary").fadeOut();
            $("#surveyContainer").removeClass('hidden').addClass('popInRight delay-500 duration-2250');

        });

        $("input.label_better").label_better({
            position: "top",
            animationTime: 500,
            easing: "ease-in-out",
            offset: 20
          });


	var b=-1;n=0;
    /********Funcionalidades del botón Atrás******************/

    function atras(){
        if(n<=1){
            $("#idBack").attr('disabled','disabled');   
        }

        $("#idSave").css("display","none");
        $("#idNext").removeAttr('disabled');
        $("#preg"+n).css("display", "none");        
        //n--;
        n=$("#back"+n).val();
        //n=b;
        //b=n-1;
        $("#preg"+n).css("display", "inline");
        if(n==0){
          $("#idTitlePregunta").text("Recomendaciones: ");
        }else{
        $("#idTitlePregunta").text("Pregunta " + n);
    }

    }

    $("#idBack").click(function(){
        atras();
    });

    /********Funcionalidades del botón Siguiente******************/
    $("#idNext").click(function(){    	    	
    	$("#idBack").removeAttr('disabled');
        $("#preg"+n).css("display", "none");
        //Si la pregunta es pregunta abierta la siguiente avanza uno
        //si la pregunta es de opción múltiple, se tiene que saber si hay brinco o no
        if($("#type"+n).val()=="2"){
            var tempo= $('input:radio[name=opcion'+n+']:checked');
            if(tempo.val()==null){
                //$("#idNext").attr('disabled','disabled');
                n++; //eliminar esta línea
            }else{
                m=tempo.val();
                salto = $("#"+n+"salto"+m).val();
                if(salto=="0"){
                    n++;
                }else{
                    b=n;                    
                    n=salto;
                    $("#back"+n).val(b);
                }
            }
        }else{
            n++;            
        }
		$("#preg"+n).css("display", "inline");
        $("#idTitlePregunta").text("Pregunta " + n);
    	if(n>=$(".pregs").length){
            //$("#preg"+n).css("display", "none");
            $("#idTitlePregunta").css("display", "none");
    		$("#idNext").attr('disabled','disabled');	
            $("#idenviar").css("display","");	
            //$("#idSave").css("display","inline");
            swal({
                title: "Encuesta Completada !",
                text: "Haz completado la encuesta satisfactoriamente !",
                icon: "info",
                showCancelButton: true,
                cancelButtonText: "Regresar",
                //confirmButtonColor: "#DD6B55",
                confirmButtonText: "Enviar Encuesta",
                closeOnConfirm: false },
            function(){
                swal({
                   title: "Encuesta enviada",
                   type: "success",
                    });
                    $("#idBack").css("display", "none");
                    $("#idNext").css("display", "none");
                    $("#idSave").css("display", "none");
                    $("#preg"+n).css("display", "none");
                    n++;
                    $("#preg"+n).css("display", "inline");
            }); 
            //Si es falso entonces
            //$("#idNext").removeAttr('disabled');
            //atras();    

    	}
    });


    /********Funcionalidades del botón Guardar******************/
    $("#idSave").click(function(){              
        $("#idBack").css("display", "none");
        $("#idNext").css("display", "none");
        $("#idSave").css("display", "none");
        $("#preg"+n).css("display", "none");
        n++;
        $("#preg"+n).css("display", "inline");
    });
	
});	
