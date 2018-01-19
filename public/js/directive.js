function corporativoModal(comp){
  let id = comp.id;
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
                    imagen+="<img class='card-img-top' style='border-radius: 10px;' alt='Card image cap' src='/img/iconos/"+response[0].Image_path+"' width='50%' height='90px'>";

                 $("#titulo_encuesta").html(titulo);
                 $("#imagen").html(imagen);

                $('#MdCorporativo').modal('show');

              },
              error : function(error) {
                console.log(error);
              }
          });

}


function regionalModal(comp){
  
  $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
});
        $.ajax({
              dataType : 'json',
              type : 'post',
              url : '/busquedamodal',
              data : {"id": comp,},
              async:true,
              cache:false,
              success : function(response){
                var titulo="";
                var imagen="";
                    titulo+="<h4><b>"+response["0"].Titulo_encuesta+"</b></h4>";
                    imagen+="<img class='card-img-top' style='border-radius:150px;' alt='Card image cap' src='/img/iconos/"+response[0].Image_path+"' width='50%' height='90px'>";

                 $("#titulo_encuestar").html(titulo);
                 $("#imagenr").html(imagen);

                $('#MdRegional').modal('show');

              },
              error : function(error) {
                console.log(error);

              }
          });

}

function campusModal(comp,region){
  $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
});
        $.ajax({
              dataType : 'json',
              type : 'post',
              url : '/busquedamodal',
              data : {"id": comp,
                      "region":region},
              async:true,
              cache:false,
              success : function(response){
                var titulo="";
                var imagen="";
                    titulo+="<h4><b>"+response["0"].Titulo_encuesta+"</b></h4>";
                    imagen+="<img class='card-img-top' style='border-radius:150px;' alt='Card image cap' src='/img/iconos/"+response[0].Image_path+"' width='50%' height='90px'>";

                 $("#titulo_encuestac").html(titulo);
                 $("#imagenc").html(imagen);

                $('#MdCampus').modal('show');

              },
              error : function(error) {
                console.log(error);
              }
          });

}

function selecciona(busq){
  let id = busq;
  dato="";
  $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
});
        $.ajax({
              dataType : 'json',
              type : 'post',
              url : '/buscarcampus',
              data : {"id": id},
              async:true,
              cache:false,
              success : function(response){
              var datos=JSON.stringify(response);
              console.log(datos);
              for(var i=0;i<=response.length;i++){
                var n = i.toString();
                dato+="<option value="+response[].campus_id+">"+response[n].campus_name+"</option>"
              } 
              $("#regionescorp").html(dato);
                
              },
              error : function(error) {
                console.log(error);
              }
          });

}