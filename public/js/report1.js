function sltlinea(busq){
  $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
}); 
  let id = busq;
  var idencuesta=document.getElementById("idencuesta").value;
  var campus=document.getElementById("campus").value;
 
        $.ajax({
              dataType : 'json',
              type : 'post',
              url : '/buscarlinea',
              data : {"id": id,
                      "idencuesta":idencuesta,
                      "campus":campus},
              async:true,
              cache:false,
              beforeSend: function () {
                $("#cargar").html("Cargando Regiones...");
              },
              success : function(response){
                console.log(response);
              var  dato="";
              var ENC=""; FAL="";  Total="";  SIS="";  OLN=""  CNX  #FBK  #HP12 #EMAIL  #PRM  #DET  %NPS  %Avance
              var json=jQuery.parseJSON(JSON.stringify(response));
              var json2=jQuery.parseJSON(JSON.stringify(response));
              for(post in json2){
                ENC++;

              }
              for(post in json){
              dato +="<tr>";
                dato+="<td>"+json[post].lineaNegocio+"</td>"
                dato+="<td>"+json[post].modalidad+"</td>"
                dato+="<td>"+ENC+"</td>"
                dato+="<td>"+json[post].lineaNegocio+"</td>"
                dato+="<td>"+json[post].lineaNegocio+"</td>"
                dato+="<td>"+json[post].lineaNegocio+"</td>"
                dato+="<td>"+json[post].lineaNegocio+"</td>"
                dato+="<td>"+json[post].lineaNegocio+"</td>"
                dato+="<td>"+json[post].lineaNegocio+"</td>"
                dato+="<td>"+json[post].lineaNegocio+"</td>"
                dato+="<td>"+json[post].lineaNegocio+"</td>"
                dato+="<td>"+json[post].lineaNegocio+"</td>"
                dato+="<td>"+json[post].lineaNegocio+"</td>"
                dato+="<td>"+json[post].lineaNegocio+"</td>"
                dato+="<td>"+json[post].lineaNegocio+"</td>"
              dato +="</tr>";
              }
              $("#tabla").html(dato);

                
              },
              error : function(error) {
                console.log(error);
              }
          });

}