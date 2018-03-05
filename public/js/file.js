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
                  $("#procesando").show();

                },
                success : function(response){
                  $("#procesando").hide();

                      swal({
                        title: "Información",
                        text: "",
                        type: "info",
                        confirmButtonText: 'Continuar',
                     })
                  $("#divid").load(" #divid");
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


    if(file2.files[0].size > 5242880){
            swal({
                      title: "Información",
                      text: "El archivo que intenta subir excede el limite permitido.",
                      type: "info",
                      showCancelButton: true,
                      confirmButtonColor: '#DD6B55',
                      confirmButtonText: 'Continuar',
                      closeOnConfirm: true,
                   });
  }else{
    form2.submit();
  }
  
}




$(window).load(function() {
    $(".procesando").fadeOut("slow");

      $(document).ready(function() {
        var refreshId = setInterval(function() {
            $("#divid").load(" #divid");
                    }, 5000);

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
                $("#procesando").show();

              },
              success : function(response){
                $("#procesando").hide();

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
                $("#procesando").hide();

              }
          });
              } else {

              }
           });
          
                 
      }

        function uploadFile(){
                    $("#loadingUploadFile").removeClass('invisible');

        }

function reply_click(clicked_id)
{
document.getElementById("idlista").value = clicked_id;
document.getElementById("listaid").value=clicked_id;
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


