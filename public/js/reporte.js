function get_action(id){
 $.ajaxSetup({
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
          });
         swal({
              title: "Confirmación",
              text: "Desea generar un reporte de esta encuesta.",
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
              type : 'post',
              url : '/informe',
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
                      text: "Reporte Generado",
                      type: "info",
                      confirmButtonText: 'Continuar',
                   })

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


