var cargar=0;
var incidentecargar=0;
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
}); 



function creardato(ide){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
}); 
    let id = ide;

           swal({
              title: "Confirmación",
              text: "¿Desea ingresar los registro en la lista? ",
              type: "info",
              showCancelButton: true,
              confirmButtonColor: '#DD6B55',
              confirmButtonText: 'Continuar',
              cancelButtonText: 'Cancelar',
              closeOnConfirm: true,
              closeOnCancel: true
           },
           function(isConfirm){
             if (isConfirm){


              $.ajax({
                dataType : 'json',
                type : 'post',
                url : '/ingresarDatoslistas',
                data : {"id": id},
                async:true,
                cache:false,
                beforeSend: function () {
                  console.log(ide);
                  document.getElementById(ide).value = "Enviando...";
                  document.getElementById(ide).disabled = true; 
                  $("#procesando").show();

                },
                success : function(response){
                  $("#procesando").hide();
                      swal({
                        title: "Información",
                        text: "Su lista esta siendo procesada",
                        type: "info",
                        confirmButtonText: 'Continuar',
                     });

                  $("#divid").load(" #divid");
                  cargar=1;

                  //console.log(response);
                },
                error : function(error) {
                  console.log(error);
                  $("#procesando").hide();

                }
            });
              } else {

              }
           });

}


function data () {
    var form2=document.getElementById("agregardatos");
    var file2 = document.getElementById("datos");
 

    /*if(file2.files[0].size > 5242880){
            swal({
                      title: "Información",
                      text: "El archivo que intenta subir excede el limite permitido.",
                      type: "info",
                      showCancelButton: true,
                      confirmButtonColor: '#DD6B55',
                      confirmButtonText: 'Continuar',
                      closeOnConfirm: true,
                   });
  }else{*/
    document.getElementById("btnsubir2").value = "Enviando...";
    document.getElementById("btnsubir2").disabled = true;
    form2.submit();
  //}
  
}




$(window).load(function() {
    $(".procesando").fadeOut("slow");

      $(document).ready(function() {
        var refreshId = setInterval(function() {
          if(cargar==1){
              $.ajax({
                dataType : 'json',
                type : 'post',
                url : '/checarjobs',
                data : {"id": 0},
                async:true,
                cache:false,
                beforeSend: function () { 

                },
                success : function(response){
                  if(response==0){

                  }else{
                     swal({
                        title: "Información",
                        text: "Su lista ha sido procesada.",
                        type: "info",
                        confirmButtonText: 'Continuar',
                     });
                     cargar=0;

                  }
                  //console.log(response);
                },
                error : function(error) {
                  console.log(error);
                  $("#procesando").hide();

                }
            });
            }
          if(incidentecargar==1){
              $.ajax({
                dataType : 'json',
                type : 'post',
                url : '/checarjobs',
                data : {"id": 0},
                async:true,
                cache:false,
                beforeSend: function () { 

                },
                success : function(response){
                  if(response==0){

                  }else{
                     swal({
                        title: "Información",
                        text: "Su lista ha sido procesada.",
                        type: "info",
                        confirmButtonText: 'Continuar',
                     });
                    incidentecargar=0;

                  }
                  //console.log(response);
                },
                error : function(error) {
                  console.log(error);
                  $("#procesando").hide();

                }
            });
            }
            $("#divid").load(" #divid");
                    }, 10000);
          

        $.ajaxSetup({ cache: false });              
    });
});












$(function(){
      $("#formincidentes").on("submit", function(e){

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
});
          e.preventDefault();
          var f = $(this);
          var formData = new FormData($(this)[0]);


       $.ajax({
              type : 'post',
              url : '/incidente',
              processData: false,
              contentType: false,
              data : formData,
              enctype: 'multipart/form-data',
              async:true,
              cache:false,

              beforeSend: function () { 
                $("#procesando").show();

              },
              success : function(response){

              $("#divid").load(" #divid");

                $('#nombre').val('');
                $('#archivo').val('');
                $("#procesando").hide();

                incidentecargar=1;

              },
              error : function(error) {
                console.log(error);
              $("#procesando").hide();

              }

          });
       $('#AgregarIncidentes').hide();
      $('.modal-backdrop').hide();

     
   });
  });


    function limpiar()
    {
        document.getElementById("myForm").reset();
    }
        function addExclude(){
            $("#loadingExclude").removeClass('invisible');
        }

      function deleteFile(id){
 $.ajaxSetup({
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
          });
         swal({
              title: "Confirmación",
              text: "Desea eliminar esta Lista, se perdera los registros que contiene",
              type: "warning",
              showCancelButton: true,
              confirmButtonColor: '#DD6B55',
              confirmButtonText: 'Continuar',
              cancelButtonText: 'Cancelar',
              closeOnConfirm: true,
              closeOnCancel: true
           },
           function(isConfirm){
             if (isConfirm){
            $.ajax({
              dataType : 'json',
              type : 'post',
              url : '/eliminarlista',
              data : {"id": id},
              async:true,
              cache:false,
              beforeSend: function () { 

              },
              success : function(response){

                    swal({
                      title: "Información",
                      text: "Lista Eliminada",
                      type: "info",
                      confirmButtonText: 'Continuar',
                   })
                $("#divid").load(" #divid");
                //console.log(response);
              },
              error : function(error) {
                console.log(error);

              }
          });
              } else {

              }
           });
          
                 
      }

        function uploadFile(){
                    $("#loadingUploadFile").removeClass('invisible');

        }
function reply_click2(clicked_id)
{
  document.getElementById("idlista").value = clicked_id;
  document.getElementById("listaid").value= clicked_id;
}
function reply_click(clicked_id)
{
  $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
}); 
  $.ajax({
              dataType : 'json',
              type : 'post',
              url : '/archivos',
              data : {"id": clicked_id},
              async:true,
              cache:false,
              beforeSend: function () { 

              },
              success : function(response){
                console.log(response);
              dato="";
              var json=jQuery.parseJSON(JSON.stringify(response));
              for(post in json){
                dato+="<p>"+json[post].orginalname+"</p>"
              }
                $("#data").html(dato);
                $('#AgregarDatos').modal('show');
              },
              error : function(error) {
                console.log(error);

              }
          });
document.getElementById("idlista").value = clicked_id;
document.getElementById("listaid").value= clicked_id;

}






//document.getElementById("boton").onclick = function() {myFunction()};

function myFunction(){
                      swal({
                      title: "Información",
                      text: "Tener cuidado que los nombres de los campos sean exactamente a los siguientes: \n region, ciclo, campus, tipo_ingreso, linea_negocio, modalidad, no_cuenta, nombre_general, fecha_nacimiento, direccion, correo_electronico, telefono_casa, carrera, programacv, programa_desc, semestre, vertical, es_intercambio.\n Nota: El orden no es relevante.",
                      type: "info",
                      showCancelButton: true,
                      confirmButtonColor: '#DD6B55',
                      confirmButtonText: 'Continuar',
                      closeOnConfirm: true,
                   })

        }
        window.onload = function() {
            $("#files").addClass('active');
        }
function checkSubmit() {

    document.getElementById("btsubmit").value = "Enviando...";
    document.getElementById("btsubmit").disabled = true;

    return true;
}


