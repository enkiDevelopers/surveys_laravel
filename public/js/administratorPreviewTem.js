$(document).ready(function(){
    var b=-1;n=1;    


        $("#btnStart").click(function(){
                $("#surveyContainer").css('display','block');
                $("#sumary").fadeOut( "slow" );

        });

        $("input.label_better").label_better({
            position: "top",
            animationTime: 50,
            easing: "ease-in-out",
            offset: 20
          });

        $("#idEntendido").click(function(){
                if($(".pregs").length==0){
                    alert("No hay preguntas aún");
                }else{
                    $("#surveyContainer").fadeOut( "slow" );                
                    $("#idNext").css('display','block');
                    $("#preg"+n).css("display", "inline");
                }
        });





    /********Funcionalidades del botón Atrás******************/

    function atras(){

        if(n>=$(".pregs").length)
        {
            $("#idNext").css('display','');
            $("#idenviar").css("display","none");   
        }
        $("#idTitlePregunta").css("display", "inline");

        
        if(n<=1){
            $("#idBack").attr('disabled','disabled');  
 
        }

        $("#idSave").css("display","none");
        $("#idNext").removeAttr('disabled');
        $("#gracias").css("display","none");

        $("#preg"+n).css("display", "none");  
        var numeroanterior=n;      
        //n--;
        n=$("#back"+n).val();
        //n=b;
        //b=n-1;
        $("#preg"+n).css("display", "inline");
        if(n==0){
          $("#idTitlePregunta").text("Intrucciones Generales: ");
        }else{
        $("#idTitlePregunta").text("Pregunta " + n);
}
            if(n==0){
                var dato = document.getElementById("opt"+1);
               if(dato==null){

                }else{
                    document.getElementById("opt"+1).value=null;

                }
                    var tempo1= $('input:radio[data-name=opcion'+1+']:checked').prop('checked',false);

            }else{
                    //var siguiente=n;
                   var tempo1= $('input:radio[data-name=opcion'+n+']:checked');
                    // $('input:radio[data-name=opcion'+n+']:checked').prop('checked',false);

                    //$("input:radio['data-name=opcion'+n+']").prop('checked',false);

                    var dato1=tempo1;
                    tempo1= $(tempo1).data("salto");


                    if(dato1.val() == null){
                       // console.log(dato1.val());
                                           // siguiente++;


                    }else{
                        //console.log(dato1.val());
                    }
                   // if (document.getElementById("opt"+n)==null){
                   
                   // }else{
                        var siguiente=n;
                        siguiente++;
                         var borrar=document.getElementById("num"+numeroanterior).value;

                        console.log(borrar);
                       
                       
                        var dato = document.getElementById("opt"+borrar);
                        if(dato == null){
                        }else{
                        console.log("borrar");
                        document.getElementById("opt"+borrar).value=null;


                        }

                        var tempo1= $('input:radio[data-name=opcion'+borrar+']:checked').prop('checked',false);

                     //$('input:radio[data-name=opcion'+siguiente+']:checked').prop('checked',false);

                       // document.getElementById("opcion"+n).checked=false;

                       // document.getElementById("opt"+n).value=null;

                   // }
            }

    }

    $("#idBack").click(function(){
        atras();
    });


    function validar(){
        var validado=false;
        var checkradio= $('input:radio[data-name=opcion'+n+']:checked');
        var tipo2=$('#opt'+n).val();

        //si la pregunta es de opción múltiple, se tiene que saber si hay brinco o no
        if($("#type"+n).val()=="2"){
            var tempo= $('input:radio[data-name=opcion'+n+']:checked');
            var dato=tempo;
            
            tempo= $(tempo).data("salto");
            
            if(dato.val() == null){
             swal({
                title:"Información",
                text: "Marque una de las opciones",
                icon: "info",
                //confirmButtonColor: "#DD6B55",
                closeOnConfirm: true
            }); 
            }else{
            validado=true;
            if(tempo==null){
                //$("#idNext").attr('disabled','disabled');
              //  n++; //eliminar esta línea
            }else{
                m=tempo;
                salto = $("#"+n+"salto"+m).val();
                if(salto=="0"){
                    n++;
                }else{
                    b=n;                    
                    n=salto;
                    $("#back"+n).val(b);
                }
            }
        }
    }else{
        if($("#type"+n).val()=="1"){
            if(tipo2==''){
                swal({
                title:"Información",
                text: "Escriba su respuesta",
                icon: "info",
                //confirmButtonColor: "#DD6B55",
                closeOnConfirm: true
            }); 

            }else{
                validado=true;
                salto = $("#saltoa"+n).val();
                if(salto==""){
                    n++;  
                    $("#back"+n).val(n-1);//configurar regreso para salto en pregunta abierta
                }else{

                    n=salto;
                }

            }
            }else{
        if($("#type"+n).val()=="3"){
            console.log("hola");
            var tempo= $('input:checkbox[data-name=opcion'+n+']:checked');
            var dato=tempo;
            
                validado=true;
                salto = $("#saltoa"+n).val();
                if(salto==""){
                    n++;  
                    $("#back"+n).val(n-1);//configurar regreso para salto en pregunta abierta
                }else{

                    n=salto;
                }
            }else{
                         n++;    
    }


                                       

            }
        }

        return validado;

    }



    function validarUltimaPreg(){
        var validado=false;
        var checkradio= $('input:radio[data-name=opcion'+n+']:checked');
        var tipo2=$('#opt'+n).val();

        //si la pregunta es de opción múltiple, se tiene que saber si hay brinco o no
        if($("#type"+n).val()=="2"){
            console.log("1");
            var tempo= $('input:radio[data-name=opcion'+n+']:checked');
            var dato=tempo;
            
            tempo= $(tempo).data("salto");
            
            if(dato.val() == null){
             swal({
                title:"Información",
                text: "Marque una de las opciones",
                icon: "info",
                //confirmButtonColor: "#DD6B55",
                closeOnConfirm: true
            }); 
            }else{
            validado=true;
        }
        }else{
            if($("#type"+n).val()=="1"){
            console.log("2");

                if(tipo2==''){
                    swal({
                    title:"Información",
                    text: "Escriba su respuesta",
                    icon: "info",
                    //confirmButtonColor: "#DD6B55",
                    closeOnConfirm: true
                }); 

            }else{
                validado=true;
            }
        }else{
            if($("#type"+n).val()=="3"){
            console.log("3");

            var tempo= $('input:checkbox[data-name=opcion'+n+']:checked');
            var dato=tempo;

            tempo= $(tempo).data("salto");
           
            if(dato.val() == null){
             swal({
                title:"Información",
                text: "Marque una de las opciones",
                icon: "info",
                //confirmButtonColor: "#DD6B55",
                closeOnConfirm: true
            }); 
            }else{
            validado=true;
        }
        }
        }
    }

        return validado;

    }




    /********Funcionalidades del botón Siguiente******************/
    $("#idNext").click(function(){ 
        $("#idBack").removeAttr('disabled');
        $("#preg"+n).css("display", "none");
        validar();
            $("#preg"+n).css("display", "inline");
            $("#idTitlePregunta").text("Pregunta " + n);
            if(n>=$(".pregs").length){
               // $("#back"+n).val(n-1);
                //$("#preg"+n).css("display", "none");
                $("#idTitlePregunta").css("display", "none");
                $("#idNext").css('display','none'); 
                //$("#idNext").hide(); 
                //$("#idNext").attr('value','Finalizar');
                $("#gracias").css("display",'inline');  
                $("#idenviar").css("display","inline");
                //$("#idSave").css("display","inline");
                //Si es falso entonces
                //$("#idNext").removeAttr('disabled');
                //atras();    
            }

    });


    /********Funcionalidades del botón Enviar encuesta************/
    $("#idenviar").click(function(){ 
        if(validarUltimaPreg()){
            get_action();
        }else{
             get_action();       
        }
    });


    /********Funcionalidades del botón Guardar******************/
    $("#idSave").click(function(){              
        $("#idBack").css("display", "none");
        $("#idNext").css("display", "none");
        $("#idSave").css("display", "none");
        $("#preg"+n).css("display", "none");
        
        $("#preg"+n).css("display", "inline");
    });
    
}); 