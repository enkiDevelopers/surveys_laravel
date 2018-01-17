function directiveModal(comp){
  let id = comp.id;
  console.log(id);
  $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
});
        $.ajax({
              dataType : 'json',
              type : 'post',
              url : '/busquedamodal',
              data : {"id": id,},
              async:true,
              cache:false,
              success : function(response){
                var titulo="";
                var imagen="";
                    titulo+="<h4><b>"+response["0"].Titulo_encuesta+"</b></h4>";
                    imagen+="<img class='card-img-top' alt='Card image cap' src='\img/iconos/"+response[0].Image_path+"' width='50%' height='90px'>";
                    console.log(titulo);

                 $("#titulo_encuesta").html(titulo);
                 $("#imagen").html(imagen);

                $('#MdReporte').modal('show');

              },
              error : function(error) {
                console.log(error);
              }
          });

}